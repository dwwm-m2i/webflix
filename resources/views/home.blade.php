@extends('layouts.app')

{{-- On prend le contenu de layouts/app.blade.php --}}
{{-- Le contenu de la section content va prendre
    la place du yield content --}}
@section('content')
    <h1>Hello {{ $name }}</h1>

    <ul>
    @foreach ($games as $game)
        <li>{{ $game }}</li>
    @endforeach
    </ul>
@endsection
