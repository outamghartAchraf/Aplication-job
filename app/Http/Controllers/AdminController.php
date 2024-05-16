<?php

namespace App\Http\Controllers;

use App\Charts\Jobs2Chart;
use App\Charts\JobsChart;
use App\Charts\ViewsChart;
use App\Models\Listeng;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\returnSelf;

class AdminController extends Controller
{
    public function AdminDashboard(){
        $jobs = Listeng::all();
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
        $chart2->dataset("views" , 'pie',$views);

        $chart3 = new ViewsChart;
        $chart3->labels(['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday']);
        $data = DB::table('views')->pluck('number'); // Fetch 'number' column data from 'views' table
        $chart3->dataset('Views', 'line', $data); 

        $jobs = Listeng::all();

        return view('admin.admin_dashboard',compact('chart','chart2','chart3'));
    }

    public function Pageusers(){
      
        $users = User::all();

        return view('admin.users',compact('users'));
    }


    public function pagejobs(){

        $jobs = Listeng::all();

        return view('admin.jobs',compact('jobs'));
    }

    public function applicants(){

        $listengs = Listeng::all();

        return view('admin.applicants', compact('listengs'));
    }

    public function applicantsDetails($id){

        $listengs = Listeng::find($id);

       
        
        return view('admin.details',compact('listengs'));
    }


}
