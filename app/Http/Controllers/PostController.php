<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function addTask(Request $request){
        $data = $request->only('name','description');
        $validation = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        if($validation){
            $todo = Task::create([
                'name' => $data['name'],
                'description' => $data['description'],
                'user_id'=>auth()->id()
            ]);
        }
        if($todo){
            return redirect()->back()->with('success','Task added successfully');
        }
        else{
            return redirect()->back()->with('error','Task not added');
        }
    }

    public function deleteTask(request $request){
        $data = $request->only('taskId');
        $del_task = Task::where('id',$data['taskId'])->delete();
        if($del_task){
            return redirect()->back()->with('success','Task deleted successfully');
        }
        else{
            return redirect()->back()->with('error','Task not deleted');
        }
    }
    public function updateTask(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);
        $data = $request->only('taskId', 'name', 'description');

        Task::where('id', $data['taskId'])->update([
            'name' => $data['name'],
            'description' => $data['description'],
        ]);

        return redirect()->back()->with('success', 'Задача успешно обновлена!');
    }
}
