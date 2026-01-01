<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $todos = Todo::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('todos.index', compact('todos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:50',
        ]);

        Todo::create([
            'title' => $request->title,
            'completed' => false,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('todos.index');
    }

    public function update(Request $request, Todo $todo)
    {
    $this->authorize('update', $todo);

    $todo->update([
        'completed' => $request->boolean('completed'),
    ]);

    return response()->json([
        'completed' => $todo->completed,
    ]);
    }

    public function destroy(Todo $todo)
    {
        $this->authorize('delete', $todo);

        $todo->delete();

        return redirect()->route('todos.index');
    }
}
