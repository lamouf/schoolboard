@extends('layouts.app')

@section('content')

    <ul class="list-group">
        @foreach($schoolboards as $schoolboard)
            <li class="list-group-item">
                <a href="{{  route("schoolboard.students", ['schoolboardId' => $schoolboard->id]) }}" class="navbar-link">{{ $schoolboard->name }}</a>
            </li>
        @endforeach
    </ul>
@endsection