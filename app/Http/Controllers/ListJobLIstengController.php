<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Listeng;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ListJobLIstengController extends Controller
{
    public function index(Request $request){
         
        $salary = $request->query('sort');
        $date = $request->query('date');
        $job_type = $request->query('job_type');
        
        $listeng = Listeng::query();
        if($salary === "salary_high_to_low"){
            $listeng->orderBy("salary","desc");
        }elseif($salary === "salary_low_to_high"){
                
            $listeng->orderBy("salary","asc");
        }


        if($date === "latest"){
            $listeng->orderByRaw("CAST(salary AS UNSIGNED) DESC");
        }elseif($date === "oldest"){
                
            $listeng->orderByRaw("CAST(salary AS UNSIGNED) DESC");
        }


        if($job_type === "Fulltime"){
            $listeng->where('job_type','Fulltime');
        }elseif($job_type === "Parttime"){
                
            $listeng->where('job_type','Parttime');
        }elseif($job_type === "Casual"){
                
            $listeng->where('job_type','Casual');
        }elseif($job_type === "Contract"){
                
            $listeng->where('job_type','Contract');
        }

        $jobs = $listeng->with('profile')->paginate(10);
         
        
// * NUMBER VIEWS
// if(auth()->user()->user_type !== 'admin') {
//     $views = DB::table('views')->increment('number', 1);
// }


    //return $jobs->load('profile');
       return view('home.home',compact('jobs'));
    }


    public function show(Listeng $listeng){
        $listeng->views +=1;
        $listeng->save();

        return view('users.show',compact('listeng'));
    }


    public function company($id){

        $company = User::with('jobs')->where('id', $id)
        ->where('user_type', 'employer')
        ->first();
        return view('company.company',compact('company'));
    }


    public function sendEmailContact(Request $request){

        $this->validate($request,[
            'email' =>'required',
            'message' =>'required'
        ]);


       $message =  Mail::to('outamghart2000@gmail.com')->queue(new ContactMail($request->all()));

        // return back()->with([
        //     "success" => 'THANK YOU FOR CONTACT US'
        // ]);

        return response()->json("success");

    }
}
