<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;

class checklieuxController extends Controller
{
    public function index ()
    {
       $depart=$_GET['depart'];
       $fin=$_GET['check-out'];
       $lieux=$_GET['destination'];
        $main['reserv']=DB::table('lieux')->whereBetween('DateDebut',[$depart,$fin])->get();
        $main['countreserv']=DB::table('lieux')->where('DateDebut',$depart)->count(); 
        return view('checklieux',$main);
    }

   /* public function lieux()
    {
        
    
    }*/
}
