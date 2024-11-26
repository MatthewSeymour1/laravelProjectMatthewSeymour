<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('All Companies') }}
        </h2>
    </x-slot>

    <x-alert-success>
        {{ session('success') }}
    </x-alert-success>

    <x-alert-error>
        {{ session('error') }}
    </x-alert-error>

<!-- Here is where the sorting part would go. -->



            
<!-- Here is a foreach loop that creates a company card for each company in the database. -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white bg-gray-900">
                    <h3 class="font-semibold text-lg mb-4">List of Companys:</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($uniqueCompanies as $company)
                        <div>
                            <a href="{{ route('companies.show', $company) }}">
<!-- the "x-company-card" looks for a corresponding component in the components folder called company-card. -->
                                <x-company-card
                                    :name="$company"
                                />
<!-- Here is the edit and delete buttons (in the foreach loop) which now only appear if the user is a user and not an admin. -->

                                @if(auth()->user()->role === 'admin')
                                    <div class="mt-4 flex space-x-2">
                                        <a href="{{ route('companies.edit', $company) }}" class="text-gray-600 bg-orange-300 hover:bg-orange-700 font-bold py-2 px-4 rounded">
                                            Edit
                                        </a>

    <!-- @csrf is used to protect the application from CSRF attacks. By ensuring that the form request is coming from the same application
        and not a third party site, it increases the security.
        CSRF attacks occur when a malcious user tricks a logged in user into performing
        an unwanted action on a site where they are authenticated. -->
                                        <form action="{{ route('companies.destroy', $company) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this company?');">
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