<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;

class servicesController extends Controller
{
    public function index ()
    {
    $id=$_GET['id'];
        $main['services']=DB::table('services')->where('id',$id)->get(); 
        return view('services',$main);
    }

   /* public function services()
    {
        
    
    }*/
}
