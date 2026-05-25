<?php

namespace App\Enums;

use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum PropertyStatusEnum: int implements HasLabel, HasIcon
{
    case AVAILABLE  = 1;
    case UNAVAILABLE = 2;

    public function getLabel(): ?string
    {
        return match ($this) {
            self::AVAILABLE  => "Disponible",
            self::UNAVAILABLE => "Indisponible",
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::AVAILABLE => 'bg-green-500',
            self::UNAVAILABLE  => 'bg-red-500',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::AVAILABLE => 'heroicon-o-check-circle',
            self::UNAVAILABLE  => 'heroicon-o-document-text',
        };
    }

    public static function toArray(): array
    {
        return [
            1 => "Disponible",
            2 => "Indisponible",
        ];
    }
}
