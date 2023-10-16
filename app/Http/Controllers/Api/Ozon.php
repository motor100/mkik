<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class Ozon extends Controller
{
    public function index(Request $request)
    {
        $method = $request->method();

        // dd($method);

        $data = $request->json()->all();

        $text = $method;

        Storage::disk('public')->put('example.txt', $text);

        // return response()->json($data);
        // return response(json_encode($data), 200)
        //       ->header('Content-Type', 'application/json');

        return response('Something went wrong', 400);
                // ->header('Content-Type', 'application/json');
        
        // return response('HTTP/1.1 400 Something went wrong', 400)
            //   ->header('Content-Type', 'text/plain');

        // return response()->setStatusCode(400, 'Something went wrong');
    }
}
