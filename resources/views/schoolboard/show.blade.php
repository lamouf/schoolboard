@extends('layouts.app')

@section('content')
{{  Form::model($schoolboard, ['route' => ['schoolboard.show', $schoolboard->id]]) }}
@endsection