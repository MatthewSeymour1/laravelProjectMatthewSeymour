<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Games') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white">
                    <h3 class="font-semibold text-lg mb-4">Games Details:</h3>
                            <x-game-details
                                :title="$game->title"
                                :image="$game->image"
                                :release_year="$game->release_year"
                                :description="$game->description"
                                :genre="$game->genre"
                            />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>