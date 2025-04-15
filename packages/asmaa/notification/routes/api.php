<?php

use Illuminate\Support\Facades\Route;
use Asmaa\Notification\Http\Controllers\NotificationController;


Route::post('api/notification/send', [NotificationController::class, 'store']);

Route::get('api/notification', [NotificationController::class, 'index']);

Route::get('api/notification/user/{user_id}', [NotificationController::class, 'userNotifications']);

Route::get('api/notification/test-mail', [NotificationController::class, 'sendTestEmail']);
