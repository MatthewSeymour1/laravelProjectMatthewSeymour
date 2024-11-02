@props(['action', 'method', 'game' => null])

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

    <div class="mb-4">
        <label for="title" class="block text-sm text-white">Title</label>
        <input
            type="text"
            name="title"
            id="title"
            value="{{ old('title', $game->title ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm bg-gray-500 text-white" />
        @error('title')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="description" class="block text-sm text-white">Description</label>
        <input
            type="text"
            name="description"
            id="description"
            value="{{ old('description', $game->description ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm bg-gray-500 text-white" />
        @error('description')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="genre" class="block text-sm text-white">Genre</label>
        <input
            type="text"
            name="genre"
            id="genre"
            value="{{ old('genre', $game->genre ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm bg-gray-500 text-white" />
        @error('genre')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="release_year" class="block text-sm text-white">Release Year</label>
        <input
            type="integer"
            name="release_year"
            id="release_year"
            value="{{ old('release_year', $game->release_year ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm bg-gray-500 text-white" />
        @error('release_year')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>


    <div class="mb-4">
        <label for="image" class="block text-sm font-medium text-white">Game Cover Image</label>
        <input
            type="file"
            name="image"
            id="image"
            {{ isset($game) ? '' : 'required' }}
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 bg-gray-500 text-white"
        />
        @error('image')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    @isset($game->image)
        <div class="mb-4">
            <img src="{{ asset($game->image) }}" alt="Game cover" class="w-24 h-32 object-cover">
        </div>
    @endisset

    <div>
        <x-primary-button>
            {{ isset($game) ? 'Update Game' : 'Add Game'}}
        </x-primary-button>
    </div>
</form>