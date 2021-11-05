<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dashboard\PostController;
use App\Http\Controllers\dashboard\CategoryController;
use App\Http\Controllers\dashboard\UserController;
use App\Http\Controllers\web\webController;
use Illuminate\Support\Facades\Auth;

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


Route::get('/dinamico/{nombre?}', function($nombre = ""){
    return "hello ".$nombre. " Conocenos <a href='".route("us")."'>Nosotros</a>";
});

Route::get('/about-us', function(){
    return "<h1>hello Everybody</h1>";
})->name("us");

Route::get('home/{nombre?}/{apellido?}', function ($nombre = "Jose", $apellido = "Perez") {
    // return view("home")->with("nombre", $nombre)->with("apellido", $apellido);
    $users = ["sam", "mari", "joel"];
    $users2 = [];
    return view("home", ["nombre" => $nombre, "apellido"=> $apellido, "users" => $users]);
})->name("home");

// Route::get('post', [PostController::class, "index"]);

//ESTO ES PARA AGRUPAR LAS RUTAS Y PONERLE PREFIJO
// Route::group(['prefix' => 'admin'], function () {
//     Route::resource('post', PostController::class);
// });

//ESTO ES PARA HACER RUTAS DE TIPO RESOURCE
Route::resource('dashboard/post', PostController::class);
Route::post('dashboard/post/{post}/image', [PostController::class, 'image'])->name('post.image');

Route::resource('dashboard/category', CategoryController::class);

Route::resource('dashboard/user', UserController::class);

Route::get('/', [webController::class, 'index'])->name('index');
Route::get('/categories', [webController::class, 'index'])->name('index');

Route::get('/details/{id}', [webController::class, 'detail']);
Route::get('/post-category/{id}', [webController::class, 'post_category']);

Route::get('/contact', [webController::class, 'contact']);

// ESTA ES LA FORMA DE USAR UN CONTROLADOR Y SU RESPECTIVA CLASE QUE RESUELVA LA RUTA
// Route::get('/users', [UsersController::class, "index"])
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
