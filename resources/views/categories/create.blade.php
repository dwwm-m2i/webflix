@extends('layouts.app')

@section('content')
    <form action="" method="post">
        @csrf
        <input type="text" name="name">
        <button>Sauvegarder</button>
    </form>
@endsection
