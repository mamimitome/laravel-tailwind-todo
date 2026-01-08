<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Todo;
use App\Services\LineNotifyService;
use Carbon\Carbon;


class TodoDueNotify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:todo-due-notify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '期限が近いTodoをLINEに通知する';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $tomorrow = Carbon::tomorrow();

        $todos = Todo::whereNotNull('due_date')
            ->where('completed', false) // ← is_completed ではなく completed
            ->whereDate('due_date', '<=', $tomorrow)
            ->get();

        if ($todos->isEmpty()) {
            $this->info('通知対象のTodoはありません');
            return;
        }

        $message = "📋 期限が近いToDoがあります\n\n";

        foreach ($todos as $todo) {
            $due = Carbon::parse($todo->due_date);

            $label = $due->isToday()
                ? '🔥 今日まで'
                : '⏰ 明日まで';

            $message .= "{$label}\n・{$todo->title}\n\n";
        }

        LineNotifyService::send($message);

        $this->info('LINE通知を送信しました');
    }
}
