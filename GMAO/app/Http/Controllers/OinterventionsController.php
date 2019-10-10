<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Activite;
use App\Ointervention;
use App\Mpreventive;
use App\Maintenance;
use App\Equipement;
use App\User;
use Auth;
use Illuminate\Http\Request;

class OinterventionsController extends Controller
{
    //
    public function index(){
        $users = User::all();
        $equipements = Equipement::all();
        $ointerventions = Ointervention::all();
        return view('dmdinterventions.index')->with('ointerventions',$ointerventions)->with('equipements',$equipements)->with('users',$users);
    }
    public function store(Request $request){
       $oi = new Ointervention();
       
       
       $oi->numero = $request->input("numero");
       $oi->emetteur = $request->input("emetteur");
       $oi->idmachine = $request->input("machine");
       $oi->type_panne = $request->input("type_panne");
       $oi->priorite = $request->input("priorite");
       $oi->destinateur = $request->input("iduser");
       $oi->commentaire = $request->input("commentaire");
       $oi->etat = "demandée";
       $oi->save();
       return redirect('/di/add')->with("adduser","success");

    }
    public function create(){
        $equipements = Equipement::all();
        $techniciens = User::where('role',"Technicien")->get();
        return view('dmdinterventions.ajout')->with('equipements',$equipements)->with('techniciens',$techniciens);
    }
    public function show($id){
        $oi = Ointervention::find($id);
        return view('dmdinterventions.affiche')->with('oi',$oi);
    }
    public function ordretravaille($id){
        $oi = Ointervention::find($id);
        return view('ointerventions.ordret')->with('oi',$oi);
    }
    public function ordrerefus($id){
        $oi = Ointervention::find($id);
        $oi->etat = "refusée";
        $oi->update();
        return redirect("/homet");
    }
    public function ordremprefus($id){
        $mp = Mpreventive::find($id);
        $maintenances = Maintenance::where('idmp',$mp->id)->get();
        $i =0;
        $counter = NULL;
        foreach($maintenances as $m ){
            $i++;
            if ( $m->date_maintenance == $mp->date_prochaine ){
                $m->etat = "refusée";
                $m->update();
                $counter = $i;  
            }
                
        }
        if ( $counter+1 <= count( $maintenances )  ){
            $mp->date_prochaine = $maintenances[ $counter + 1 ]->date_maintenance;  
        }else{
            $mp->etat == "terminé";
        }

        $mp->update();
        
        return redirect("/homet");
    }
    public function ordretravailleshow($id){
        $oi = Ointervention::find($id);
        return view('dmdinterventions.observation')->with('oi',$oi);

    }
    public function valider($id){
        $oi = Ointervention::find($id);
        $oi->etat = "Terminé";
        $oi->update();
        return redirect('/di');

    }
    public function filter(Request $request){
        $users = User::all();
        $equipements = Equipement::all();
        $ointerventions = Ointervention::where("numero",'like','%'.$request->input("searchoi").'%')->get();
        return view('dmdinterventions.index')->with('ointerventions',$ointerventions)->with('equipements',$equipements)->with('users',$users);

    }
    public function addobservationoi(Request $request , $id){
        $oi = Ointervention::find($id);
        $numero = $oi->numero;
        $oi->observation = $request->input("observation");
        $oi->date_intervention = $request->input("date_debut");
        $oi->date_fin_intervention = $request->input("date_fin");
        $oi->etat = "En attente de validation";       
        $oi->update();
        $ac = new Activite();
        $ac->iduser = Auth::user()->id;
        $ac->description = "valider la demande d'intervention".$numero;
        $ac->save();
        return redirect('/homet');
        //return view('dmdinterventions.observation');

    }
    public function ordretravaillempshow($id){
        $mp = Mpreventive::find($id);
        $today = date("Y-m-d");
        $maintenance = Maintenance::where('idmp',$mp->id)->where('date_maintenance',$today)->get();
        return view('mpreventives.observation')->with('mp',$mp)->with('maintenance',$maintenance);

    }
    public function addobservationmp(Request $request , $id){
        $m = Maintenance::find($id);
        $m->observation = $request->input('observation');
        $m->etat = "En attente de validation";
        $m->update();
        $mp = Mpreventive::find($m->idmp);
        $mp->date_prochaine = Carbon::parse($mp->date_prochaine)->addDays($mp->intervalle);
        $mp->save();
        $numero = $mp->numero;
        $ac = new Activite();
        $ac->iduser = Auth::user()->id;
        $ac->description = "valider la maintenance preventif".$numero;
        $ac->save();
        return redirect('/homet');
        
    }
    
    
}
