<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;

class lieuxController extends Controller
{
    public function index ()
    {
       $id=$_GET['id'];
        $main['lieux']=DB::table('lieux')->where('id',$id)->get(); 
        return view('lieux',$main);
    }

   /* public function lieux()
    {
        
    
    }*/
}
