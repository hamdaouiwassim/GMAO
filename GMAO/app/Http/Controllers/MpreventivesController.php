<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Mpreventive;
use App\User;
use App\Equipement;
use App\Maintenance;
class MpreventivesController extends Controller
{
    //
    public function index(){
        $users = User::all();
        $equipements = Equipement::all();
        $mpreventives = Mpreventive::all();
        return view('mpreventives.index')->with('mpreventives',$mpreventives)->with('equipements',$equipements)->with('users',$users);
    }
    public function filter(Request $request){
        $users = User::all();
        $equipements = Equipement::all();
        $mpreventives = Mpreventive::where("numero",'like','%'.$request->input("searchmp").'%')->get();
        return view('mpreventives.index')->with('mpreventives',$mpreventives)->with('equipements',$equipements)->with('users',$users);
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
        $mp->intervalle = $request->input("intervalle");
        $mp->date_debut = $request->input("date_debut");
        $mp->date_fin = $request->input("date_fin");
        $mp->date_prochaine = $dateprochaine ;
        $mp->etat = "En cours";
        $mp->executeur = $request->input("executeur");
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

        return redirect('/mp/add')->with("adduser","success");
 
     }
     public function create(){
         $equipements = Equipement::all();
         $techniciens = User::where('role',"Technicien")->get();
         return view('mpreventives.ajout')->with('equipements',$equipements)->with('techniciens',$techniciens);
     }
 public function show($id){
        $equipements = Equipement::all();
        $mp = Mpreventive::find($id);
        $maintenances = Maintenance::where('idmp',$id)->get(); 
        return view('mpreventives.affiche')->with('mp',$mp)->with('maintenances',$maintenances)->with('equipements',$equipements);
    }
}
