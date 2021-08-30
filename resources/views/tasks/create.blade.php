@extends('layouts.app')

@section('content')

<h1>新規タスク作成</h1>

<div class="col-6">
    {!! Form::model($task,['route'=>'tasks.store']) !!}

    <div class="form-group">
        {!! Form::label('content','タスク：') !!}
        {!! Form::text('content',null,['class'=>'form-control']) !!}
    </div>

    {!! Form::submit('投稿',['class'=>'btn btn-primary']) !!}

    {!! Form::close() !!}
</div>

@endsection