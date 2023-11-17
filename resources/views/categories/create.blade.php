@extends('layouts.app')

@section('content')
    @foreach ($errors->all() as $error)
        <p class="text-red-500">{{ $error }}</p>
    @endforeach

    <form action="" method="post">
        @csrf
        <div>
            <input type="text" name="name" value="{{ old('name') }}" class="rounded shadow">
        </div>
        <button>Sauvegarder</button>
    </form>
@endsection
