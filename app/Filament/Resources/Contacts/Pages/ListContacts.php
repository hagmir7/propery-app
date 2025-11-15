<?php

namespace App\Filament\Resources\Contacts\Pages;

use App\Filament\Resources\Contacts\ContactResource;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\HtmlString;

class ListContacts extends ListRecords
{
    protected static string $resource = ContactResource::class;


    public function getTitle(): string|Htmlable
    {
        return new HtmlString("<span style='font-size: 20px;'>{$this::getResource()::getModelLabel()} </span>");
    }
}
