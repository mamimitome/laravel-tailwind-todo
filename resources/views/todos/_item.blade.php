<li class="todo-item border p-3 rounded" data-id="{{ $todo->id }}" data-priority="{{ $todo->priority }}">

    <div class="flex items-center justify-between gap-3">

        <!-- 左：ドラッグ + チェック + タイトル -->
        <div class="flex items-start gap-2 flex-1 min-w-0">

            <!-- ★ ドラッグハンドル（追加） -->
            <span class="drag-handle cursor-move text-gray-400 select-none">
                ☰
            </span>

            <!-- 完了チェック -->
            <input type="checkbox" class="todo-checkbox" data-id="{{ $todo->id }}"
                {{ $todo->completed ? 'checked' : '' }}>

            <!-- タイトル + 期限（縦並び） -->
            <div class="flex flex-col flex-1 min-w-0">

                <!-- タイトル -->
                <span
                    class="todo-title font-semibold
            break-words whitespace-normal
            @if ($todo->completed) line-through text-gray-400 @endif
            @if ($todo->priority === '高') text-red-600
            @elseif($todo->priority === '中') text-yellow-600
            @else text-blue-600 @endif
        ">
                    {{ $todo->title }}
                </span>

                @if ($todo->due_date)
                    @php
                        $due = \Carbon\Carbon::parse($todo->due_date);
                    @endphp

                    <span
                        class="todo-due-date text-xs font-semibold mt-1
                @if ($todo->completed) text-gray-400
                @elseif ($due->isToday()) text-orange-500
                @elseif ($due->isPast()) text-red-500
                @else text-gray-500 @endif
            ">
                        @if (!$todo->completed && $due->isToday())
                            <span
                                class="bg-orange-100 text-orange-600 text-[10px] px-2 py-0.5 rounded-full inline-block mb-1">
                                📣 本日〆切！
                            </span>
                        @endif

                        期限：{{ $due->format('Y-m-d') }}
                    </span>
                @endif

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
