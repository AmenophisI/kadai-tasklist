<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index()
    {
        $data = [];
        if (\Auth::check()) {
            $user = \Auth::user();
            $tasks = $user->tasks()->orderBy('id', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'tasks' => $tasks,
            ];
        }

        return view('welcome', $data);
    }

    public function create()
    {
        if (\Auth::check()) {
            $task = new Task();

            return view('tasks.create', ['task' => $task]);
        } else {
            return redirect('/');
        }
    }

    public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'content' => 'required',
            'status' => 'required|max:10',
        ]);

        // メッセージを作成
        $request->user()->tasks()->create([
            'content' => $request->content,
            'status' => $request->status,
        ]);

        // トップページへリダイレクトさせる
        return redirect('/');
    }

    public function show($id)
    {
        $task = Task::findOrFail($id);
        if (\Auth::id() === $task->user_id) {
            return view('tasks.show', ['task' => $task]);
        } else {
            return redirect('/');
        }
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        if (\Auth::id() === $task->user_id) {
            return view('tasks.edit', ['task' => $task]);
        } else {
            return redirect('/');
        }
    }

    public function update(Request $request, $id)
    {
        // パリテーション
        $request->validate([
            'content' => 'required',
            'status' => 'required|max:10',
        ]);

        $task = Task::findOrFail($id);

        $task->content = $request->content;
        $task->status = $request->status;
        $task->save();

        return redirect('/');
    }

    public function destroy($id)
    {
        $task = \App\Task::findOrFail($id);

        if (\Auth::id() === $task->user_id) {
            $task->delete();
        }

        return redirect('/');
    }
}
