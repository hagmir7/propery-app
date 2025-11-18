<?php

namespace App\Filament\Resources\Properties\Tables;

use App\Models\Property;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ForceDeleteBulkAction;
use Filament\Actions\RestoreBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;

class PropertiesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->label(__('Titre'))
                    ->searchable(),
                TextColumn::make('city.name')
                    ->label(__("Ville"))
                    ->sortable(),

                SelectColumn::make('type')
                    ->options([
                        1 => 'Appartement',
                        2 => 'Villa',
                        3 => 'Boutique',
                        4 => 'Terrain',
                        5 => 'Maison',
                    ])
                ->native(false)
                    ->sortable(),
                SelectColumn::make('operation')
                    ->options([1 => 'Vente', 2 => 'Location'])
                ->native(false)
                    ->sortable(),

                TextColumn::make('price')
                    ->label(__("Prix"))
                    ->badge()
                    ->money('MAD')
                    ->sortable(),
                TextColumn::make('area_m2')
                    ->label(__("Surface m2"))
                    ->suffix(' m')
                    ->numeric()
                    ->sortable(),
                SelectColumn::make('status')
                    ->label(__("État"))
                    ->native(false)
                    ->options([1 => 'Brouillon', 2 => 'Actif', 3 => 'Caché', 4 => 'Vendu', 5 => 'Loué']),
            TextColumn::make('created_at')
                ->label(__("Créé le"))
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            TextColumn::make('updated_at')
                ->label(__("Modifié le"))
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->recordActions([
                ViewAction::make()
                    ->url(function(Property $record){
                        return route('property.show', $record->slug);
                    })->openUrlInNewTab(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                ]),
            ]);
    }
}
