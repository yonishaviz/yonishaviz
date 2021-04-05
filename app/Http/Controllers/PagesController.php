<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
   
     public function new2(){
             return view('pages.new1');
     }
    
     public function new1(Request $request){
        $input = $request->all();

        \Log::info($input);

        return response()->json(['success'=>'Got Simple Ajax Request.']);
    }
}