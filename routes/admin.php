<?php

namespace App\Providers;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\ContactController as ControllersContactController;



// language routes
Route::get('/lang/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);
    return back();
})->name('change.lang');



// Admin Routes

Route::middleware('auth')
    ->as('admin.')    
    ->group(function () {

        Route::get('/dashboard' , [DashboardController::class,'index'])->name('dashboard');


              Route::controller(AuthorController::class)
              ->prefix('authors')
              ->as('authors.')
              ->group(function () {
                  Route::get('/', 'index')->name('index');
                  Route::get('/create', 'create')->name('create');
                  Route::post('/store', 'store')->name('store');
                  Route::get('/{author}/edit', 'edit')->name('edit');
                  Route::put('/{author}', 'update')->name('update');
                  Route::delete('/{author}', 'destroy')->name('destroy');
                  Route::get('/{author}/show', 'show')->name('show');
              });

              Route::controller(PostController::class)
              ->prefix('posts')
              ->as('posts.')
              ->group(function () {
                  Route::get('/', 'index')->name('index');
                  Route::get('/create', 'create')->name('create');
                  Route::post('/store', 'store')->name('store');
                  Route::get('/{post}/edit', 'edit')->name('edit');
                  Route::put('/{post}', 'update')->name('update');
                  Route::delete('/{post}', 'destroy')->name('destroy');
                  Route::get('/{post}/show', 'show')->name('show');
                  Route::get('/{post}/approve', 'approve')->name('approve');
                  Route::get('/{post}/unapprove', 'unapprove')->name('unapprove');
              });

                  Route::controller(CategoryController::class)
                  ->prefix('categories')
                  ->as('categories.')
                  ->group(function () {
                  Route::get('/', 'index')->name('index');
                  Route::get('/create', 'create')->name('create');
                  Route::post('/store', 'store')->name('store');
                  Route::get('/{category}/edit', 'edit')->name('edit');
                  Route::put('/{category}', 'update')->name('update');
                  Route::delete('/{category}', 'destroy')->name('destroy');
                  Route::get('/{category}/show', 'show')->name('show');
                  });

                  Route::controller(AboutController::class)
                  ->prefix('abouts')
                  ->as('abouts.')
                  ->group(function () {
                      Route::get('/', 'index')->name('index');
                      Route::get('/create', 'create')->name('create');
                      Route::post('/store', 'store')->name('store');
                      Route::get('/{about}/edit', 'edit')->name('edit');
                      Route::put('/{about}', 'update')->name('update');
                      Route::delete('/{about}', 'destroy')->name('destroy');
                      Route::get('/{about}/show', 'show')->name('show');
                  });

                    Route::controller(ControllersContactController::class)
                    ->prefix('contacts')
                    ->as('contacts.')
                    ->group(function () {
                        Route::get('/', 'index')->name('index');
                        Route::get('/create', 'create')->name('create');
                        Route::post('/store', 'store')->name('store');
                        Route::get('/{contact}/edit', 'edit')->name('edit');
                        Route::put('/{contact}', 'update')->name('update');
                        Route::delete('/{contact}', 'destroy')->name('destroy');
                        Route::get('/{contact}/show', 'show')->name('show');
                    });

                    Route::controller(UserController::class)
                    ->prefix('users')
                    ->as('users.')
                    ->group(function () {
                        Route::get('/', 'index')->name('index');
                        Route::get('/create', 'create')->name('create');
                        Route::post('/store', 'store')->name('store');
                        Route::get('/{user}/edit', 'edit')->name('edit');
                        Route::put('/{user}', 'update')->name('update');
                        Route::delete('/{user}', 'destroy')->name('destroy');
                        Route::get('/{user}/show', 'show')->name('show');
                    });

 });
