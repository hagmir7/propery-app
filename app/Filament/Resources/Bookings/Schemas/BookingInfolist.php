<?php

namespace App\Filament\Resources\Bookings\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class BookingInfolist
{
    protected static array $statusLabels = [
        1 => 'En attente',
        2 => 'Confirmé',
        3 => 'Annulé',
        4 => 'Terminé',
    ];


    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                TextEntry::make('full_name')
                    ->extraAttributes(['style' => 'font-size:18px'])
                    ->label(__('Nom complet')),
                TextEntry::make('property.title')
                    ->extraAttributes(['style' => 'font-size:18px'])
                    ->url(fn($record) => route('property.show', $record->property->slug))
                    ->label(__('Propriété')),

                TextEntry::make('date')
                    ->extraAttributes(['style' => 'font-size:18px'])
                    ->date()
                    ->label(__('Date')),

                TextEntry::make('phone')
                    ->label(__('Téléphone'))
                    ->extraAttributes(['style' => 'font-size:18px'])
                    ->url(fn($record) => 'tel:' . $record->phone),


                TextEntry::make('status')
                    ->extraAttributes(['style' => 'font-size:18px'])
                    ->getStateUsing(fn($record) => self::$statusLabels[$record->status] ?? 'Inconnu')
                    ->badge()
                    ->label(__('Statut')),

                TextEntry::make('email')
                    ->placeholder('__')
                    ->label(__('Adresse e-mail'))
                    ->extraAttributes(['style' => 'font-size:18px'])
                    ->url(fn($record) => 'mailto:' . $record->email),



                // TextEntry::make('start_date')
                //     ->extraAttributes(['style' => 'font-size:18px'])
                //     ->placeholder('__')
                //     ->date()
                //     ->label(__('Date de début')),

                // TextEntry::make('end_date')
                //     ->placeholder('__')
                //     ->extraAttributes(['style' => 'font-size:18px'])
                //     ->date()
                //     ->label(__('Date de fin')),



                TextEntry::make('created_at')
                    ->extraAttributes(['style' => 'font-size:18px'])
                    ->dateTime()
                    ->label(__('Créé le')),
            ]);
    }
}
