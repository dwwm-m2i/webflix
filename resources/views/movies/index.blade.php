@extends('layouts.app')

@section('content')
    <div class="flex items-center gap-10 mb-6">
        <h1 class="text-3xl">Films</h1>
        <a href="/films/creer" class="px-4 py-2 text-sm bg-blue-500 hover:bg-blue-300 duration-200 text-white rounded-full shadow-sm">Créer un film</a>
    </div>

    <div>
        @foreach ($movies as $movie)
            <div>
                <h3>{{ $movie->title }}</h3>
                <p>{{ $movie->synopsis }}</p>
                <p>Durée: {{ $movie->duration }}</p>
                <img class="w-32" src="{{ $movie->cover }}" alt="{{ $movie->title }}">
                @if ($movie->released_at)
                <p>Sortie: {{ $movie->released_at }}</p>
                @endif
                @if ($movie->category_id)
                <p>Catégorie: {{ $movie->category_id }}</p>
                @endif
                <a href="/film/{{ $movie->id }}">Voir</a>
            </div>
        @endforeach
    </div>
@endsection
