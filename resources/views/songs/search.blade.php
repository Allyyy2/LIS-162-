<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Search Spotify') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
           
            <div class="mb-6">
                <form action="{{ route('songs.search') }}" method="GET" class="flex gap-2">
                    <input type="text" name="q" placeholder="Search for a song..." value="{{ $query ?? '' }}"
                        class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                   
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 font-bold transition shadow-sm">
                        Search
                    </button>
                </form>
            </div>


            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @if(isset($tracks))
                    @foreach($tracks as $track)
                        <div class="bg-white p-4 rounded-lg shadow flex items-center gap-4">
                           
                            @if(isset($track->album->images[0]))
                                <img src="{{ $track->album->images[0]->url }}" alt="Album Art" class="w-16 h-16 rounded object-cover flex-shrink-0 border border-gray-100">
                            @endif


                            <div class="flex-1 min-w-0">
                                <h3 class="font-bold text-gray-800 truncate" title="{{ $track->name }}">
                                    {{ $track->name }}
                                </h3>
                                <p class="text-sm text-gray-600 truncate" title="{{ $track->artists[0]->name }}">
                                    {{ $track->artists[0]->name }}
                                </p>
                            </div>


                            <form action="{{ route('songs.store') }}" method="POST" class="flex-shrink-0">
                                @csrf
                                <input type="hidden" name="spotify_id" value="{{ $track->id }}">
                                <input type="hidden" name="title" value="{{ $track->name }}">
                                <input type="hidden" name="artist" value="{{ $track->artists[0]->name }}">
                                <input type="hidden" name="image" value="{{ $track->album->images[0]->url ?? '' }}">
                               
                                <button type="submit" class="bg-blue-500 text-white p-2 rounded-full hover:bg-blue-600 flex items-center justify-center transition-colors shadow-sm" title="Add to collection">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" class="w-5 h-5">
                                      <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    @endforeach
                @endif
            </div>
           
        </div>
    </div>
</x-app-layout>