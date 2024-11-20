<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::insert([
            ['name' => 'Bethesda Softworks', 'role' => 'publisher'],
            ['name' => 'Bethesda Game Studios', 'role' => 'developer'],
            ['name' => 'Sony Interactive Entertainment', 'role' => 'publisher'],
            ['name' => 'Insomniac Games', 'role' => 'developer'],
            ['name' => 'Sony Computer Entertainment', 'role' => 'publisher'],
            ['name' => 'Naughty Dog', 'role' => 'developer'],
            ['name' => 'Roblox Corporation', 'role' => 'publisher'],
            ['name' => 'Roblox Corporation', 'role' => 'developer'],
            ['name' => 'Riot Games', 'role' => 'publisher'],
            ['name' => 'Riot Games', 'role' => 'developer'],
            ['name' => 'Epic Games', 'role' => 'publisher'],
            ['name' => 'Epic Games', 'role' => 'developer'],
            ['name' => 'Blizzard Entertainment', 'role' => 'publisher'],
            ['name' => 'Blizzard Entertainment', 'role' => 'developer'],
            ['name' => 'Activision', 'role' => 'publisher'],
            ['name' => 'Raven Software', 'role' => 'developer'],
            ['name' => 'The Pokémon Company', 'role' => 'publisher'],
            ['name' => 'Nintendo', 'role' => 'publisher'],
            ['name' => 'Game Freak', 'role' => 'developer'],
            ['name' => 'Mojang Studios', 'role' => 'publisher'],
            ['name' => 'Mojang Studios', 'role' => 'developer']
        ]);
    }
}
