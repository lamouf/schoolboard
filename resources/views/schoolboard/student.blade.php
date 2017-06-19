@extends('layouts.app')

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{  route("schoolboard.index") }}">School Boards</a></li>
        <li><a href="{{  route("schoolboard.students", ['schoolboardId' => $student->schoolboard->id ]) }}">{{ $student->schoolboard->name }}</a></li>
        <li class="active">{{ $student->firstname }} {{ $student->lastname }}</li>
    </ol>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">
                <div class="well well-sm">
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive" />
                        </div>
                        <div class="col-sm-6 col-md-8">
                            <h4>{{ $student->full_name }}</h4>
                            <p>
                                <i class="glyphicon glyphicon-envelope"></i>{{ $student->email }}
                                <br />
                                <i class="glyphicon glyphicon-plus"></i>{{ $student->created_at->format('D m Y') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                <div class="page-header">
                    <h1>{{ $student->full_name }} Grades</h1>
                    <h2>Average : {{ $student->getAverageGrades()['avg'] }}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($errors->all() as $error)
                <p class="error"></p>
                <div class="alert alert-danger" role="alert">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Error:</span>
                    {{ $error }}
                </div>
            @endforeach

            <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                {!! Form::open(['route' => 'schoolboard.add_grade', 'method' => 'post', 'class' => 'navbar-form navbar-left']) !!}
                {{ Form::hidden('schoolboard_id', $student->schoolboard->id) }}
                {{ Form::hidden('student_id', $student->id) }}
                <div class="form-group">
                    {{ Form::number('grade', 0, ['class' => 'form-control']) }}
                </div>
                {{ Form::submit('Add Grade ', ['class' => 'btn btn-primary']) }}
                {!! Form::close() !!}
            </div>
        </div>
        <div class="row">
            <ul class="list-group">
                @foreach($student->grades as $key => $grade)
                    <li class="list-group-item">
                        <span class="badge">Added : {{ $grade->created_at->format('Y m d') }}</span>
                        Grade {{ $key + 1 }} : <strong>{{ $grade->grade }}</strong>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

@endsection