@extends('layouts.app')

@section('content')
    <div>
        <a href="/films" class="text-gray-500">Retour aux films</a>
        <h1>{{ $movie->title }}</h1>
        <p>{{ $movie->synopsis }}</p>
        <p>Durée: {{ $movie->duration }}</p>
        <img class="w-32" src="{{ $movie->cover }}" alt="{{ $movie->title }}">
        @if ($movie->released_at)
        <p>Sortie: {{ $movie->released_at }}</p>
        @endif
        @if ($movie->category_id)
        <p>Catégorie: {{ $movie->category_id }}</p>
        @endif
    </div>
@endsection
