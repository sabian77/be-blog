<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('home', ['title' => 'Dashboard Page']);
});

Route::get('/posts', function () {
    $posts = Post::with('category', 'user')
    ->latest()
    ->filter(request(['search', 'category', 'author']))
    ->paginate(6)
    ->withQueryString();
    return view('posts', ['title' => 'Blog Page', 'posts' => $posts ]);
});

//membuat ketika diklik maka akan diarahkan ke halaman post dengan route model binding
Route::get('/posts/{post:slug}', function (Post $post) {
    

    return view('post', ['title' => 'Single post', 'post' => $post]);
});

Route::get('/contact', function () {
    return view('contact', ['title' => 'Contact Page']);
});


Route::prefix('dashboard')->group(function () {
    Route::resource('post', DashboardController::class);
});

Route::post('/dashboard', [DashboardController::class, 'store'])
->middleware(['auth', 'verified'])->name('dashboard');
;


Route::get('/about', function () {
    return view('about' , ['title' => 'About Page']);
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])
->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
