@extends('layouts.app')

@section('content')
    @foreach ($errors->all() as $error)
        {{ $error }}
    @endforeach

    <form action="" method="post">
        @csrf
        <input type="text" name="name" value="{{ old('name') }}">
        <button>Sauvegarder</button>
    </form>
@endsection
