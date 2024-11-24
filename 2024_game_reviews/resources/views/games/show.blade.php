<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Games') }}
        </h2>
    </x-slot>

     <!-- Flash Message Display -->
     <x-alert-success>
        {{ session('success') }}
    </x-alert-success>

    <x-alert-error>
        {{ session('error') }}
    </x-alert-error>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white">
                    <h3 class="font-semibold text-lg mb-4">Games Details:</h3>
                    <x-game-details
                        :title="$game->title"
                        :image="$game->image"
                        :release_year="$game->release_year"
                        :description="$game->description"
                        :genre="$game->genre"
                        :publishers="$game->publishers"
                        :developers="$game->developers"
                    />
                    
                    <!-- Shows Reviews: -->
                    <h4 class="font-semibold text-md mt-8">Reviews</h4>
                    @if($game->reviews->isEmpty())
                        <p class="text-gray-400">No Reviews Yet</p>
                    @else
                        <ul class="mt-4 space-y-4">
                            @foreach($game->reviews as $review)
                                <li class="bg-gray-100 p-4 rounded-lg text-black">
                                    <p class="font-semibold">{{ $review->user->name }} ({{ $review->created_at->format('M d, Y') }})</p>
                                    <p>Rating: {{ $review->rating }} / 10</p>
                                    <p>{{ $review->comment }}</p>


                                    @if ($review->user->is(auth()->user()) || auth()->user()->role === 'admin')

                                        <a href="{{ route('reviews.edit', $review) }}" class="bg-yellow-500 hover:bg-orange-700 text-white font-bold py-2 px-4 rounded">
                                            {{ __('Edit Review') }}
                                        </a>
                                        <form method="POST" action="{{ route('reviews.destroy', $review) }}" onsubmit="return confirm('Are you sure you want to delete this review?');">
                                            @csrf
                                            @method('delete')
                                            <x-danger-button>
                                                {{ __('Delete Review') }}
                                            </x-danger-button>
                                        </form>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    <!-- Add a new review: -->
                     <h4 class="font-semibold text-md mt-8">Add a Review</h4>
                     <form action="{{ route('reviews.store', $game) }}" method="POST" class="mt-4">
                        @csrf
                        <div class="mb-4">
                            <label for="rating" class="block font-medium text-sm text-gray-400">Rating</label>
                            <select name="rating" id="rating" class="mt-1 block w-full text-black" required>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="comment" class="block font-medium text-sm text-gray-400">Comment</label>
                            <textarea name="comment" id="comment" rows="3" class="mt-1 block w-full text-black" placeholder="Write your review here..."></textarea>
                        </div>

                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Submit Review
                        </button>
                     </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>