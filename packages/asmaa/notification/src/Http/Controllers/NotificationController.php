<?php

namespace Asmaa\Notification\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail;
use Asmaa\Notification\Mail\YourTestMail;
use Asmaa\Notification\Jobs\SendTestMailJob;
use Asmaa\Notification\Models\NotificationModel;

class NotificationController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'message' => 'required|string',
            'type' => 'nullable|string',
            'user_id' => 'nullable|exists:users,id',
        ]);

        $notification = NotificationModel::create($validated);

        return response()->json([
            'message' => 'تم إرسال الإشعار بنجاح ✅',
            'data' => $notification
        ], 201);
    }


    public function index()
{
    $notifications = \Asmaa\Notification\Models\NotificationModel::all();

    return response()->json([
        'message' => 'قائمة الإشعارات 🎉',
        'data' => $notifications
    ]);
}


public function userNotifications($user_id)
{
    $notifications = NotificationModel::where('user_id', $user_id)->get();

    return response()->json([
        'message' => 'إشعارات المستخدم',
        'data' => $notifications
    ]);
}


public function sendTestEmail(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'title' => 'required|string',
            'message' => 'required|string',
    ]);

    SendTestMailJob::dispatch($request->email,$request->title,$request->message);

    return response()->json(['message' => 'تم إرسال الإيميل عبر الجوب ✅']);

}
}
