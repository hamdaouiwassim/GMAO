<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ointervention;
use App\Maintenance;
use App\Mpreventive;

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
