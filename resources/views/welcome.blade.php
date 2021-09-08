@extends('layouts.app')

@section('content')
    @if (Auth::check())
        {{-- 投稿一覧 --}}
        @include('tasks.index')
        {!! link_to_route('tasks.create','新規タスクの投稿',[],['class'=>'btn btn-primary']) !!}
    @else
        <div class="center jumbotron">
            <div class="text-center">
                <h1>タスクリスト</h1>
                {{-- ユーザ登録ページへのリンク --}}
                {!! link_to_route('signup.get', 'サインアップ', [], ['class'=>'btn btn-lg btn-primary']) !!}
            </div>
        </div>
    @endif
@endsection