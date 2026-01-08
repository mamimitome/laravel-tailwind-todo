<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class LineNotifyService
{
    public static function send(string $message): void
    {
        $token = config('services.line.token');

        Http::withToken($token)
            ->post('https://api.line.me/v2/bot/message/broadcast', [
                'messages' => [
                    [
                        'type' => 'text',
                        'text' => $message,
                    ],
                ],
            ]);
    }
}
