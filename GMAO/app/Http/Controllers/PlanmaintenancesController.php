<?php

namespace App\Http\Controllers;

use Auth;
use App\user;
use App\Message;
use App\Maintenance;
use App\Mpreventive;
use App\Notification;
use App\Ointervention;
use Illuminate\Http\Request;

class PlanmaintenancesController extends Controller
{
    //
    public function index(){
        $users = User::all();
        $messages = Message::where('iddestination',Auth::user()->id)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id)->where('stat',"unseen")->get();
        $mpreventives = Mpreventive::all();
        $maintenances = Maintenance::all(); 
        $ointerventions = Ointervention::all();
        return view('planmaintenance.index')->with('users',$users)->with('messages',$messages)->with('notifications',$notifications)->with('ointerventions',$ointerventions)->with('maintenances',$maintenances)->with('mpreventives',$mpreventives);
    }
}
