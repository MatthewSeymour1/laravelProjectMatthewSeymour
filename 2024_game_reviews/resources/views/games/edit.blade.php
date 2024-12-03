<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Edit Game') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg mb-4 text-white">Edit Game:</h3>

                    <x-game-form
                        :action="route('games.update', $game)"
                        :method="'PATCH'"
                        :game="$game"
                        :companies="$companies"
                        :relatedCompanies="$relatedCompanies"
                    />

                </div>
            </div>
        </div>
    </div>
</x-app-layout>