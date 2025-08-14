<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

/*-------------- Change Language --------------*/
Route::get('/change-lang/{locale}', function ($locale) {

    app()->setLocale($locale);
    session()->put('locale', $locale);

    return back();
})->name('change.lang');

/*-------------- Website Routes --------------*/
Route::get('/', function () {
    $users = \App\Models\User::all(); // Assuming you have a User model
    return view('website.index', compact('users'));
})->name('home.index');

Route::get('/{post}/show', [PostController::class, 'show'])->name('home.post.show');
Route::get('/about', [AboutController::class, 'index'])->name('home.about');

Route::get('/post', [PostController::class, 'index'])->name('home.post.index');
Route::get('/author/{id}', [AuthorController::class, 'show'])->name('home.author.index');

Route::get('/contact', function () {
    return view('website.contact');
})->name('home.contact.index');

Route::post('/contact', [ContactController::class, 'store'])->name('home.contact.store');


/*-------------- End of Website Routes --------------*/
/*Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
