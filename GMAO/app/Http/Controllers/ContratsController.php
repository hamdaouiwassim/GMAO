<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contrat;
use App\Mpreventive;
use App\Ointervention;

class ContratsController extends Controller
{
    //
    public function index(){
        $contrats =  Contrat::all();
        $ointerventions = Ointervention::all();
        $mpreventives = Mpreventive::all();
        return view('contrats.index')->with('contrats',$contrats)->with('ointerventions',$ointerventions)->with('mpreventives',$mpreventives);
    }

}
