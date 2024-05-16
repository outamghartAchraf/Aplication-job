<?php

namespace App\Http\Controllers;

use App\Mail\ShortListMail;
use App\Models\Listeng;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ApplicantController extends Controller
{
    public function index(){
         
        $listengs = Listeng::latest()->withCount('users')->Where('user_id',auth()->user()->id)->get();
         
        return view('applicants.index',compact('listengs'));
    
    }


    public function show(Listeng $listeng,$slug){
        $this->authorize('view', $listeng);

        $listengs = Listeng::with('users')->where('slug',$slug)->first();
        return view('applicants.details',compact('listengs'));
    }


    public function shortlisrt($id_listengs , $id_users){

        $listengs = Listeng::find($id_listengs) ;

        if($listengs){
            $listengs->users()->updateExistingPivot($id_users,['shortlisted'=>true]);
             
            Mail::to(User::find($id_users)->email)->queue(new ShortListMail(User::find($id_users)->name,$listengs->title));
            return back()->with(['success'=>'applicants apply successFully']);

        }


        return back();
    }


    public function apply($listengID){

        $user = auth()->user();
        $user->listengs()->syncWithoutDetaching($listengID);

        return redirect('/')->with(['success' => "applicants apply successFully"]);
    }


    public function showmessage(){

        return back()->with([
            "error" => "already apply"
        ]);
    }
}
