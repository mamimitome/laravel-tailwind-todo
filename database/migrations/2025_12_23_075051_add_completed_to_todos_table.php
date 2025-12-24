<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // すでに completed カラムがあるなら何もしない（重複エラー防止）
        if (! Schema::hasColumn('todos', 'completed')) {
            Schema::table('todos', function (Blueprint $table) {
                $table->boolean('completed')->default(false);
            });
        }
    }

    public function down(): void
    {
        // completed がある時だけ削除
        if (Schema::hasColumn('todos', 'completed')) {
            Schema::table('todos', function (Blueprint $table) {
                $table->dropColumn('completed');
            });
        }
    }
};
