<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $cities = [
            'Casablanca',
            'Rabat',
            'Fès',
            'Marrakech',
            'Tanger',
            'Agadir',
            'Meknès',
            'Oujda',
            'Kénitra',
            'Tétouan',
            'Safi',
            'El Jadida',
            'Mohammédia',
            'Nador',
            'Laâyoune',
            'Dakhla',
            'Essaouira',
            'Ouarzazate',
            'Inezgane',
            'Settat',
            'Berrechid',
            'Beni Mellal',
            'Khouribga',
            'Taza',
            'Khénifra',
            'Khemisset',
            'Al Hoceïma',
            'Larache',
            'Salé',
            'Témara',
            'Sidi Kacem',
            'Sidi Slimane',
            'Sefrou',
            'Azrou',
            'Ksar el-Kebir',
            'Tiznit',
            'Fnideq',
            'Martil',
            'Midelt',
            'Errachidia',
            'Guelmim',
            'Tan-Tan',
            'Asilah',
            'Oued Zem',
            'Youssoufia',
            'Berkane',
            'Taourirt',
            'Ouezzane',
            'Oued Laou',
            'Rissani',
            'Erfoud',
            "El Kelaa des Mgouna",
            'Sidi Bennour',
            "Aït Melloul",
            'Dcheïra El Jihadia',
            "Aïn Harrouda",
            "Aïn Taoujdate",
            'Azemmour',
            'Ifrane',
            'Imouzzer Kandar',
            'Imouzzer Marmoucha',
            'Imzouren',
            "M'Diq",
            'Demnate',
            'Oulad Teïma',
            'Sidi Ifni',
            'Souk El Arbaa',
            'Oulad Berhil',
            'Boujdour',
            'Es-Semara',
            'Zagora',
            'Tarfaya',
            'Chefchaouen',
            'Oulmès',
            'Laayoune',
            'Agdz',
        ];
        foreach ($cities as $name) {
            City::create(['name' => $name]);
        }

    }
}
