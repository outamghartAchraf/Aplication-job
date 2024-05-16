<?php

namespace App\Http\Controllers;

use App\Charts\Jobs2Chart;
use App\Charts\JobsChart;
use App\Charts\ViewsChart;
use App\Models\Listeng;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index() {
        $jobs = Listeng::where('user_id', auth()->user()->id)->get();
        $jobTitles = $jobs->pluck('title'); // Get job titles
    
        $applicants = [];
        $views = []; // Initialize an array to store the number of applicants for each job
    
        foreach($jobs as $job) {
            $applicants[] = $job->users()->count(); 
            $views[] = $job->views;                        // Store the count of applicants for each job
        }
    
        $chart = new JobsChart;
        $chart->labels($jobTitles);
        $chart->dataset('Applicants', 'line', $applicants,$views);

        $chart2 = new Jobs2Chart;
        $chart2->labels($jobTitles);
        $chart2->dataset("views" , 'bar',$views);
        




        return view('dashborad.dashboard',compact('chart','chart2'));
    }


    public function verify(){

        return view('users.verify');
    }


    public function reset(){

        $user = Auth::user();

        if($user->hasVerifiedEmail()){

            return redirect()->route('login')->with([
                "success" => "your account was verification" 
            ]);
        }else{
            $user->sendEmailVerificationNotification();

            return back()->with(["seccess" => "verification Link send successFully"]);
        }
    }


  
}
