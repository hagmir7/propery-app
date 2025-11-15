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


    public function getTitle(): string|Htmlable
    {
        return new HtmlString("<span style='font-size: 20px;'>{$this::getResource()::getModelLabel() } </span>");
    }
}
