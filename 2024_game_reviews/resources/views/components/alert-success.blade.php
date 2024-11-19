@if(session('success'))
    <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
        {{ $slot }}
    </div>
@endif