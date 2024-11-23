@props(['title', 'release_year', 'description', 'image', 'genre', 'publishers'])

<div class="border rounded-lg shadow-md p-6 bg-gray-900 hover:shadow-lg transition duration-300 max-w-xl mx-auto">
    <h1 class="font-bold text-white mb-2" style="font-size: 3rem;">{!! $title !!}</h1>
    <div class="overflow-hidden rounded-lg mb-4 flex justify-center"> 
        <img src="{{asset('images/games/' . $image)}}" alt="{{ $title }}" class="w-full max-w-xs h-auto object-cover">
    </div> 
    <h2 class="text-gray-300 text-sm italic mb-4" style="font-size: 1rem;">Published: {{ $release_year }}</h2>
    <h2 class="text-gray-300 text-sm italic mb-4" style="font-size: 1rem;">Genre: {{ $genre }}</h2>
    <h3 class="text-white font-semibold mb-2" style="font-size: 2rem;">Description</h3>
    <p class="text-white leading-relaxed mb-3">{!! $description !!}</p>
    <a href="{{ route('games.index') }}" class="text-gray-600 bg-orange-300 hover:bg-orange-700 font-bold py-2 px-4 rounded">
            Back
    </a>
    <!-- If there are publishers, then show them. Else show "No publishers etc" -->
    @if ($publishers->isEmpty())
        <p>No publishers available for this game</p>
    @elseif ($publishers->count() === 1)
        <p>This game was published by {{ $publishers->first()->name }}.</p>
    else
    <p>Publishers:</p>
    @foreach ($publishers as $publisher)
    <div>{{ $publisher->name }}</div>
    @endforeach
    @endif
    

    <!--     <p class="text-gray-700 leading-relaxed">{{ $description }}</p> 
         This is what I had originally but the "&" kept appearing as "&amp;" so I changed it. I also made this change to the title. -->
</div>