<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use App\Activite;
use Auth;


class DepartmentsController extends Controller
{
    //
    public function index(){
        $departments = Department::all();
        return view('departments.index')->with('departments',$departments);
    }
    public function create(){
        return view('departments.ajout');
    }
    public function add(request $request){
        $department = new Department();
        $department->name=$request->input('nom');
        $department->description=$request->input('description');
        $department->save();
        $activite = new Activite();
        $activite->iduser = Auth::user()->id;
        $activite->description = "Ajouter la departement ".$department->name;
        $activite->save();
        return redirect('/departments');
        
    }
}
