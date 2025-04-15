<?php

namespace Asmaa\Notification;

use Asmaa\Notification\Models\NotificationModel;
use Illuminate\Database\Eloquent\Model;

class Notification extends model
{
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }


    public function send($data)
    {
        return NotificationModel::create([
            'title' => $data['title'] ?? 'بدون عنوان',
            'message' => $data['message'] ?? '',
            'type' => $data['type'] ?? 'info',
            'created_at' => now(),
        ]);
    }
}
