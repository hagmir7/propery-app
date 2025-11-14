<?php

namespace App\Filament\Resources\Bookings\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class BookingsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('property.title')
                    ->label(__("Propriété"))
                    ->sortable(),

                TextColumn::make('full_name')
                    ->label(__("Nom et prénom"))
                    ->searchable(),

                TextColumn::make('phone')
                    ->label(__("Téléphone"))
                    ->searchable(),
                TextColumn::make('email')
                    ->label('E-mail')
                    ->searchable(),
                TextColumn::make('date')
                    ->date()
                    ->sortable(),

                SelectColumn::make('status')
                    ->label(__("État"))
                    ->options([1 => 'En attente', 2 => 'Confirmé', 3 => 'Annulé', 4 => 'Terminé'])
                    ->sortable(),
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
                //
            ])
            ->recordActions([
                ViewAction::make(),
                // EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
