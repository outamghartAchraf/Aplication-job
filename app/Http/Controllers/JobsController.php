<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostJobRequest;
use App\Models\Listeng;
use App\postjob\jobpost;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JobsController extends Controller
{
    protected $job;
    public function __construct(jobpost $job)
    {
        $this->job = $job;
        $this->middleware('auth');
        $this->middleware('isPay')->only(['create','store']);
        $this->middleware('IsEmployer');
        
    }


    public function index(Request $request){
         $search = $request->input('search');
        $jobs = Listeng::Where('user_id',auth()->user()->id)->Where('title','like','%'.$search.'%')
        ->get();
         
        return view('job.index',compact('jobs'));
    }
    public function create()
    {
        return view('job.create');
    }

    public function store(PostJobRequest $request)
    {


        $this->job->store($request);

        return back()->with([
            'success' => "job created seccessFully"
        ]);
    }

    public function edit(Listeng $listeng)
    {

        return view('job.edit', compact('listeng'));
    }

    public function update(PostJobRequest $request, $id)
    {
       
        $this->job->updateJob($id,$request);
       
        return back()->with([
            "success" => "job update successFully"
        ]);
    }

    public function detroy($id){
        
      Listeng::Where('id',$id)->delete();

       return back()->with([
        'success' => "job delete successFully"
       ]);
    }
}
