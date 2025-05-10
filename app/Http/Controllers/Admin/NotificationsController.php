<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\NotificationResource;
use App\Models\Mawhoob_Notification;
use App\Models\Notification;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    use GeneralTrait;


    /////////////////////////////////////////////
    /// index
    public function index()
    {
        $title = __('menu.notifications');
        $notifications = Notification::with('admin')
        ->orderByDesc('created_at')
        ->where('notify_for','admin')
        ->paginate(15);
        return view('admin.home.notifications', compact('title','notifications'));
    }



    ////////////////////////////////////////////////////
    /// get admin notifications
    public function getNotifications()
    {
        $notifications = Notification::orderByDesc('created_at')
        ->where('notify_for', 'admin')
        ->take(15)
        ->get();
        return view('admin.includes.notifications', compact('notifications'));
    }

    ////////////////////////////////////////////////////
    /// get one admin notification
    public function getOneNotification(Request $request)
    {
        $notification = Notification::find($request->id);
        $notification->notify_class = 'read';
        $notification->save();
        return $this->returnData('OK',  $notification);
    }

    ////////////////////////////////////////////////////
    /// make notification read
    public function makeRead(Request $request)
    {
        $notification = Notification::find($request->id);
        $notification->notify_class = 'read';
        $notification->save();
        return $this->returnSuccessMessage('OK');
    }

}
