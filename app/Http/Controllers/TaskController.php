<?php

namespace App\Http\Controllers;


use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Requests\CreateTaskRequest;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function create(CreateTaskRequest $request)
    {
        Auth::user()->tasks()->create($request->validated());

        return redirect()->back();
    }

    public function delete(DeleteTaskRequest $request, Task $task)
    {
        $task->delete();

        return redirect()->back();
    }

    public function update(UpdateTaskRequest $request, Task $task)
    {

       $task->update($request->validated());

        return redirect()->back()->with('success', 'Задача успешно обновлена!');
    }
}
