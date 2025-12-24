<!DOCTYPE html>
<html>
<head>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">ToDoリスト</h1>

    <form method="POST" action="/todos" class="flex gap-2 mb-4">
    @csrf
    <input name="title" class="border w-full px-3 py-2 rounded" placeholder="やること">
    <button class="bg-blue-500 text-white px-4 rounded">追加</button>
    </form>


    <ul class="space-y-2">
        @foreach ($todos as $todo)
            <li class="flex items-center justify-between border p-2 rounded
{{ $todo->completed ? 'bg-gray-200' : '' }}">

                <div class="flex items-center">
                    <form method="POST" action="{{ route('todos.update', $todo) }}">
                        @csrf
                        @method('PATCH')

                        <input
                            type="checkbox"
                            name="completed"
                            onChange="this.form.submit()"
                            {{ $todo->completed ? 'checked' : '' }}
                        >
                        <span class="ml-2 {{ $todo->completed ? 'line-through text-gray-500' : '' }}">
                            {{ $todo->title }}
                        </span>
                    </form>
                </div>

    {{-- 削除ボタン --}}
                <form method="POST" action="{{ route('todos.destroy', $todo) }}">
                    @csrf
                    @method('DELETE')
                    <button class="text-red-500 hover:text-red-700 text-sm">
                        削除
                    </button>
                </form>
            </li>
        @endforeach
    </ul>

</div>
</body>
</html>
