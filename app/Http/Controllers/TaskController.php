<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function store(Request $request)
    {
        // التحقق من البيانات المدخلة
        $task = new Task();
        $task->name = $request->taskName;
        $task->date = $request->taskDate;
        $task->time = $request->taskTime;
        $task->save();  // تخزين البيانات في قاعدة البيانات

        return redirect('/tasks')->with('success', 'تمت إضافة المهمة بنجاح!');
    }

    public function index()
    {
        $tasks = Task::all();
        return view('daily_tasks', compact('tasks'));
    }

}