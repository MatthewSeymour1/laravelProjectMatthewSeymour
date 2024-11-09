@props(['title', 'image'])
<div class="border rounded-lg shadow-md p-6 bg-gray-900 hover:shadow-lg transition duration-300 text-center">
    <h4 class="font-bold text-lg mb-2 text-white">{!! $title !!}</h4>
    <img src="{{asset('images/games/' . $image)}}" alt="{{$title}}" class="w-full h-100 object-cover mx-auto">
</div>
