<!DOCTYPE html>
<html>
<head>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    <form method="POST" action="{{ route('logout') }}" class="fixed top-4 right-4">
    @csrf
    <button
        type="submit"
        class="bg-gray-800 text-white px-4 py-2 rounded hover:bg-gray-700 text-sm"
    >
        ログアウト
    </button>
    </form>

<div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">
    <h1 class="text-6xl font-extrabold text-red-600 mb-4">ToDoリスト</h1>

@if ($errors->any())
    <div class="text-red-500 mb-4">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

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
            <input
                type="checkbox"
                class="todo-checkbox"
                data-id="{{ $todo->id }}"
                {{ $todo->completed ? 'checked' : '' }}
            >

            <span class="ml-2 {{ $todo->completed ? 'line-through text-gray-500' : '' }}">
                {{ $todo->title }}
            </span>

        </div>

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
<script>
document.querySelectorAll('.todo-checkbox').forEach(checkbox => {
    checkbox.addEventListener('change', function () {
        const todoId = this.dataset.id;

        fetch(`/todos/${todoId}`, {
            method: 'PATCH',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                completed: this.checked
            })
        })
        .then(res => {
            if (!res.ok) throw new Error();
        })
        .catch(() => {
            alert('更新に失敗しました');
            this.checked = !this.checked;
        });
    });
});
</script>
</body>
</html>
