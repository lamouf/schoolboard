@extends("layouts.app")

@section('content')
    <h1>404</h1>
    <h2>{{ $exception->getMessage() }}</h2>
@endsection