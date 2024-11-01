@props(['title', 'release_year', 'description', 'image'])

<div class="border rounded-lg shadow-md p-6 bg-gray-900 hover:shadow-lg transition duration-300 text-center">
    <h4 class="font-bold text-lg mb-2 text-white">{!! $title !!}</h4>
    <img src="{{asset('images/games/' . $image)}}" alt="{{$title}}" class="w-full h-100 object-cover mx-auto">
</div>

<!--     
gray-800
<p class="text-gray-700 leading-relaxed">{{ $description }}</p> 
         This is what I had originally but the "&" kept appearing as "&amp;" so I changed it. I also made this change to the description in game-details.blade.php for the same reason. -->