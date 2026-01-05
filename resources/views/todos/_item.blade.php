<li class="todo-item border p-3 rounded" data-id="{{ $todo->id }}" data-priority="{{ $todo->priority }}">

    <div class="flex items-center justify-between gap-3">

        <!-- 左：ドラッグ + チェック + タイトル -->
        <div class="flex items-center gap-2">

            <!-- ★ ドラッグハンドル（追加） -->
            <span class="drag-handle cursor-move text-gray-400 select-none">
                ☰
            </span>

            <!-- 完了チェック -->
            <input type="checkbox" class="todo-checkbox" data-id="{{ $todo->id }}"
                {{ $todo->completed ? 'checked' : '' }}>

            <!-- タイトル -->
            <span
                class="todo-title font-semibold
                    @if ($todo->completed) line-through text-gray-400 @endif
                    @if ($todo->priority === '高') text-red-600
                    @elseif($todo->priority === '中') text-yellow-600
                    @else text-blue-600 @endif
                "
                data-priority="{{ $todo->priority }}">
                {{ $todo->title }}
            </span>

        </div>

        <!-- 右：削除 -->
        <form method="POST" action="{{ route('todos.destroy', $todo) }}">
            @csrf
            @method('DELETE')
            <button class="text-xs text-red-500 hover:underline" onclick="return confirm('削除しますか？')">
                削除
            </button>
        </form>

    </div>
</li>
