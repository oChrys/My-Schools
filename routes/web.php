<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SchoolsController;
use App\Http\Controllers\UsersController;
use App\Models\Aluno;
use App\Models\Professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/teste', [UsersController::class, 'store']);
//Route::post('/login', [AuthController::class, 'store']);


Route::controller(LoginController::class)->group(function(){
    //Route::get('/login', 'index')->name('login_index');
    //Route::post('/login', 'store')->name('login_store');
    //Route::get('/logout', 'destroy')->name('login_destroy');

});

Route::prefix('students')->group(function(){
    Route::get('/', [SchoolsController::class, 'index'])->name('alunos_index');
    Route::get('/register', [SchoolsController::class, 'create'])->name('registro_aluno');
    Route::post('/', [SchoolsController::class, 'store'])->name('alunos_store');
    
});
Route::prefix('teachers')->group(function(){
    Route::get('/', [SchoolsController::class, 'teachers'])->name('professores');
    Route::get('/register', [SchoolsController::class, 'create_teacher'])->name('registro_professor');
    Route::post('/', [SchoolsController::class, 'teachers_store'])->name('professores_store');
    
});
Route::prefix('schools')->group(function(){
    Route::get('/', [SchoolsController::class, 'schools'])->name('escolas');
    Route::get('/register', [SchoolsController::class, 'create_school'])->name('registro_escola');
    Route::post('/', [SchoolsController::class, 'schools_store'])->name('escolas_store');

});

Route::fallback(function(){
    return "Rota não encontrada!";
});
