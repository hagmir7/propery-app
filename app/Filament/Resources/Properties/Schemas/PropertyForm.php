<?php

namespace App\Filament\Resources\Properties\Schemas;

use App\Enums\PropertyStatusEnum;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;

class PropertyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Tabs::make('Tabs')

                    ->columnSpanFull()
                    ->tabs([
                        Tab::make('Tab 1')
                            ->label(__("Propriété"))
                            ->schema([
                                Grid::make(3)
                                    ->schema([
                                        TextInput::make('code')
                                            ->label(__("Référence")),
                                        TextInput::make('title')
                                            ->label(__("Titre"))
                                            ->required(),
                                        Select::make('city_id')
                                            ->label(__("Ville"))
                                            ->required()
                                            ->relationship('city', 'name')
                                            ->searchable()
                                            ->preload(),

                                        TextInput::make('price')
                                            ->label(__("Prix"))
                                            ->numeric()
                                            ->prefix('MAD'),
                                        Select::make('type')
                                            ->options(\App\Models\Property::TYPES)
                                            ->native(false)
                                            ->label(__("Type"))
                                            ->required(),

                                        Select::make('operation')
                                            ->label(__("Opération"))
                                            ->native(false)
                                            ->options([1 => 'Vente', 2 => 'Location']),

                                        Select::make('rent_type')
                                            ->label(__("Type de location"))
                                            ->native(false)
                                            ->options([1 => 'Quotidien', 2 => 'Mensuel']),

                                        Select::make('status')
                                            ->required()
                                            ->native(false)
                                            ->label(__("État"))
                                            ->default(2)
                                            ->options(PropertyStatusEnum::toArray()),
                                        TextInput::make('area_m2')
                                            ->label(__("Surface m2"))
                                            ->numeric(),
                                        Textarea::make('description')
                                            ->label(__("Description"))
                                            ->columnSpanFull(),
                                        RichEditor::make('content')
                                            ->label('Contenu')
                                            ->extraInputAttributes(['style' => 'min-height: 20rem; max-height: 50vh; overflow-y: auto;'])
                                            ->columnSpanFull()
                                            ->columnSpanFull(),
                                    ])


                            ]),
                        Tab::make(__("Images"))
                            ->schema([
                                SpatieMediaLibraryFileUpload::make('attachments')
                                    ->label("Images")
                                    ->multiple()
                                    ->reorderable(),
                                // Repeater::make('images')
                                //     ->relationship('images')
                                //     ->schema([
                                //         FileUpload::make('path')
                                //             ->label("Image")
                                //             ->image(),
                                //     ])->grid(4),
                            ]),
                        Tab::make('Options')
                            ->schema([
                                TextInput::make('address')
                                    ->label(__("Adresse")),
                                Textarea::make('location_map')
                                    ->label(__("Emplacement"))
                                    ->columnSpanFull(),
                                Select::make("features")
                                    ->label(__('Caractéristiques'))
                                    ->relationship('features', 'name')
                                    ->preload()
                                    ->searchable()
                                    ->preload()
                                    ->multiple(),
                                KeyValue::make('extra')
                                    ->columnSpanFull(),
                            ]),
                    ])

            ]);
    }
}
