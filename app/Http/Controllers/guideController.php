<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;

class guideController extends Controller
{
    public function index ()
    {
     $id=$_GET['id'];
        $main['guide']=DB::table('guide')->where('id',$id)->get(); 
        return view('guide',$main);
    }

   /* public function guide()
    {
        
    
    }*/
}
