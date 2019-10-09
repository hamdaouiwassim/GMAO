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
        $mpreventives = Mpreventive::all();
        $maintenances = Maintenance::all(); 
        $ointerventions = Ointervention::all();
        return view('planmaintenance.index')->with('ointerventions',$ointerventions)->with('maintenances',$maintenances)->with('mpreventives',$mpreventives);
    }
}
