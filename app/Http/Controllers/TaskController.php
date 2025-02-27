<?php

namespace App\Http\Controllers;


use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\CreateTaskRequest;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function create(CreateTaskRequest $request)
    {
        Task::create([
            'name' => $request->validated()['name'],
            'description' => $request->validated()['description'],
            'user_id' => Auth::id()
        ]);

        return redirect()->back();
    }

    public function delete(request $request, Task $task)
    {
        $task->delete();

        return redirect()->back();
    }

    public function update(Request $request, Task $task)
    {
        $task->name = $request->name;

        $task->description = $request->description;

        $task->save();

        return redirect()->back()->with('success', 'Задача успешно обновлена!');
    }
}
