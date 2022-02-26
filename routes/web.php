<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Models\Post;
use App\Models\User;

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

//START
Route::get('start', function () {
    return view('start');
});
Route::get('start', [PostController::class, 'start'])->name('posts.start');

//POST LIST
//1
// Route::get('posts_list', function () {
//      return view('posts.listing');
//  });
//2 (Pero no sirve)
// Route::get('posts_list','PostController@index');
Route::get('posts_list', [PostController::class, 'index']);

Route::get('login', [LoginController::class, 'loginForm'])->name('login');
Route::post('login', [LoginController::class,'login']);

Route::get('logout', [LoginController::class, 'logout'])->name('logout');


//POST TAB
//1
// Route::get('posts_tab/{id?}', function ($id) {
//     return view('posts.tab')->with('id',$id);
// })->where('id',"[0-9]");
// Route::get('posts_tab/{id}', [PostController::class, 'show'])->where('id',"[0-9]");
Route::get('posts_tab/{id}', [PostController::class, 'show'])->name('posts.show');


//CREATE
Route::get('create', [PostController::class, 'create']);

//EDIT
// Route::get('edit/{id}', [PostController::class, 'edit'])->where('id',"[0-9]");;

//TEMPLATE
Route::get('template', function () {
    return view('template');
});

//CASTELLANIZAR
Route::resource('posts', PostController::class)->only(['create','edit','index','store','update']);

//DELETE
Route::get('posts_list/{id}', [PostController::class, 'destroy'])->name('posts.destroy');

//RUTAS TEMPORALES

Route::get('newPost', [PostController::class, 'newPost'])->name('posts.newPost');

Route::get('editTest/{id}', [PostController::class, 'editTest'])->name('posts.editTest');

//RUTA TEST-RELATIONSHIP
Route::get('TestRelationship', function() {
    $user = User::findOrFail(1);
    $post = new Post();
    $post->title = "Test Post" . rand();
    $post->content = "Test Post Publisher";
    $post->user()->associate($user);
    $post->save();
    return redirect()->route('posts.index');
});

//STORE
// Route::resource('posts',[PostController::class, 'store']);
// Route::get('store', [PostController::class, 'store'])->name('posts.create');
