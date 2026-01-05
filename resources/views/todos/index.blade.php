<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>ToDoリスト</title>
</head>

<body class="bg-gray-100 min-h-screen">

    <!-- ログアウト -->
    <form method="POST" action="{{ route('logout') }}" class="fixed top-4 right-4 sm:top-6 sm:right-6 z-10">
        @csrf
        <button type="submit"
            class="bg-gray-800 text-white px-3 py-1 sm:px-4 sm:py-2 rounded
                   text-xs sm:text-sm hover:bg-gray-700 transition">
            ログアウト
        </button>
    </form>

    <div class="max-w-xl mx-auto mt-10 bg-white p-6 rounded shadow">

        <!-- タイトル -->
        <h1
            class="text-2xl sm:text-3xl md:text-4xl
                   font-extrabold text-red-600 mb-6 text-center sm:text-left">
            ToDoリスト
        </h1>

        <!-- エラー表示 -->
        @if ($errors->any())
            <div class="text-red-500 mb-4 text-sm">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- 追加フォーム -->
        <form method="POST" action="{{ route('todos.store') }}" class="flex flex-col gap-4 mb-6">
            @csrf

            <!-- タイトル -->
            <input name="title" class="border w-full px-3 py-2 rounded" placeholder="やること" required>

            <!-- 優先度選択 -->
            <div>
                <label class="block text-sm font-semibold mb-2">
                    優先度を選択
                </label>

                <div class="flex gap-2">
                    <label class="cursor-pointer">
                        <input type="radio" name="priority" value="高" class="hidden peer" required>
                        <span
                            class="px-3 py-1 rounded-full border text-sm
                                   peer-checked:bg-red-500 peer-checked:text-white">
                            高
                        </span>
                    </label>

                    <label class="cursor-pointer">
                        <input type="radio" name="priority" value="中" class="hidden peer">
                        <span
                            class="px-3 py-1 rounded-full border text-sm
                                   peer-checked:bg-yellow-500 peer-checked:text-white">
                            中
                        </span>
                    </label>

                    <label class="cursor-pointer">
                        <input type="radio" name="priority" value="低" class="hidden peer">
                        <span
                            class="px-3 py-1 rounded-full border text-sm
                                   peer-checked:bg-blue-500 peer-checked:text-white">
                            低
                        </span>
                    </label>
                </div>
            </div>

            <!-- 追加ボタン -->
            <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition">
                追加
            </button>
        </form>

        <!-- Todo一覧（優先度ごと） -->
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">

            {{-- 高 --}}
            <div>
                <h2 class="font-bold text-red-600 mb-2">高</h2>
                <ul class="todo-group space-y-2" data-priority="高">
                    @foreach ($todos->where('priority', '高') as $todo)
                        @include('todos._item', ['todo' => $todo])
                    @endforeach
                </ul>
            </div>

            {{-- 中 --}}
            <div>
                <h2 class="font-bold text-yellow-600 mb-2">中</h2>
                <ul class="todo-group space-y-2" data-priority="中">
                    @foreach ($todos->where('priority', '中') as $todo)
                        @include('todos._item', ['todo' => $todo])
                    @endforeach
                </ul>
            </div>

            {{-- 低 --}}
            <div>
                <h2 class="font-bold text-blue-600 mb-2">低</h2>
                <ul class="todo-group space-y-2" data-priority="低">
                    @foreach ($todos->where('priority', '低') as $todo)
                        @include('todos._item', ['todo' => $todo])
                    @endforeach
                </ul>
            </div>

        </div>


    </div>

</body>

</html>
