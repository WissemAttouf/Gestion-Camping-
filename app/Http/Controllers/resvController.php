<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;

class resvController extends Controller
{
    public function index ()
    {
       $id=$_GET['id'];
        $main['reservation']=DB::table('reservation')->where('idvisiteurs',$id)->get(); 
        return view('mes_reservations',$main);
    }

   /* public function lieux()
    {
        
    
    }*/
}
