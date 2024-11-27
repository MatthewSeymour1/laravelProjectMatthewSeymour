<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;
use Carbon\Carbon;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $currentTimeStamp = Carbon::now();
        Company::insert([
            ['name' => 'Bethesda Softworks', 'role' => 'publisher', 'image' => '01.png', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp],
            ['name' => 'Bethesda Game Studios', 'role' => 'developer', 'image' => '02.png', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp],
            ['name' => 'Sony Interactive Entertainment', 'role' => 'publisher', 'image' => '03.jpg', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp],
            ['name' => 'Insomniac Games', 'role' => 'developer', 'image' => '04.png', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp],
            ['name' => 'Sony Computer Entertainment', 'role' => 'publisher', 'image' => '05.jpg', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp],
            ['name' => 'Naughty Dog', 'role' => 'developer', 'image' => '06.png', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp],
            ['name' => 'Roblox Corporation', 'role' => 'publisher', 'image' => '07.jpeg', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp],
            ['name' => 'Roblox Corporation', 'role' => 'developer', 'image' => '07.jpeg', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp],
            ['name' => 'Riot Games', 'role' => 'publisher', 'image' => '08.jpg', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp],
            ['name' => 'Riot Games', 'role' => 'developer', 'image' => '08.jpg', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp],
            ['name' => 'Epic Games', 'role' => 'publisher', 'image' => '09.jpg', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp],
            ['name' => 'Epic Games', 'role' => 'developer', 'image' => '09.jpg', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp],
            ['name' => 'Blizzard Entertainment', 'role' => 'publisher', 'image' => '10.jpg', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp],
            ['name' => 'Blizzard Entertainment', 'role' => 'developer', 'image' => '10.jpg', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp],
            ['name' => 'Activision', 'role' => 'publisher', 'image' => '11.jpg', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp],
            ['name' => 'Infinity Ward', 'role' => 'developer', 'image' => '12.jpg', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp],
            ['name' => 'Raven Software', 'role' => 'developer', 'image' => '13.jpg', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp],
            ['name' => 'The Pokémon Company', 'role' => 'publisher', 'image' => '14.jpg', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp],
            ['name' => 'Nintendo', 'role' => 'publisher', 'image' => '15.png', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp],
            ['name' => 'Game Freak', 'role' => 'developer', 'image' => '16.png', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp],
            ['name' => 'Mojang Studios', 'role' => 'publisher', 'image' => '17.jpg', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp],
            ['name' => 'Mojang Studios', 'role' => 'developer', 'image' => '17.jpg', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp]
        ]);
    }
}
