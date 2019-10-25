<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notification;
use Illuminate\Support\Facades\Redirect;

class NotificationsController extends Controller
{
    //
    public function seen($id){
        $notification = Notification::find($id);
        $notification->stat = "seen";
        $notification->update();
        return Redirect::back();
    }
}
