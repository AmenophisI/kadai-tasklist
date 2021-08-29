@extends('layouts.app')

@section('content')

<h1>タスク一覧</h1>

@if(count($tasks)>0)
    <table class="table table-striped">
        <thred>
            <tr>
                <th>id</th>
                <th>タスク</th>
            </tr>
        </thred>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ $task->id }}</td>
                    <td>{{ $task->content }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endif

@endsection