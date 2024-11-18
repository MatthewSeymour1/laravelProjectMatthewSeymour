<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('All Games') }}
        </h2>
    </x-slot>

    <x-alert-success>
        {{ session('success') }}
    </x-alert-success>

    <x-alert-error>
        {{ session('error') }}
    </x-alert-error>


    <div class="py-12 bg-gray-700">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="container">
                <div class="row">
                    <div class="col">
<!-- Here is my dropdown and searchbar for sorting the list of games. -->
                        <form action="{{ route('games.index') }}" method="GET" class=" px-5 flex gap-2 mx-auto mb-3">
                            <input 
                                    type="text"
                                    name="search"
                                    placeholder="Search for a Game"
                                    value="{{ request('search') }}"
                                    class=""
                            >
                            <select name="sort" class="w-full border-gray-300 rounded-md shadow-sm p-2">
                                <option value="">Sort By None</option>
                                <option value="title_asc" {{ request('sort') == 'title_asc' ? 'selected' : '' }}>
                                    Title Ascending
                                </option>
                                <option value="title_desc" {{ request('sort') == 'title_desc' ? 'selected' : '' }}>
                                    Title Descending
                                </option>
                                <option value="release_year_asc" {{ request('sort') == 'release_year_asc' ? 'selected' : '' }}>
                                    Release Year Ascending
                                </option>
                                <option value="release_year_desc" {{ request('sort') == 'release_year_desc' ? 'selected' : '' }}>
                                    Release Year Descending
                                </option>
                            </select>                
                            <button type='submit' class="bg-green-500 hover:bg-red-700 text-gray-600 font-bold py-2 px-4 rounded">Apply</button>
                        </form>
                    </div>
                </div>
            </div>
            
<!-- Here is a foreach loop that creates a game card for each game in the database. -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white bg-gray-900">
                    <h3 class="font-semibold text-lg mb-4">List of Games:</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($games as $game)
                        <div>
                            <a href="{{ route('games.show', $game) }}">
<!-- the "x-game-card" looks for a corresponding component in the components folder called game-card. -->
                                <x-game-card
                                    :title="$game->title"
                                    :image="$game->image"
                                />
<!-- Here is the edit and delete buttons (in the foreach loop) which now only appear if the user is a user and not an admin. -->

                                @if(auth()->user()->role === 'admin')
                                    <div class="mt-4 flex space-x-2">
                                        <a href="{{ route('games.edit', $game) }}" class="text-gray-600 bg-orange-300 hover:bg-orange-700 font-bold py-2 px-4 rounded">
                                            Edit
                                        </a>

    <!-- @csrf is used to protect the application from CSRF attacks. By ensuring that the form request is coming from the same application
        and not a third party site, it increases the security.
        CSRF attacks occur when a malcious user tricks a logged in user into performing
        an unwanted action on a site where they are authenticated. -->
                                        <form action="{{ route('games.destroy', $game) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this game?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-gray-600 font-bold py-2 px-4 rounded">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>