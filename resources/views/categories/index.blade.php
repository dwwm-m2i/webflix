@extends('layouts.app')

@section('content')
    <div class="flex items-center gap-10 mb-6">
        <h1 class="text-3xl">Nos catégories</h1>
        <a href="/categories/creer">Créer une catégorie</a>
    </div>

    <div>
        @foreach ($categories as $category)
            <div>
                <h2>{{ $category->name }}</h2>
            </div>
        @endforeach
    </div>
@endsection
