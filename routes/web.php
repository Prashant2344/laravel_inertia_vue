<?php

use App\Http\Controllers\Admin\ServiceCategoryController;
use App\Http\Controllers\Admin\WorkerController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PostController;
use App\Models\Worker;
use Cloudinary\Transformation\Rotate;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return Inertia('Home');
    });
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/posts', [PostController::class, 'index']);

    //workers
    Route::prefix('workers')->group(function () {
        Route::name('workers')->group(function () {
            Route::get('/', [WorkerController::class, 'index'])->name('.list');
            Route::get('/create', [WorkerController::class, 'create'])->name('.create');
            Route::post('/store', [WorkerController::class, 'store'])->name('.store');
        });
    });

    //Services
    Route::prefix('services')->group(function () {
        Route::prefix('categories')->group(function () {
            Route::name('services.categories')->group(function () {
                Route::get('/', [ServiceCategoryController::class, 'index'])->name('.list');
                Route::get('/getCategories', [ServiceCategoryController::class, 'getCategories'])->name('.getCategories');
                Route::get('/create', [ServiceCategoryController::class, 'create'])->name('.create');
                Route::post('/store', [ServiceCategoryController::class, 'store'])->name('.store');
            });
        });
    });
});

Route::get('/selectdropdown', function () {
    return Inertia::render('SelectDropdown');
});
Route::middleware('guest')->group(function () {
    Route::get('/login', function () {
        return Inertia::render('auth/Login');
    })->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});
