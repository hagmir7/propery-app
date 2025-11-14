<?php

namespace App\Filament\Resources\Pages\Schemas;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class PageForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label(__("Titre"))
                    ->columnSpanFull()
                    ->required(),
                RichEditor::make('content')
                    ->label(__("Contenu"))
                    ->extraInputAttributes(['class' => 'min-h-[20rem] max-h-[50vh]'])
                    ->required()
                    ->columnSpanFull(),

            ]);
    }
}
