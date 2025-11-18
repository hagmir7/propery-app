<?php

namespace App\Filament\Resources\Contacts\Tables;

use Filament\Actions\BulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ContactsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('full_name')
                    ->label(__("Nom et prénom"))
                    ->searchable(),
                TextColumn::make('subject')
                    ->label(__("Sujet"))
                    ->searchable(),
                TextColumn::make('email')
                    ->label(__("E-mail"))
                    ->searchable(),
                TextColumn::make('readed_at')
                    ->label(__("Lu à")),
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

                    BulkAction::make('mark_as_read')
                        ->label(__('Marquer comme lu'))
                        ->icon('heroicon-o-check')
                        ->action(function ($records) {
                            foreach ($records as $record) {
                                $record->update([
                                    'readed_at' => now(),
                                ]);
                            }
                        })
                        ->requiresConfirmation()
                        ->color('success'),
                ]),
            ]);
    }
}
