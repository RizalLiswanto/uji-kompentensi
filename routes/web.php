<?php

use App\Http\Controllers\Berita2Controller;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\CekBeritaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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










Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/postlogin', 'postlogin')->name('postlogin');
    Route::get('/logout', 'logout')->name('logout');
    Route::get('/registrasi','registrasi')->name('registrasi');
    Route::post('/simpanregister','simpanregister')->name('simpanregister');
    
});

Route::group(['middleware'=>['auth']],function(){
    
    Route::get('/input-berita',[CekBeritaController::class,'add'])->name('add');
Route::post('/berita-create',[CekBeritaController::class,'create'])->name('create');
    

    

       
   
});
Route::group(['middleware'=>['auth','ceklevel:1']],function(){
    //homeControleller
    Route::get('/home',[HomeController::class ,'index'])->name('home');


     //userControleller
    Route::get('/content',[UserController::class,'Index'])->name('content');
    Route::get('/content-input',[UserController::class,'Add'])->name('insert');
    Route::post('/content-create',[UserController::class,'create'])->name('create');
    Route::post('/content-delete',[UserController::class,'destroy'])->name('delete');
    Route::get('/content-edit{id}',[UserController::class,'edit'])->name('edit');
    Route::post('/content-update{id}',[UserController::class,'update'])->name('update');

    // levelController
    Route::get('/level',[LevelController::class,'index'])->name('level');
    Route::get('/level-input',[LevelController::class,'Add'])->name('insert');
    Route::post('/level-create',[LevelController::class,'create'])->name('create');
    Route::post('/level-delete',[LevelController::class,'destroy'])->name('delete');
    Route::get('/level-edit{id}',[LevelController::class,'edit'])->name('edit');
    Route::post('/level-update{id}',[LevelController::class,'update'])->name('update');

    // BeritaController
    Route::get('/tipe-berita',[BeritaController::class,'tipe'])->name('tipe');
    Route::get('/tipe-berita-input',[BeritaController::class,'Add'])->name('insert');
    Route::post('/tipe-berita-create',[BeritaController::class,'create'])->name('create');
    Route::post('/-delete',[BeritaController::class,'destroy'])->name('delete');
    Route::get('/tipe-berita-edit{id}',[BeritaController::class,'edit'])->name('edit');
    Route::post('/tipe-berita-update{id}',[BeritaController::class,'update'])->name('update');
        
    //CekBeritaController
    Route::get('/cek-berita',[CekBeritaController::class,'index'])->name('index');
    Route::patch('/items/{id}', [CekBeritaController::class, 'update'])->name('items.update');
    Route::get('/deleted', [CekBeritaController::class, 'deleted'])->name('deleted');
    Route::post('/komen/{id}', [CekBeritaController::class, 'komen'])->name('komen');




    Route::patch('/update-headline-status/{id}', [CekBeritaController::class, 'updateHeadlineStatus'])->name('update.headline.status');

});
//from berita

Route::get('/berita{id}',[BeritaController::class,'tampilkan'])->name('tampilkan');


//cek berita

Route::get('/',[CekBeritaController::class,'index2'])->name('index');

Route::get('/coba{id}',[CekBeritaController::class,'coba'])->name('index');











