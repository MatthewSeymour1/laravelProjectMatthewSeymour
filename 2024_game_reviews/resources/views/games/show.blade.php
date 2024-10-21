<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Games') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4">Games Details:</h3>
                            <x-game-details
                                :title="$game->title"
                                :image="$game->image"
                                :release_year="$game->release_year"
                                :description="$game->description"
                            />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>