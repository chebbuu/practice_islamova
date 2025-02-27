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
        $user = Auth::user();
        $task = $user->tasks()->create([
            'name' => $request->validated()['name'],
            'description' => $request->validated()['description'],
        ]);


        return redirect()->back();
    }

    public function delete(Request $request, Task $task)
    {
        $task->delete();

        return redirect()->back();
    }

    public function update(Request $request, Task $task)
    {

        $task->update($request->only(['name', 'description']));

        $task->save();

        return redirect()->back()->with('success', 'Задача успешно обновлена!');
    }
}
