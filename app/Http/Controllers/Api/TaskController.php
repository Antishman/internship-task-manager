<?php

namespace App\Http\Controllers\Api;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status');
    
        if ($status === 'completed') {
            $tasks = Task::where('is_completed', true)->get();
        } elseif ($status === 'pending') {
            $tasks = Task::where('is_completed', false)->get();
        } else {
            $tasks = Task::all();
        }
    
        return response()->json($tasks);
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $task = Task::create([
            'title' => $request->title,
            'is_completed' => false,
        ]);

        return response()->json($task, 201);
    }

    public function update($id)
    {
        $task = Task::findOrFail($id);
        $task->update(['is_completed' => true]);

        return response()->json($task);
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return response()->json(['message' => 'Task deleted']);
    }
}
