<?php

// Need to run the company seeder first, THEN the game seeder. This is because the game seeder fetches the companies from the  database and attaches them to
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Game;
use App\Models\Company;
use Carbon\Carbon;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentTimeStamp = Carbon::now();
        $games = [
            ['title' => 'The Elder Scrolls V: Skyrim', 'genre' => 'Action', 'release_year' => 2011, 'description' => 'Skyrim, part of "The Elder Scrolls" series, is an expansive open-world action RPG set in a rich fantasy universe. Players explore the province of Skyrim, engaging in quests, character customization, and epic battles against dragons. Its immersive gameplay, detailed lore, and freedom of choice create a captivating experience for players.', 'image' => 'image01.png', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp, 'companies' => ['Bethesda Softworks', 'Bethesda Game Studios']],
            ['title' => 'Ratchet & Clank', 'genre' => 'Action', 'release_year' => 2002, 'description' => 'Ratchet & Clank, released in 2002, is a platforming action-adventure game featuring a lombax named Ratchet and a small robot named Clank. Together, they explore vibrant worlds, battle enemies, and collect gadgets. Known for its humor, imaginative weapons, and engaging gameplay, it launched a beloved franchise.', 'image' => 'image02.jpg', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp, 'companies' => ['Insomniac Games', 'Sony Computer Entertainment']],
            ['title' => 'Jak and Daxter: The Precursor Legacy', 'genre' => 'Platform', 'release_year' => 2001, 'description' => 'Jak and Daxter: The Precursor Legacy, released in 2001, follows Jak and his sidekick Daxter on an adventure through a vibrant, open world. After a mishap with dark eco, Daxter transforms into an ottsel. Players explore, solve puzzles, and battle foes in this beloved platforming adventure.', 'image' => 'image03.avif', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp, 'companies' => ['Naughty Dog', 'Sony Computer Entertainment']],
            ['title' => 'Roblox', 'genre' => 'First-person Shooter', 'release_year' => 2006, 'description' => 'Roblox is a user-generated online platform that allows players to create and explore games made by others. Launched in 2006, it features diverse genres and gameplay styles, enabling creativity and social interaction. Players can customize avatars, participate in virtual experiences, and join friends in a vast, immersive gaming community.', 'image' => 'image04.jpg', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp, 'companies' => ['Roblox Corporation']],
            ['title' => 'League of Legends', 'genre' => 'MOBA', 'release_year' => 2009, 'description' => 'League of Legends is a multiplayer online battle arena (MOBA) game released in 2009. Players control unique champions, strategizing with teammates to destroy the enemy\'s Nexus. Known for its competitive gameplay, diverse characters, and regular updates, it has become a cornerstone of esports, attracting millions of players worldwide.', 'image' => 'image05.jpg', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp, 'companies' => ['Riot Games']],
            ['title' => 'Fortnite', 'genre' => 'Battle Royale', 'release_year' => 2017, 'description' => 'Fortnite is a popular online multiplayer battle royale game developed by Epic Games. Players compete to be the last one standing on an island, scavenging for weapons and resources while battling opponents. The game features building mechanics, vibrant graphics, and seasonal updates, making it a dynamic and engaging experience.', 'image' => 'image06.jpg', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp, 'companies' => ['Epic Games']],
            ['title' => 'Overwatch', 'genre' => 'First Person Shooter', 'release_year' => 2016, 'description' => 'Overwatch is a team-based first-person shooter developed by Blizzard Entertainment. Set in a vibrant, futuristic world, players select from a diverse roster of heroes, each with unique abilities. Teams work together to complete objectives, combining strategy and teamwork in dynamic gameplay. Its engaging lore and characters have fostered a passionate community.', 'image' => 'image07.jpg', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp, 'companies' => ['Blizzard Entertainment']],
            ['title' => 'Call of Duty: Modern Warfare Remastered', 'genre' => 'First Person Shooter', 'release_year' => 2016, 'description' => 'Call of Duty: Modern Warfare Remastered is a revamped version of the classic 2007 first-person shooter. Featuring enhanced graphics and audio, it revitalizes the iconic campaign and multiplayer modes. Players engage in intense military operations across diverse environments, experiencing a gripping storyline and fast-paced combat that defined a generation of shooters.', 'image' => 'image08.jpg', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp, 'companies' => ['Activision', 'Infinity Ward']],
            ['title' => 'Pokémon Sun', 'genre' => 'Role Playing Game', 'release_year' => 2016, 'description' => 'Pokémon Sun is a role-playing game in the Pokémon series, set in the tropical Alola region. Players assume the role of a young Trainer, capturing and battling Pokémon while exploring diverse islands. Featuring new creatures, regional forms, and a fresh storyline, the game emphasizes adventure and discovery, culminating in challenging battles against the Elite Four.', 'image' => 'image09.jpg', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp, 'companies' => ['Game Freak', 'The Pokémon Company', 'Nintendo']],
            ['title' => 'Sonic X Shadow Generations', 'genre' => 'Platform Game', 'release_year' => 2024, 'description' => 'Sonic Generations is a platformer that celebrates Sonic the Hedgehog\'s 20th anniversary by blending classic 2D and modern 3D gameplay. Players control both classic Sonic and modern Sonic as they navigate iconic levels, battling foes like Shadow the Hedgehog. The game features fast-paced action, vibrant graphics, and nostalgic references to Sonic\'s rich history.', 'image' => 'image10.webp', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp, 'companies' => ['Sega', 'Sonic Team']],
            ['title' => 'Minecraft', 'genre' => 'Survival Game', 'release_year' => 2009, 'description' => 'Minecraft is a sandbox game that allows players to build and explore their own blocky, procedurally generated worlds. With a focus on creativity, survival, and resource management, players can gather materials, craft tools, and construct structures. The game features various modes, including survival, creative, and adventure, encouraging limitless exploration and imagination.', 'image' => 'image11.png', 'created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp, 'companies' => ['Mojang Studios']]
        ];

        foreach ($games as $gameData) {
            // Removes the 'companies' key from $gameData before creating the Game record so it doesn't try to add data to a column that isn't there.
            // This is so I can map the correct games to the correct companies.
            $companies = $gameData['companies']; // Save the companies to use later
            unset($gameData['companies']); // Remove the 'companies' key so it's not added to the Game table



            // Insert the game into the game table
            $game = Game::create(array_merge($gameData, ['created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp]));

            // Companies must exist in the companies table
            // So CompanySeeder must be executed before GameSeeder
            // Fetch the company records based on the company names
            $companyRecords = Company::whereIn('name', $companies)->get();

            // Attach companies to games.
            // Laravels attach() function inserts a row in the pivot table indicating that this game is made by this company
            // You need to have the relationships and pivot table set up correctly for this to work.
            foreach ($companyRecords as $company) {
                $game->companies()->attach($company->id, ['created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp]);
            }
            

            // $game->companies()->attach($companyIds, ['created_at' => $currentTimeStamp, 'updated_at' => $currentTimeStamp]);
        }
    }


}