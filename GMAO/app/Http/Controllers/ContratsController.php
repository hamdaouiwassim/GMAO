<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Contrat;
use App\Message;
use App\Mpreventive;
use App\Notification;
use App\Ointervention;
use Illuminate\Http\Request;

class ContratsController extends Controller
{
    //
    public function index(){
        $users = User::all();
        $messages = Message::where('iddestination',Auth::user()->id)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id)->where('stat',"unseen")->get();
        $contrats =  Contrat::all();
        $ointerventions = Ointervention::all();
        $mpreventives = Mpreventive::all();
        return view('contrats.index')->with('users',$users)->with('messages',$messages)->with('notifications',$notifications)->with('contrats',$contrats)->with('ointerventions',$ointerventions)->with('mpreventives',$mpreventives);
    }
    public function filter(Request $request)
    {
         //
         $mpreventives = Mpreventive::all();
         $users = User::all();
         $messages = Message::where('iddestination',Auth::user()->id)->where('stat',"unread")->get();
         $notifications = Notification::where('iduser',Auth::user()->id)->where('stat',"unseen")->get();
         $contrats =  Contrat::where("name",'like','%'.$request->input("searchcontrat").'%')->get();
         return view('contrats.index')->with('users',$users)->with('mpreventives',$mpreventives)->with('contrats',$contrats)->with('messages',$messages)->with('notifications',$notifications);
    }
    public function create(){
        $users = User::all();
        $messages = Message::where('iddestination',Auth::user()->id)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id)->where('stat',"unseen")->get();
        $ordres = array();
        $ointerventions = Ointervention::all();
        foreach($ointerventions as $oi ){
            $ordres[] = array( $oi->numero , $oi->id );
        }
        $mpreventives = Mpreventive::all(); 
        foreach($mpreventives as $mp ){
            $ordres[] = array( $mp->numero, $mp->id );
        }
        return view('contrats.ajout')->with('ordres',$ordres)->with('messages',$messages)->with('users',$users)->with('notifications',$notifications);
    }
    public function add(Request $request){
        $contrat = new Contrat();
        $contrat->name = $request->input('contratname');
        $contrat->societe = $request->input('societe');
        $contrat->maintenance = $request->input('maintenance');
        $contrat->note = $request->input('note');
        $contrat->save();
        return redirect('/cm');
    }

}
