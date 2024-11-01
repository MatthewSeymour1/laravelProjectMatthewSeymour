<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Game;
use Carbon\Carbon;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentTimeStamp = Carbon::now();
        Game::insert([
            ['title' => 'The Elder Scrolls V: Skyrim', 'genre' => 'Action', 'release_year' => 2011, 'description' => 'Skyrim, part of "The Elder Scrolls" series, is an expansive open-world action RPG set in a rich fantasy universe. Players explore the province of Skyrim, engaging in quests, character customization, and epic battles against dragons. Its immersive gameplay, detailed lore, and freedom of choice create a captivating experience for players.', 'image' => 'image01.png', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp],
            ['title' => 'Ratchet & Clank', 'genre' => 'Action', 'release_year' => 2002, 'description' => 'Ratchet & Clank, released in 2002, is a platforming action-adventure game featuring a lombax named Ratchet and a small robot named Clank. Together, they explore vibrant worlds, battle enemies, and collect gadgets. Known for its humor, imaginative weapons, and engaging gameplay, it launched a beloved franchise.', 'image' => 'image02.jpg', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp],
            ['title' => 'Jak and Daxter: The Precursor Legacy', 'genre' => 'Platform', 'release_year' => 2001, 'description' => 'Jak and Daxter: The Precursor Legacy, released in 2001, follows Jak and his sidekick Daxter on an adventure through a vibrant, open world. After a mishap with dark eco, Daxter transforms into an ottsel. Players explore, solve puzzles, and battle foes in this beloved platforming adventure.', 'image' => 'image03.avif', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp],
            ['title' => 'Roblox', 'genre' => 'First-person Shooter', 'release_year' => 2006, 'description' => 'Roblox is a user-generated online platform that allows players to create and explore games made by others. Launched in 2006, it features diverse genres and gameplay styles, enabling creativity and social interaction. Players can customize avatars, participate in virtual experiences, and join friends in a vast, immersive gaming community.', 'image' => 'image04.jpg', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp],
            ['title' => 'League of Legends', 'genre' => 'MOBA', 'release_year' => 2009, 'description' => 'League of Legends is a multiplayer online battle arena (MOBA) game released in 2009. Players control unique champions, strategizing with teammates to destroy the enemy\'s Nexus. Known for its competitive gameplay, diverse characters, and regular updates, it has become a cornerstone of esports, attracting millions of players worldwide.', 'image' => 'image05.jpg', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp], ['title' => 'Fortnite', 'genre' => 'Battle Royale', 'release_year' => 2017, 'description' => 'Fortnite is a popular online multiplayer battle royale game developed by Epic Games. Players compete to be the last one standing on an island, scavenging for weapons and resources while battling opponents. The game features building mechanics, vibrant graphics, and seasonal updates, making it a dynamic and engaging experience.', 'image' => '1730490983.jpg', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp]
        ]);
    }
}