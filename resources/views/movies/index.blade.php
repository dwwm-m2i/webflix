@extends('layouts.app')

@section('content')
    <div class="flex items-center gap-10 mb-6">
        <h1 class="text-3xl">Films</h1>
        <a href="/films/creer" class="px-4 py-2 text-sm bg-blue-500 hover:bg-blue-300 duration-200 text-white rounded-full shadow-sm">Créer un film</a>
    </div>

    <div class="flex flex-wrap -mx-3">
        @foreach ($movies as $movie)
            <div class="w-1/2 md:w-1/3 lg:w-1/5 mb-3">
                <div class="flex flex-col justify-between h-full">
                    <a href="/film/{{ $movie->id }}" class="block mx-3 group">
                        <img class="w-full h-[300px] object-cover mb-3" src="{{ $movie->cover }}" alt="{{ $movie->title }}">
                        <h3 class="text-sm text-gray-600 underline group-hover:no-underline">{{ $movie->title }}</h3>
                        <p class="text-sm mb-3">
                            @if ($movie->released_at)
                            {{ $movie->released_at->diffForHumans() }} |
                            {{ $movie->released_at->translatedFormat('d F Y') }} |
                            @endif
                            @if ($movie->category_id)
                            {{ $movie->category->name }} |
                            @endif
                            {{ $movie->duration() }}
                        </p>
                    </a>
                    {{-- On affiche modifier/supprimer si on est connecté et qu'on a le film --}}
                    @if (Auth::user() && Auth::user()->id == $movie->user_id)
                    <div class="mx-3 mb-3 flex justify-between gap-2">
                        <a class="text-sm bg-gray-500 px-2 py-1 text-gray-200 w-1/2 text-center" href="/film/{{ $movie->id }}/modifier">Modifier</a>
                        <a class="text-sm bg-red-500 px-2 py-1 text-gray-200 w-1/2 text-center" href="/film/{{ $movie->id }}/supprimer" onclick='return confirm("Êtes-vous sûr de vouloir supprimer le film {{ $movie->title }} ?")'>Supprimer</a>
                    </div>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection
