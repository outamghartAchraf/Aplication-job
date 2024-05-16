<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UploadFileController extends Controller
{
    public function upload(Request $request){

        if($request->hasFile('file')){
           
            $pathfile = $request->file('file')->store('resume','public');
            
            User::Where('id',auth()->user()->id)->update(['resume'=>$pathfile]);

            return response()->json(['sucess' => true]);
        }

        return response()->json(['error' => 'error']);

        
    }
}
