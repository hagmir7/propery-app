<?php

namespace App\Filament\Resources\Features\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class FeatureForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label(__("Fonctionnalité"))
                    ->required(),
                Textarea::make('svg_icon')
                    ->label(__("Icon"))
                    ->columnSpanFull(),
            ]);
    }
}
