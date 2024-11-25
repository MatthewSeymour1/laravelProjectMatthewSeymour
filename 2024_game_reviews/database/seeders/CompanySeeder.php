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
            ['name' => 'Bethesda Softworks', 'role' => 'publisher', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp],
            ['name' => 'Bethesda Game Studios', 'role' => 'developer', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp],
            ['name' => 'Sony Interactive Entertainment', 'role' => 'publisher', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp],
            ['name' => 'Insomniac Games', 'role' => 'developer', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp],
            ['name' => 'Sony Computer Entertainment', 'role' => 'publisher', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp],
            ['name' => 'Naughty Dog', 'role' => 'developer', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp],
            ['name' => 'Roblox Corporation', 'role' => 'publisher', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp],
            ['name' => 'Roblox Corporation', 'role' => 'developer', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp],
            ['name' => 'Riot Games', 'role' => 'publisher', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp],
            ['name' => 'Riot Games', 'role' => 'developer', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp],
            ['name' => 'Epic Games', 'role' => 'publisher', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp],
            ['name' => 'Epic Games', 'role' => 'developer', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp],
            ['name' => 'Blizzard Entertainment', 'role' => 'publisher', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp],
            ['name' => 'Blizzard Entertainment', 'role' => 'developer', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp],
            ['name' => 'Activision', 'role' => 'publisher', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp],
            ['name' => 'Infinity Ward', 'role' => 'developer', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp],
            ['name' => 'Raven Software', 'role' => 'developer', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp],
            ['name' => 'The Pokémon Company', 'role' => 'publisher', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp],
            ['name' => 'Nintendo', 'role' => 'publisher', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp],
            ['name' => 'Game Freak', 'role' => 'developer', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp],
            ['name' => 'Mojang Studios', 'role' => 'publisher', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp],
            ['name' => 'Mojang Studios', 'role' => 'developer', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp]
        ]);
    }
}
