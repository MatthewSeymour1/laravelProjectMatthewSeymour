@props(['title', 'release_year', 'description', 'image', 'genre', 'publishers', 'developers'])

<!-- To use the implode function (in order to get a list of items in this case the names of the publishers) you need to have an array,
  so this part initialises the array, pushes each publisher name into it, and then uses emplode function. Then I do the same for the developers -->
@php
$publishersArray = [];
foreach ($publishers as $p) {
    array_push($publishersArray, $p->name);
}
$publishersString = implode(', ', $publishersArray);

$developersArray = [];
foreach ($developers as $d) {
    array_push($developersArray, $d->name);
}
$developersString = implode(', ', $developersArray);
@endphp

<div class="border rounded-lg shadow-md p-6 bg-gray-900 hover:shadow-lg transition duration-300 max-w-xl mx-auto">
    <h1 class="font-bold text-white mb-2" style="font-size: 3rem;">{!! $title !!}</h1>
    <div class="overflow-hidden rounded-lg mb-4 flex justify-center"> 
        <img src="{{asset('images/games/' . $image)}}" alt="{{ $title }}" class="w-full max-w-xs h-auto object-cover">
    </div> 
    <p class="text-gray-300 text-sm italic mb-4" style="font-size: 1rem;">Year Published: {{ $release_year }}</p>
    <p class="text-gray-300 text-sm italic mb-4" style="font-size: 1rem;">Genre: {{ $genre }}</p>
    <!-- If there are publishers, then show them. Else show "No publishers etc" -->
    @if ($publishers->isEmpty())
        <p class="text-gray-300 text-sm italic mb-4">Publishers: No publishers available for this game</p>
    @else
        <p class="text-gray-300 text-sm italic mb-4">Publishers: {{ $publishersString }}</p>
    @endif
    @if ($developers->isEmpty())
        <p class="text-gray-300 text-sm italic mb-4">No developers available for this game</p>
    @else
        <p class="text-gray-300 text-sm italic mb-4">Developers: {{ $developersString }}</p>
    @endif
    <h3 class="text-white font-semibold mb-2" style="font-size: 2rem;">Description</h3>
    <p class="text-white leading-relaxed mb-3">{!! $description !!}</p>
    <a href="{{ route('games.index') }}" class="text-gray-600 bg-orange-300 hover:bg-orange-700 font-bold py-2 px-4 rounded">
            Back
    </a>

<!-- Initially used {{ $description }}, but HTML entities (e.g., "&") rendered as "&amp;". Switched to {!! $description !!} for proper output. 
 The same adjustment was made for the title. -->

</div>