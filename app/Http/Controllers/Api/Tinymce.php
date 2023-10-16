<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Tinymce extends Controller
{
    // public function upload(Request $request){
    //     $fileName=$request->file('file')->getClientOriginalName();
    //     $path=$request->file('file')->storeAs('uploads', $fileName, 'public');
    //     return response()->json(['location'=>"/storage/$path"]); 
    // }
}
