<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Create New Game') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg text-white mb-4">Add a New Game:</h3>

                    <x-game-form
                        :action="route('games.store')"
                        :method="'POST'"
                    />

                </div>
            </div>
        </div>
    </div>
</x-app-layout>