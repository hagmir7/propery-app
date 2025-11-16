<?php

namespace App\Filament\Resources\Contacts\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ContactInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('full_name')
                    ->label(__('Nom complet'))
                    ->extraAttributes(['style' => 'font-size:18px']),
                TextEntry::make('subject')
                    ->label(__('Sujet'))
                    ->extraAttributes(['style' => 'font-size:18px']),
                TextEntry::make('email')
                    ->label(__('Adresse e-mail'))
                    ->url(fn($record) => 'mailto:' . $record->email)
                    ->extraAttributes(['style' => 'font-size:18px']),
                TextEntry::make('created_at')
                    ->dateTime()
                    ->label(__('Créé le'))
                    ->extraAttributes(['style' => 'font-size:18px']),


                TextEntry::make('message')
                    ->columnSpanFull()
                    ->label(__('Message'))
                    ->extraAttributes(['style' => 'font-size:18px']),
            ]);
    }
}
