@props(['name', 'image', 'description', 'company'])

<div class="border rounded-lg shadow-md p-6 bg-gray-900 hover:shadow-lg transition duration-300 max-w-xl mx-auto">
    <h1 class="font-bold text-white mb-2" style="font-size: 3rem;">{!! $name !!}</h1>
    <div class="overflow-hidden rounded-lg mb-4 flex justify-center"> 
        <img src="{{asset('images/companies/' . $image)}}" alt="{{ $name }}" class="w-full h-auto object-cover">
    </div>

    <h3 class="text-white font-semibold mb-2" style="font-size: 2rem;">Description</h3>
    <p class="text-white leading-relaxed mb-3">{!! $description !!}</p>

    @if ($company->games->isNotEmpty())
        <h4 class="text-lg font-bold">Notable titles from {{ $name }}:</h4>
        <div class="container grid grid-cols-2 mb-5 gap-4">
                    @foreach ($company->games as $game)
                        <x-game-card
                            :title="$game->title"
                            :image="$game->image"
                        />
                    @endforeach
        </div>
    @endif



    <a href="{{ route('companies.index') }}" class="text-gray-600 bg-orange-300 hover:bg-orange-700 font-bold py-2 px-4 rounded">
            Back
    </a>
</div>