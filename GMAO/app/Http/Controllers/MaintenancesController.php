<?php

namespace App\Http\Controllers;

use App\Equipement;
use App\Maintenance;
use App\Mpreventive;
use Illuminate\Http\Request;

class MaintenancesController extends Controller
{
    //
    public function show($id){
        $equipements = Equipement::all();
        //$mp = Mpreventive::find($id);
        $maintenances = Maintenance::where('idmp',$id)->get(); 
        $m = Maintenance::find($id);
        $mp = Mpreventive::find($m->idmp);
        return view('maintenances.affiche')->with('m',$m)->with('mp',$mp);

    }
}
