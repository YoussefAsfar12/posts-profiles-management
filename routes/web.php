<?php

use App\Http\Controllers\InformationsController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProfileController;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

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

// Route::get('/', function () {
//     return view('welcome');
// });



    Route::get("/profiles",[ProfileController::class,"index"])->name("profiles.index");
    Route::get('/profiles/create',[ProfileController::class,"create"])->name('profiles.create');
    Route::post('/profiles/store',[ProfileController::class,"store"])->name('profiles.store');
    Route::get("/profiles/{profile}",[ProfileController::class,"show"])
    ->where("profile","[0-9]+")
    ->name("profiles.show");
    Route::delete("/profiles/{profile}",[ProfileController::class,"destroy"])->name("profiles.destory");
    Route::get('/profiles/{profile}/edit',[ProfileController::class,"edit"])->name('profiles.edit');
    Route::put('/profiles/{profile}/edit',[ProfileController::class,"update"])->name('profiles.update');




Route::middleware(['guest'])->group(function(){
    Route::get('/login',[LoginController::class,"index"])->name('login.index');
    Route::post('/login',[LoginController::class,"login"])->name('login');
});


Route::get('/logout',[LoginController::class,"logout"])->name('logout')->middleware("auth");
Route::get("/settings",[InformationsController::class,"index"])->name("settings.index")->middleware("auth");


Route::resource('/posts',PostController::class);
Route::get("/",[PostController::class,"index"])->name("home");





// Route::get("/form",function(){
//     return view("form");
// });
// Route::post("/form",function(Request $request){
//     dump($request->string("name")->upper());
//     dd($request->input("name"));
// })->name("form.submit");

// Route::get("/salam",function(){
//     $filePath = "storage/images/no_profile.png";
//     if(file_exists($filePath)){
//         return response()->download($filePath,'no_profile.png',disposition:"inline");
//     } else {
//         // Return a default response if the file doesn't exist
//         return response("File not found", 404);
//     }
// });