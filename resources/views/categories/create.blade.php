@extends('layouts.app')

@section('content')
    <h1 class="text-3xl mb-3">Ajouter une catégorie</h1>

    @foreach ($errors->all() as $error)
        <p class="text-red-500">{{ $error }}</p>
    @endforeach

    <form action="" method="post">
        @csrf
        <div class="mb-3">
            <label for="name" class="block">Nom</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" class="rounded shadow">
        </div>
        <button>Sauvegarder</button>
    </form>
@endsection
