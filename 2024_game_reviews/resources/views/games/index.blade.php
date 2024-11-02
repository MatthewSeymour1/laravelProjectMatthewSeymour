<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('All Games') }}
        </h2>
    </x-slot>

    <x-alert-success>
        {{ session('success') }}
    </x-alert-success>

    <div class="py-12 bg-gray-700">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white bg-gray-900">
                    <h3 class="font-semibold text-lg mb-4">List of Games:</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($games as $game)
                        <div>
                            <a href="{{ route('games.show', $game) }}">
                                <x-game-card
                                    :title="$game->title"
                                    :image="$game->image"
                                    :genre="$game->genre"
                                    :release_year="$game->release_year"
                                    :description="$game->description"
                                />

                                <div class="mt-4 flex space-x-2">
                                    <a href="{{ route('games.edit', $game) }}" class="text-gray-600 bg-orange-300 hover:bg-orange-700 font-bold py-2 px-4 rounded">
                                        Edit
                                    </a>

                                    <form action="{{ route('games.destroy', $game) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this game?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-gray-600 font-bold py-2 px-4 rounded">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>