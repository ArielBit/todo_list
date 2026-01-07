<?php


namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;  // <-- AJOUTE CETTE LIGNE


class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function store(Request $request)
    {
        Task::create([
            'title' => $request->title
        ]);

        return redirect('/');
    }

    public function update(Request $request, Task $task)
{
    $request->validate([
        'title' => 'required|string|max:255',
    ]);

    $task->update([
        'title' => $request->title,
    ]);

    return redirect('/');
}


    public function destroy(Task $task)
    {
        $task->delete();
        return redirect('/');
    }
}
