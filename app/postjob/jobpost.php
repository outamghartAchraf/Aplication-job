<?php

namespace App\postjob;

use App\Models\Listeng;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class jobpost
{
    protected $listeng;
    public function __construct(Listeng $linteng)
    {
        $this->listeng = $linteng;
    }


    public function getPathImage($data){
      
        return  $data->file('feature_image')->store('images', 'public');
}

    public function store(Request $data):void
    {
        $this->listeng->feature_image = $this->getPathImage($data) ;
        $this->listeng->title = $data['title'];
        $this->listeng->user_id = auth()->user()->id;
        $this->listeng->description = $data['description'];
        $this->listeng->roles = $data['roles'];
        $this->listeng->job_type = $data['job_type'];
        $this->listeng->adresse = $data['adresse'];
        $this->listeng->salary = $data['salary'];
        $this->listeng->application_close_date = $data['date'];
        $this->listeng->slug = Str::slug($data['title']) . '.' . Str::uuid();
        $this->listeng->save();
    }


    public function updateJob(int $id ,Request $data):void
    {

        if ($data->hasFile('feature_image')) {

          
            $this->listeng->find($id)->update(['feature_image' => $this->getPathImage($data)]);
        }  

       $this->listeng->find($id)->update($data->except('feature_image'));



    }

     
}
