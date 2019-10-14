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
    public function create(){
        $ordres = array();
        $ointerventions = Ointervention::all();
        foreach($ointerventions as $oi ){
            $ordres[] = array( $oi->numero , $oi->id );
        }
        $mpreventives = Mpreventive::all(); 
        foreach($mpreventives as $mp ){
            $ordres[] = array( $mp->numero, $mp->id );
        }
        return view('contrats.ajout')->with('ordres',$ordres);
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
