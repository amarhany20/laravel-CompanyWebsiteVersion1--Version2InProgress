<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;
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

//Home
Route::get('/', [HomeController::class, 'index'])->withoutMiddleware(['auth', 'admin-activated']);

// --------------------Projects--------------------

Route::prefix('/projects')->group(function () {

    // View All Projects
    Route::get('', [ProjectController::class, "index"])->withoutMiddleware('auth', 'admin-activated');
    //View Certian Project
    Route::get('/{id}', [ProjectController::class, 'show'])->withoutMiddleware(['auth', 'admin-activated']);
});


// -------------------Admin--------------------

// Auth + Activation Middle Control
Route::middleware(['auth','admin-activated'])->group(
    function () {

        Route::prefix('admin')->group(function () {

            //-------------------------------------Main Menu

            Route::get('/', [AdminController::class, "index"])->name("admin");

            //--------------------------------------Manage Admins

            Route::get('/manage', [AdminController::class, "manageAdmins"])->name("admin");

            //delete admin
            Route::patch('/manage/activate/{adminID}', [AdminController::class, "update"]);
            //activate admin
            Route::delete('/manage/delete/{adminID}', [AdminController::class, "destroy"]);


            //*************************************Projects Routes

            //-------------------------------------Projects Menu Routes

            Route::get('/projects/menu', [AdminController::class, "projectsMenu"])->name("admin.projects.menu");

            //-------------------------------------Create Projects Routes

            Route::get('/projects/create', [ProjectController::class, "create"])->name("projects.create");

            //-------------------------------------Insert Projects Routes

            Route::post('/projects/store', [ProjectController::class, "store"])->name("projects.store");

            //-------------------------------------Edit and update Projects Routes

            //Project Selection for edit and delete Route

            Route::get('/projects/select', [ProjectController::class, "list"])->name("admin.projects.select");

            //Edit Selected Project Route

            Route::get('/projects/edit/{projectid}', [ProjectController::class, "edit"])->name("projects.edit");

            //Update Projects Route

            Route::patch('/projects/update/{projectid}', [ProjectController::class, "update"])->name("projects.update");

            //Delete Projects Route

            Route::delete('/projects/delete/{projectid}', [ProjectController::class, "destroy"])->name("projects.delete");
        });
    }
);

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
