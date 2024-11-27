@props(['name', 'image'])

<div class="border rounded-lg shadow-md p-6 bg-gray-900 hover:shadow-lg transition duration-300 text-center">
    <h4 class="font-bold text-lg mb-2 text-white">{{ $name }}</h4>
    <img src="{{asset('images/companies/' . $image)}}" alt="{{$name}}" class="w-full h-100 object-cover mx-auto">
</div>
