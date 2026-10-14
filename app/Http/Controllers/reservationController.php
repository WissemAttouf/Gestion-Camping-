<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;

class reservationController extends Controller
{
    public function index ()
    {
       $id=$_GET['id'];
        $main['reservation']=DB::table('reservation')->where('id',$id)->get(); 
        return view('reservation',$main);
    }

   /* public function lieux()
    {
        
    
    }*/
}
