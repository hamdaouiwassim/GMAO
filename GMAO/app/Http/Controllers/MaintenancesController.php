<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Maintenance;
use App\Mpreventive;
class MaintenancesController extends Controller
{
    //
    public function show($id){

        $m = Maintenance::find($id);
        $mp = Mpreventive::find($m->idmp);
        return view('maintenances.affiche')->with('m',$m)->with('mp',$mp);

    }
}
