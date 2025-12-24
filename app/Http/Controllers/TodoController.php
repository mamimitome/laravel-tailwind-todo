<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::latest()->get();
        return view('todos.index', compact('todos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
        ]);

        Todo::create([
            'title' => $request->title,
        ]);

        return redirect('/todos');
    }

    public function update(\Illuminate\Http\Request $request, \App\Models\Todo $todo)
    {
    $todo->update([
        // チェックされて送信されたら "on" が来るので true、来なければ false
        'completed' => $request->has('completed'),
    ]);

    return redirect()->route('todos.index');
    }

    public function destroy(Todo $todo)
    {
    $todo->delete();

    return redirect('/todos');
    }

}

