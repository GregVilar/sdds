<?php
namespace App\Http\Controllers;
use App\Http\Middleware\VarietyMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\UserMiddleware;
use App\Http\Middleware\AdminMiddleware;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/games', function () {
    return view('games');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/market', function () {
    return view('market');
});

Route::get('/tutorial', function () {
    return view('tutorial');
});

Route::get('/library', function () {
    return view('library');
});

Route::get('/add', function () {
    return view('student.user-add');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

/**
Route::get('/users',[UserController::class,'index'])->middleware(VarietyMiddleware::class);
Route::get('/users-create',[UserController::class,'create'])->middleware(AdminMiddleware::class);
Route::get('/users/{id}', [UserController::class, 'show'])->middleware(UserMiddleware::class);
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->middleware(UserMiddleware::class);
Route::put('/users/{id}', [UserController::class, 'update']);
Route::get('/users-add', [UserController::class, 'add']);
# Route::post('/users', [UserController::class, 'store']);

#labact 3
Route::post('/post', [PostController::class, 'store'])->name('post.store');
Route::get('/showdata/{id}', [UserController::class, 'showData'])->name('showdata');
Route::get('/editdata/{id}', [UserController::class, 'editBlog'])->name('editdata')->middleware(AdminMiddleware::class);
Route::put('/updatedata/{id}', [UserController::class, 'updateBlog'])->name('updatedata');
Route::delete('/deletedata/{id}', [PostController::class, 'delete'])->name('deletedata');
Route::get('/myblog', [PostController::class, 'index'])->name('users');
 */

Route::middleware('user')->group(function () {
    Route::get('/users/{id}', [UserController::class, 'show']);
    Route::get('/users/{id}/edit', [UserController::class, 'edit']);
});

Route::middleware('admin')->group(function () {
    Route::get('/users-create', [UserController::class, 'create']);
    Route::get('/editdata/{id}', [UserController::class, 'editBlog'])->name('editdata');
    Route::get('/users', [UserController::class, 'index']);
});

Route::middleware('variety')->group(function () {
    Route::get('/users-add', [UserController::class, 'add']);
});

Route::put('/users/{id}', [UserController::class, 'update']);
Route::post('/posts', [PostController::class, 'store'])->name('post.store');
Route::post('/post', [PostController::class, 'storeUser'])->name('post.storeUser');
Route::get('/showdata/{id}', [UserController::class, 'showData'])->name('showdata');
Route::put('/updatedata/{id}', [UserController::class, 'updateBlog'])->name('updatedata');
Route::delete('/deletedata/{id}', [PostController::class, 'delete'])->name('deletedata');
Route::get('/myblog', [PostController::class, 'index'])->name('users');
