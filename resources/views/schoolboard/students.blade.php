@extends('layouts.app')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{  route("schoolboard.index") }}">School Boards</a></li>
        <li class="active">{{ $schoolboard->name }} Students</li>
    </ol>
@endsection
@section('content')

    <ul class="list-group">
        @foreach($students as $student)
            <li class="list-group-item">
                <a href="{{  route("schoolboard.student", ['schoolboardId' => $schoolboard->id, 'studentId' => $student->id]) }}"
                   class="navbar-link">{{ $student->firstname }} {{ $student->lastname }}</a></li>
        @endforeach
    </ul>
@endsection