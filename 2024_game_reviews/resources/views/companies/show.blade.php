<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Games') }}
        </h2>
    </x-slot>

     <!-- Flash Message Display -->
     <x-alert-success>
        {{ session('success') }}
    </x-alert-success>

    <x-alert-error>
        {{ session('error') }}
    </x-alert-error>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white">
                    <h3 class="font-semibold text-lg mb-4">Companys Details:</h3>
                    <x-company-details
                        :name="$company->name"
                        :image="$company->image"
                        :description="$company->description"
                        :company="$company"
                    />

                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>