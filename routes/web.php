<?php

use App\Http\Controllers\AtrasoController;
use App\Http\Controllers\ChirpController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PerfilController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/perfil', [PerfilController::class, 'edit'])->name('perfil.edit');
    Route::patch('/perfil', [PerfilController::class, 'update'])->name('perfil.update');
    Route::delete('/perfil', [PerfilController::class, 'destroy'])->name('perfil.destroy');
});

//RUTAS DEL SISTEMA

//CHIRPS
Route::resource('chirps', ChirpController::class)
    ->only(['index','store','edit','update','destroy'])
    ->middleware(['auth','verified']);

//Atrasos
Route::resource('atrasos', AtrasoController::class)
    ->only(['index','store','edit','update','destroy'])
    ->middleware(['auth','verified']);

//Estudiantes
Route::resource('estudiantes', EstudianteController::class)
    ->only(['index','store','edit','update','destroy'])
    ->middleware(['auth','verified']);


//CURSOS
Route::resource('cursos',\App\Http\Controllers\CursoController::class)->middleware('auth');

//REPORTES
Route::get('/reports',[ExcelController::class,'index'])->name('reports');
Route::get('/reports/users',[ExcelController::class,'Users'])->name('reports.users');


Route::get('/imports', [ExcelController::class,'indexImport'])->name('imports');
Route::get('/imports/users', [ExcelController::class,'userImport'])->name('imports.users');
Route::POST('/imports/users', [ExcelController::class,'storeUsers'])->name('imports.users.store');


require __DIR__.'/auth.php';
