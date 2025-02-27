<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function mainPage(){
        $tasks = Task::where('user_id',auth()->id())->get();
        return view('main',[
            'tasks' => $tasks
        ]);
    }
}
