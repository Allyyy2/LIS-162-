<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Song Details
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 flex flex-col items-center">
                <img src="{{ $song->image }}" alt="Album Art" class="w-64 h-64 rounded shadow-lg mb-4">
                <h1 class="text-3xl font-bold">{{ $song->title }}</h1>
                <p class="text-xl text-gray-600">{{ $song->artist }}</p>
                <div class="mt-6">
                    <a href="{{ route('dashboard') }}" class="text-blue-500 hover:underline">Back to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>