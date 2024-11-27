@props(['action', 'method', 'company' => null])

<form action="{{ $action }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if($method === 'PUT' || $method === 'PATCH')
        @method($method)
    @endif

    <div class="mb-4">
        <label for="name" class="block text-sm text-white">Name</label>
        <input
            type="text"
            name="name"
            id="name"
            value="{{ old('name', $company->name ?? '') }}"
            required
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm bg-gray-500 text-white" />
        @error('name')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>


    <div>
            <label for="role" class="block text-sm font-medium text-white">Role</label>
            <select name="role" id="role" class="mt-1 block w-full bg-gray-700 text-white" required>
                <option value="developer">Developer</option>
                <option value="publisher">Publisher</option>
            </select>
            @error('role')
                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
            @enderror
        </div>

    <div class="mb-4">
        <label for="image" class="block text-sm font-medium text-white">Company Image</label>
        <input
            type="file"
            name="image"
            id="image"
            {{ isset($company) ? '' : 'required' }}
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 bg-gray-500 text-white"
        />
        @error('image')
            <p class="text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    @isset($company->image)
        <div class="mb-4">
            <img src="{{ asset("images/companies/" . $company->image) }}" alt="Company cover" class="w-24 h-32 object-cover">
        </div>
    @endisset

    <div>
        <x-primary-button>
            {{ isset($company) ? 'Update Company' : 'Add Company'}}
        </x-primary-button>

        <a href="{{ route('companies.index') }}" class="text-gray-600 bg-orange-300 hover:bg-orange-700 font-bold py-2 px-4 rounded">
            Cancel
        </a>
    </div>
</form>