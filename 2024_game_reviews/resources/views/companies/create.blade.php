<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Create New Company') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="font-semibold text-lg text-white mb-4">Add a New Company:</h3>

                    <x-company-form
                        :action="route('companies.store')"
                        :method="'POST'"
                        :games="$games"
                    />

                </div>
            </div>
        </div>
    </div>
</x-app-layout>