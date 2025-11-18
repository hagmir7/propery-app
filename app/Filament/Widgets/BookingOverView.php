<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

class BookingOverView extends ChartWidget
{
    protected ?string $heading = 'Aperçu des réservations';
    protected int | string | array $columnSpan = 2;
    protected static ?int $sort = 2;
    protected ?string $maxHeight = '300px';

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getData(): array
    {
        // ----- Input: default last 30 days, optional ?start=YYYY-MM-DD&end=YYYY-MM-DD&granularity=day|week|month
        $rawStart = request()->query('start');
        $rawEnd = request()->query('end');
        $granularity = strtolower(request()->query('granularity', 'day'));
        $allowed = ['day', 'week', 'month'];
        if (! in_array($granularity, $allowed, true)) {
            $granularity = 'day';
        }

        try {
            $start = $rawStart ? Carbon::createFromFormat('Y-m-d', $rawStart) : now()->subDays(30);
        } catch (\Throwable $e) {
            $start = now()->subDays(30);
        }

        try {
            $end = $rawEnd ? Carbon::createFromFormat('Y-m-d', $rawEnd) : now();
        } catch (\Throwable $e) {
            $end = now();
        }

        $start = $start->startOfDay();
        $end = $end->endOfDay();

        // Swap if reversed
        if ($start->greaterThan($end)) {
            [$start, $end] = [$end->copy()->startOfDay(), $start->copy()->endOfDay()];
        }

        // ----- Choose Trend method based on granularity (default day)
        $trendMethod = match ($granularity) {
            'week' => 'perWeek',
            'month' => 'perMonth',
            default => 'perDay',
        };

        // Fetch trend values
        $trend = Trend::model(Booking::class)
            ->between(start: $start, end: $end)
            ->{$trendMethod}()
            ->count();

        // ----- Build labels & dataset
        // DAY: create a full date range and fill missing days with zero
        if ($granularity === 'day') {
            // Build a map of date (Y-m-d) => aggregate from Trend
            $counts = [];
            foreach ($trend as $v) {
                $d = $v->date;
                if ($d instanceof Carbon) {
                    $key = $d->format('Y-m-d');
                } else {
                    // Trend might return "2025-11-01" or other formats; try robust parse to Y-m-d
                    try {
                        $key = Carbon::parse($d)->format('Y-m-d');
                    } catch (\Throwable $e) {
                        $key = (string) $d;
                    }
                }
                $counts[$key] = $v->aggregate;
            }

            // Ensure every day in the period exists (fill zeros)
            $period = CarbonPeriod::create($start->copy()->startOfDay(), '1 day', $end->copy()->startOfDay());
            $labels = [];
            $dataPoints = [];
            foreach ($period as $p) {
                $label = $p->format('Y-m-d');
                $labels[] = $label;
                $dataPoints[] = $counts[$label] ?? 0;
            }

            return [
                'datasets' => [
                    [
                        'label' => 'Réservations',
                        'data' => $dataPoints,
                    ],
                ],
                'labels' => $labels,
            ];
        }

        // WEEK or MONTH: build buckets, but still return clean readable labels
        // Build a map from Trend values: use safe formatting for week/month
        $counts = [];
        $labelsOrder = [];

        foreach ($trend as $v) {
            $d = $v->date;

            if ($granularity === 'week') {
                // Trend might return "2025-42" or Carbon. Convert to "YYYY-Www (startDate)"
                if ($d instanceof Carbon) {
                    $year = $d->isoYear;
                    $week = $d->isoWeek;
                    $weekStart = $d->startOfWeek()->format('Y-m-d');
                    $label = sprintf('%d-W%02d (%s)', $year, $week, $weekStart);
                } else {
                    $dateStr = (string) $d;
                    if (str_contains($dateStr, '-')) {
                        [$yr, $wk] = explode('-', $dateStr, 2);
                        $yrInt = (int) $yr;
                        $wkInt = (int) preg_replace('/\D/', '', $wk);
                        try {
                            $weekStart = Carbon::now()->setISODate($yrInt, $wkInt)->startOfWeek()->format('Y-m-d');
                            $label = sprintf('%d-W%02d (%s)', $yrInt, $wkInt, $weekStart);
                        } catch (\Throwable $e) {
                            $label = $dateStr;
                        }
                    } else {
                        $label = $dateStr;
                    }
                }
            } else { // month
                if ($d instanceof Carbon) {
                    $label = $d->format('Y-m');
                } else {
                    try {
                        $label = Carbon::parse($d)->format('Y-m');
                    } catch (\Throwable $e) {
                        $label = (string) $d;
                    }
                }
            }

            $counts[$label] = $v->aggregate;
            $labelsOrder[] = $label;
        }

        $labelsUnique = array_values(array_unique($labelsOrder));
        $dataPoints = array_map(fn($l) => $counts[$l] ?? 0, $labelsUnique);

        return [
            'datasets' => [
                [
                    'label' => 'Réservations',
                    'data' => $dataPoints,
                ],
            ],
            'labels' => $labelsUnique,
        ];
    }
}
