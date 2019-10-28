<?php

namespace App\Http\Controllers;
use App\User;
use App\Message;
use Carbon\Carbon;
use App\Equipement;
use App\Maintenance;
use App\Mpreventive;
use App\Notification;
use Illuminate\Http\Request;
use Auth;

class MpreventivesController extends Controller
{
    //
    public function index(){
        $messages = Message::where('iddestination',Auth::user()->id)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id)->where('stat',"unseen")->get();
        $users = User::all();
        $equipements = Equipement::all();
        $mpreventives = Mpreventive::all();
        return view('mpreventives.index')->with('messages',$messages)->with('notifications',$notifications)->with('mpreventives',$mpreventives)->with('equipements',$equipements)->with('users',$users);
    }
    public function filter(Request $request){
        $messages = Message::where('iddestination',Auth::user()->id)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id)->where('stat',"unseen")->get();
        $users = User::all();
        $equipements = Equipement::all();
        $mpreventives = Mpreventive::where("numero",'like','%'.$request->input("searchmp").'%')->get();
        return view('mpreventives.index')->with('messages',$messages)->with('notifications',$notifications)->with('mpreventives',$mpreventives)->with('equipements',$equipements)->with('users',$users);
    }
    public function store(Request $request){
        $intervalle = $request->input("intervalle");
        $datedebut = $request->input("date_debut");
        $datefin = $request->input("date_fin");
        if ( $request->input("unite_mesure") == "Jours"){
            $dateprochaine = Carbon::parse($datedebut)->addDays($intervalle);
        
        }else if ($request->input("unite_mesure") == "Mois"){
            $dateprochaine = Carbon::parse($datedebut)->addMonths($intervalle);
        }
        $mp = new Mpreventive();
        $mp->numero = $request->input("numero");
        $mp->emetteur = $request->input("emetteur");
        $mp->idmachine = $request->input("machine");
        $mp->umesure = $request->input("unite_mesure");
        $mp->execution = $request->input("execution");
        if ($request->input("execution") == "Interne"){
            $mp->executeur = $request->input("executeur");
        }else{
            $mp->executeur = null;
        }
        $mp->intervalle = $request->input("intervalle");
        $mp->date_debut = $request->input("date_debut");
        $mp->date_fin = $request->input("date_fin");
        $mp->date_prochaine = $dateprochaine ;
        $mp->etat = "En cours";
        
        $mp->save();

        while( $dateprochaine <= $datefin ){
            $maintenance = new Maintenance();
            $maintenance->idmp = $mp->id ;
            $maintenance->date_maintenance = $dateprochaine;
            $maintenance->etat = "programmé";
            $maintenance->save();
            
            if ( $request->input("unite_mesure") == "Jours"){
                $dateprochaine =Carbon::parse($dateprochaine)->addDays($intervalle);
            
            }else if ($request->input("unite_mesure") == "Mois"){
                $dateprochaine = Carbon::parse($dateprochaine)->addMonths($intervalle);
            }

        }
        $notification = new Notification();
        $notification->stat = "unseen";
        $notification->touser = "Technicien";
        $notification->iduser = $request->input("executeur");
        $notification->content = "l'administrateur ajouté une maintenance preventif pour vous";
        $notification->save();
        return redirect('/mp/add')->with("adduser","success");
 
     }
     public function create(){
        $users = User::all();
        $messages = Message::where('iddestination',Auth::user()->id)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id)->where('stat',"unseen")->get();
         $equipements = Equipement::all();
         $techniciens = User::where('role',"Technicien")->get();
         return view('mpreventives.ajout')->with('messages',$messages)->with('notifications',$notifications)->with('equipements',$equipements)->with('techniciens',$techniciens)->with('users',$users);
     }
 public function show($id){
     $users = User::all();
        $messages = Message::where('iddestination',Auth::user()->id)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id)->where('stat',"unseen")->get();
        $equipements = Equipement::all();
        $mp = Mpreventive::find($id);
        $maintenances = Maintenance::where('idmp',$id)->get(); 
        return view('mpreventives.affiche')->with('users',$users)->with('mp',$mp)->with('messages',$messages)->with('notifications',$notifications)->with('maintenances',$maintenances)->with('equipements',$equipements);
    }
}
