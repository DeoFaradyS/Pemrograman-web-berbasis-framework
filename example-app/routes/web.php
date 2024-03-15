<?php

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home', function () {
//     return view('home');
// });

//ini untuk sebatas view saja tanpa harus get
// Route::view('/home','home');

//ini dengan parameter
Route::view('/home','home',[
    'nama' => 'Ahmad Alfarabi',
    'email'=> 'ahmadalfarabi@gmail.com'
]);

Route::get(
    '/profile',
    function () {
        return view('profile', [
            "nama" => "Ahmad Fauzi",
            "umur" => 20,
            'pekerjaan' => "Mahasiswa"
        ]);
    }
);

//redirect
Route::redirect('/hello','/home');

//redirectpermaanet 
Route::permanentRedirect('/hello','/home');

// paramete route
Route::get("/pesan/{id}",function($id){
    return  "Halo ini halaman pesan dengan ID :".$id;
});

//paramete route + lempar datanya ke page lain
Route::get("/pesan/{id}",function($id){
    return  view('/profile',['id' => $id]);
});

//prefix
Route::prefix('/admin') -> group (function(){
    Route::get('/dashboard', function() {
        return "halaman dashboard admin";
    });
    
    Route::get('/users', function() {
        return "halaman users admin";
    });
});

Route::get('/home', function(){
    return  view('home',[
        'nama' => 'Deo',
        'umur' => 12,
        'nim' => 123111
    ]);
})->name ('home');

Route::get('/home1', function(){
    return  view('home1',[
        'nama' => 'Dea',
        'umur' => 13,
        'nim' => 142344
    ]);
})-> name ('home1');

