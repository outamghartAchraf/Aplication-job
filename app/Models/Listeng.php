<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listeng extends Model
{

    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'roles',
        'job_type',
        'adresse',
        'salary',
        'application_close_date',
        'slug',
        'feature_image',
        'views'
    ];

    public function users(){
        return $this->belongsToMany(User::class,'listeng_user','listeng_id','user_id')
        ->withPivot('shortlisted')
        ->withTimestamps();
    }

    public function profile(){
        
        return $this->belongsTo(User::class,'user_id','id');
    }
}
