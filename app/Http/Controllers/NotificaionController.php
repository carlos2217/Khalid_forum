<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class NotificaionController extends Controller
{
    public function index()
    {
        $notifications = auth()->user()->notifications()
            ->orderBy('read_at', 'asc')
            ->orderBy('created_at', 'desc')
            ->get();
        return view('dashboard.notifications.index')->with('notifications', $notifications);
    }
    public function read($id)
    {
        // dd($id);
        $user = User::findOrFail($id);
        $user->unreadNotifications->map(function ($n) use ($request) {
            if ($n->id == $request->get('notification_uuid')) {
                $n->markAsRead();
            }
        });
        return back();
    }
}
