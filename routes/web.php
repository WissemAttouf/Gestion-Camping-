<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StagaireController ;
use App\Http\Controllers\indexController ;
use App\Http\Controllers\HomeController ;
use App\Http\Controllers\erreurController ;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'mainController@index');
Route::get('services', 'servicesController@index');
Route::get('guide', 'guideController@index');
Route::get('lieux', 'lieuxController@index');
Route::get('visiteurs', 'visiteursController@index');
Route::get('detail_guide', 'detail_guideController@index');
Route::get('reservation', 'reservationController@index');
Route::get('checklieux', 'checklieuxController@index');
Route::get('mes_reservations', 'mes_reservationsController@index');
    




/*Route::get('services', function () {
    return view('services');
});*/
