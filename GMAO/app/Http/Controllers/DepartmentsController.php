<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Message;
use App\Activite;
use App\Department;
use App\Notification;
use Illuminate\Http\Request;


class DepartmentsController extends Controller
{
    //
    public function index(){
        $users = User::all();
        $messages = Message::where('iddestination',Auth::user()->id)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id)->where('stat',"unseen")->get();
        $departments = Department::all();
        return view('departments.index')->with('users',$users)->with('messages',$messages)->with('notifications',$notifications)->with('departments',$departments);
    }
    public function create(){
        $users = User::all();
        $messages = Message::where('iddestination',Auth::user()->id)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id)->where('stat',"unseen")->get();
        return view('departments.ajout')->with('users',$users)->with('messages',$messages)->with('notifications',$notifications);
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
    public function change($id){
        $users = User::all();
        $messages = Message::where('iddestination',Auth::user()->id)->where('stat',"unread")->get();
        $notifications = Notification::where('iduser',Auth::user()->id)->where('stat',"unseen")->get();
        $department = Department::find($id);
        return view('departments.mod')->with('department',$department)->with('users',$users)->with('messages',$messages)->with('notifications',$notifications);
    }
    public function update(Request $request){

    }
    public function filter(Request $request)
    {
         //
         $users = User::all();
         $messages = Message::where('iddestination',Auth::user()->id)->where('stat',"unread")->get();
         $notifications = Notification::where('iduser',Auth::user()->id)->where('stat',"unseen")->get();
         $departments = Department::where("name",'like','%'.$request->input("searchdepartment").'%')->get();
         return view('departments.index')->with('messages',$messages)->with('users',$users)->with('departments',$departments)->with('messages',$messages)->with('notifications',$notifications);
    }
}
