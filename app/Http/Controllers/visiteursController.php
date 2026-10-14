<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;

class visiteursController extends Controller
{
    public function index ()
    {
    $id=$_GET['id'];
        $main['visiteurs']=DB::table('visiteurs')->where('id',$id)->get(); 
        return view('visiteurs',$main);
    }

   /* public function services()
    {
        
    
    }*/
}
