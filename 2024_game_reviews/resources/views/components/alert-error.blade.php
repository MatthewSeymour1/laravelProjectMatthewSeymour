@if(session('error'))
    <div class="mb-4 px-4 py-2 bg-red-300 border border-green-500 text-green-700 rounded-md">
        {{ $slot }}
    </div>
@endif