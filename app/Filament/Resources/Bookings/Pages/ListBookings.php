<?php

namespace App\Filament\Resources\Bookings\Pages;

use App\Filament\Resources\Bookings\BookingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\HtmlString;

class ListBookings extends ListRecords
{
    protected static string $resource = BookingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // CreateAction::make(),
        ];
    }

    public function getTitle(): string | Htmlable
    {
        if (filled(static::$title)) {
            return new HtmlString(
                '<h1 class="text-3xl font-bold text-gray-800 dark:text-gray-100">'
                    . static::getResource()::getModelLabel()
                    . '</h1>'
            );
        }

        return new HtmlString(
            '<h1 class="text-2xl font-bold text-gray-white dark:text-gray-100">'
                . __('filament-panels::resources/pages/create-record.title', [
                    'label' => static::getResource()::getModelLabel(),
                ])
                . '</h1>'
        );
    }
}
