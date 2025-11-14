<?php

namespace App\Filament\Resources\Contacts\Pages;

use App\Filament\Resources\Contacts\ContactResource;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Support\HtmlString;

class ListContacts extends ListRecords
{
    protected static string $resource = ContactResource::class;

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
                    . static::$title
                    . '</h1>'
            );
        }

        return new HtmlString(
            '<h1 class="text-2xl font-bold text-gray-white dark:text-gray-100">'
                . __('filament-panels::resources/pages/create-record.title', [
                    'label' => static::getResource()::getTitleCaseModelLabel(),
                ])
                . '</h1>'
        );
    }
}
