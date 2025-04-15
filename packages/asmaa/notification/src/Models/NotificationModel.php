<?php

namespace Asmaa\Notification\Models;

use Illuminate\Database\Eloquent\Model;

class NotificationModel extends Model
{
    protected $table = 'notifications';

    protected $fillable = [
        'title',
        'message',
        'type',
        'created_at',
    ];

    public $timestamps = false;
}
