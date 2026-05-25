<?php

namespace App\Enums;

use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum PropertyStatusEnum: int implements HasLabel, HasIcon
{
    case DRAFT  = 1;
    case ACTIVE = 2;
    case HIDDEN = 3;
    case SOLD   = 4;
    case RENTED = 5;

    public function getLabel(): ?string
    {
        return match ($this) {
            self::DRAFT  => "Brouillon",
            self::ACTIVE => "Disponible",
            self::HIDDEN => "Masqué",
            self::SOLD   => "Vendu",
            self::RENTED => "Loué",
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::ACTIVE => 'bg-green-500',
            self::DRAFT  => 'bg-gray-500',
            self::HIDDEN => 'bg-yellow-500',
            self::SOLD   => 'bg-red-500',
            self::RENTED => 'bg-blue-500',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::DRAFT  => 'heroicon-o-document-text',
            self::ACTIVE => 'heroicon-o-check-circle',
            self::HIDDEN => 'heroicon-o-eye-slash',
            self::SOLD   => 'heroicon-o-banknotes',
            self::RENTED => 'heroicon-o-key',
        };
    }

    public static function toArray(): array
    {
        return [
            1 => "Brouillon",
            2 => "Disponible",
            3 => "Masqué",
            4 => "Vendu",
            5 => "Loué",
        ];
    }
}
