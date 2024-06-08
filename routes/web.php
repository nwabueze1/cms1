<?php

use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
use App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::resource('posts', \App\Http\Controllers\PostsController::class);

Route::get('/dates', function (){
    $date = new DateTime("+1 week");

    echo $date->format('m-d-y');

    echo '<br>';

   echo Carbon::now()->addDays(10)->diffForHumans();

   echo '<br>';
    echo Carbon::now()->subMonths(4)->diffForHumans();
});


Route::get('/getname', function (){
   $user = User::find(1);
    echo $user;
});
