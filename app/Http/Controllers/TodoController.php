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
            ->orderByRaw("
            CASE priority
                WHEN '高' THEN 1
                WHEN '中' THEN 2
                WHEN '低' THEN 3
            END
        ")
            ->orderBy('order')
            ->get();

        return view('todos.index', compact('todos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:50',
            'priority' => 'required|in:高,中,低',
            'due_date' => 'nullable|date',
        ]);

        Todo::create([
            'title' => $request->title,
            'completed' => false,
            'user_id' => Auth::id(),
            'priority' => $request->priority,
            'order' => Todo::where('user_id', Auth::id())->max('order') + 1,
            'due_date' => $request->due_date,
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
    public function updatePriority(Request $request, Todo $todo)
    {
        $this->authorize('update', $todo);

        $request->validate([
            'priority' => 'required|in:高,中,低',
        ]);

        $todo->update([
            'priority' => $request->priority,
        ]);

        return response()->json([
            'priority' => $todo->priority,
        ]);
    }
    public function reorder(Request $request)
    {
        foreach ($request->order as $item) {
            Todo::where('id', $item['id'])
                ->where('user_id', Auth::id())
                ->update([
                    'order' => $item['order'],
                    'priority' => $item['priority'],
                ]);
        }

        return response()->json(['status' => 'ok']);
    }
}
