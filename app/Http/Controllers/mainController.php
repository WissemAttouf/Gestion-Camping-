<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;

class mainController extends Controller
{
    public function index ()
    {
        $main['lieux']=DB::table('lieux')->inRandomOrder()->limit(1)->get();       

        $main['services']=DB::table('services')->get();

        $main['visiteurs']=DB::table('visiteurs')->get();

        $main['guide']=DB::table('guide')->inRandomOrder()->limit(1)->get();

        $main['reservation']=DB::table('reservation')->get();

        return view('welcome',$main);
    }

   /* public function services()
    {
        
    
    }*/
}
