<?php

namespace App\Policies;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TodoPolicy
{
    // 一覧表示（ログインしていればOK）
    public function viewAny(User $user): bool
    {
        return true;
    }

    // 作成（ログインしていればOK）
    public function create(User $user): bool
    {
        return true;
    }

    // 更新（自分の Todo のみ）
    public function update(User $user, Todo $todo): bool
    {
        return $user->id === $todo->user_id;
    }

    // 削除（自分の Todo のみ）
    public function delete(User $user, Todo $todo): bool
    {
        return $user->id === $todo->user_id;
    }
}
