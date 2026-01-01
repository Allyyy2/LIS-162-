<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Playlist: {{ $playlist->name }}
            </h2>
            <a href="{{ route('dashboard') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Back to Dashboard
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if($songs->isEmpty())
                    <p class="text-gray-500 text-center">This playlist is empty. Go to the dashboard to add songs!</p>
                @else
                    <table class="w-full text-left">
                        <thead>
                            <tr class="border-b">
                                <th class="pb-2">Cover</th>
                                <th class="pb-2">Title</th>
                                <th class="pb-2">Artist</th>
                                <th class="pb-2 text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($songs as $song)
                            <tr class="border-b hover:bg-gray-50">
                                <td class="py-2"><img src="{{ $song->image }}" class="w-12 h-12 rounded object-cover"></td>
                                <td class="py-2 font-bold">{{ $song->title }}</td>
                                <td class="py-2 text-gray-600">{{ $song->artist }}</td>
                                <td class="py-2 text-right">
                                    <form action="{{ route('playlists.removeSong', [$playlist->id, $song->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700 text-sm">Remove</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>