<?php

namespace App\Filament\Resources\Properties\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class PropertyInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('owner_id')
                    ->numeric(),
                TextEntry::make('city_id')
                    ->numeric(),
                TextEntry::make('title'),
                TextEntry::make('type')
                    ->numeric(),
                TextEntry::make('operation')
                    ->numeric(),
                TextEntry::make('rent_type')
                    ->numeric(),
                TextEntry::make('price')
                    ->money(),
                TextEntry::make('area_m2')
                    ->numeric(),
                TextEntry::make('address'),
                TextEntry::make('status')
                    ->numeric(),
                TextEntry::make('slug'),
                TextEntry::make('deleted_at')
                    ->dateTime(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}
