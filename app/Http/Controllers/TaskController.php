<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchTaskRequest;
use App\Http\Requests\UpdateStatusTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\CreateTaskRequest;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', auth()->id())->get();

        return view('main', [
            'tasks' => $tasks
        ]);
    }

    public function search(SearchTaskRequest $request)
    {
        $search = $request->validated()['search'];

        $tasks = Auth::user()->tasks()->where('name', 'LIKE', "%{$search}%")->paginate(5);

        return view('main', [
            'tasks' => $tasks
        ]);
    }

    public function create(CreateTaskRequest $request)
    {
        Auth::user()->tasks()->create($request->validated());

        return redirect()->route('main');
    }

    public function delete(Task $task)
    {
        $task->delete();

        return redirect()->route('main');
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {
        $task->update($request->validated());

        return redirect()->route('main')->with('success', 'Задача успешно обновлена!');
    }

    public function updateStatus(UpdateStatusTaskRequest $request, Task $task)
    {
        $task->update($request->validated());

        return redirect()->route('main');
    }
}
