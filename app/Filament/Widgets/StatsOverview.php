<?php

namespace App\Filament\Widgets;

use App\Models\Booking;
use App\Models\Contact;
use App\Models\Property;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends StatsOverviewWidget
{
    protected static ?int $sort = 0;

    protected function getStats(): array
    {
        $usersCount = User::count();
        $propertiesCount = Property::count();
        $bookingsCount = Booking::count();
        $contactsCount = Contact::count();

        // Formatage lisible des nombres
        $format = fn(int $n): string => number_format($n, 0, ',', ' ');

        return [
            Stat::make('Vues uniques', $format($usersCount))
                ->description("Total des utilisateurs : {$format($usersCount)}")
                ->icon('heroicon-m-users'),

            Stat::make('Biens (propriétés)', $format($propertiesCount))
                ->description("Propriétés listées : {$format($propertiesCount)}")
                ->icon('heroicon-m-home'),

            Stat::make('Réservations', $format($bookingsCount))
                ->description("Réservations total : {$format($bookingsCount)}")
                ->icon('heroicon-m-calendar'),

            Stat::make('Contacts reçus', $format($contactsCount))
                ->description("Messages reçus : {$format($contactsCount)}")
                ->icon('heroicon-m-chat-bubble-bottom-center')
        ];
    }
}
