@extends('layouts.app')

@section('content')
    <h1>A propos de {{ $title }}</h1>

    <ul>
    @foreach ($team as $member)
        <li>
            <img src="{{ $member['image'] }}" alt="{{ $member['name'] }}">
            {{ $member['name'] }}
            ({{ $member['job'] }})
        </li>
    @endforeach
    </ul>
@endsection
