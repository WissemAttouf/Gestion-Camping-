<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use crudbooster;

class mes_reservationsController extends Controller
{
    public function index ()
    {
       //$id=CRUDBooster::Myid();
       $id=$_GET['id'];
        $main['reserv']=DB::table('reservation')->where('idvisiteurs',$id)->get();
        $main['nbr']=DB::table('reservation')->where('idvisiteurs',$id)->count();
        return view('mes_reservations',$main);
    }

   /* public function lieux()
    {
        
    
    }*/
}
