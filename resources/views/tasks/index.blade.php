<h1>{{ Auth::user()->name }}のタスク一覧</h1>

@if(count($tasks)>0)
    <table class="table table-striped">
        <thead>
            <tr>
                <th>id</th>
                <th>タスク</th>
                <th>ステータス</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                <tr>
                    <td>{{ link_to_route('tasks.show',$task->id,['task'=>$task->id]) }}</td>
                    <td>{{ $task->content }}</td>
                    <td>{{ $task->status }}</td>
                    <td>@if(Auth::id()===$task->user_id)
                        {{-- 投稿削除 --}}
                        {!! Form::open(['route'=>['tasks.destroy',$task->id],'method'=>'delete']) !!}
                            {!! Form::submit('削除', ['class'=>'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    @endif</td>
                </tr>
                <div>
                    
                </div>
            @endforeach
        </tbody>
    </table>
@endif

{{-- ページネーションのリンク --}}
{{ $tasks->links() }}