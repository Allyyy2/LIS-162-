<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Music Collection') }}
            </h2>
            <div class="flex gap-2">
                <a href="{{ route('playlists.create') }}"
                   class="bg-sky-500 hover:bg-sky-600 text-white font-bold py-2 px-4 rounded shadow text-sm">
                    Create Playlist
                </a>
                <a href="{{ route('songs.search') }}"
                   class="bg-blue-600 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded shadow text-sm">
                    Add New Song
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- PLAYLISTS --}}
            <div class="mb-6">
                <h3 class="text-lg font-bold text-gray-800 mb-3 border-b pb-2">My Playlists</h3>

                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-3">
                    @forelse($playlists as $playlist)
                        <div class="bg-indigo-50 border border-indigo-100 p-3 rounded-lg shadow-sm hover:shadow-md transition">
                            <div class="text-center mb-2">
                                <div class="text-2xl mb-1">🎵</div>
                                <h4 class="font-bold text-indigo-900 text-sm truncate">{{ $playlist->name }}</h4>
                                <p class="text-xs text-indigo-500">{{ $playlist->songs->count() }} Songs</p>
                            </div>

                            <div class="flex justify-between items-center border-t border-indigo-200 pt-2 mt-2">
                                <a href="{{ route('playlists.show', $playlist) }}"
                                   class="text-blue-600 text-[11px] hover:underline font-semibold">
                                    View
                                </a>
                                <form action="{{ route('playlists.destroy', $playlist) }}" method="POST"
                                      onsubmit="return confirm('Delete this playlist?');">
                                    @csrf @method('DELETE')
                                    <button type="submit"
                                            class="text-[10px] text-red-500 hover:text-red-700 font-bold">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-2 text-gray-500 text-sm">No playlists yet. Create one!</div>
                    @endforelse
                </div>
            </div>

            {{-- SONGS --}}
            <div>
                <h3 class="text-lg font-bold text-gray-800 mb-3 border-b pb-2">My Songs</h3>

                {{-- 4 per row on desktop --}}
                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3">
                    @forelse($songs as $song)
                        <div class="bg-white overflow-hidden rounded-lg border border-gray-100 shadow-sm hover:shadow-md transition">

                            {{-- smaller image height --}}
                            <img src="{{ $song->image }}"
                                 alt="{{ $song->title }}"
                                 class="w-full h-28 object-cover">

                            {{-- tighter padding --}}
                            <div class="p-2">
                                <h3 class="font-semibold text-sm truncate text-gray-900">{{ $song->title }}</h3>
                                <p class="text-gray-500 text-[11px] truncate mb-2">{{ $song->artist }}</p>

                                {{-- smaller add-to-playlist --}}
                                <div class="bg-gray-50 rounded border border-gray-200">
                                    <form action="#" method="POST"
                                          onchange="if(this.playlist_id.value != '') { this.action = '/playlists/' + this.playlist_id.value + '/add-song'; this.submit(); }">
                                        @csrf
                                        <input type="hidden" name="song_id" value="{{ $song->id }}">

                                        <select name="playlist_id"
                                                class="w-full text-[11px] px-2 py-1 border-0 bg-transparent focus:ring-0 cursor-pointer text-gray-600">
                                            <option value="">+ Add to Playlist</option>
                                            @foreach($playlists as $playlist)
                                                <option value="{{ $playlist->id }}">{{ $playlist->name }}</option>
                                            @endforeach
                                        </select>
                                    </form>
                                </div>

                                {{-- tighter actions --}}
                                <div class="flex justify-between items-center mt-2">
                                    <a href="{{ route('songs.show', $song) }}"
                                       class="text-blue-600 text-[11px] hover:underline font-semibold">
                                        View
                                    </a>

                                    <form action="{{ route('songs.destroy', $song) }}" method="POST"
                                          onsubmit="return confirm('Delete?');">
                                        @csrf @method('DELETE')
                                        <button type="submit"
                                                class="text-red-500 text-[11px] hover:text-red-700">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full text-center py-10 text-gray-500">
                            <p>No songs added yet.</p>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</x-app-layout>