<?php

use App\Http\Controllers\SchoolsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeachersController;
use App\Http\Controllers\UsersController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login_post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::post('/', [UsersController::class, 'store'])->name('registrar');
Route::get('/register', [UsersController::class, 'create'])->name('registrar_usuario');
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');


/*Route::get('/', [LoginController::class, 'home'])->name('home');

Route::controller(LoginController::class)->group(function(){
    Route::get('/login', 'index')->name('login_index');
    Route::post('/login', 'store')->name('login_store');
    Route::get('/logout', 'destroy')->name('login_destroy');

}); */

Route::prefix('students')->group(function(){
    Route::get('/', [SchoolsController::class, 'index'])->name('alunos_index');
    Route::get('/register', [SchoolsController::class, 'create'])->name('registro_aluno');
    Route::post('/', [SchoolsController::class, 'store'])->name('alunos_store');
    Route::delete('/{id}', [SchoolsController::class, 'delete'])->name('aluno_delete');
    
});
Route::prefix('teachers')->group(function(){
    Route::get('/', [TeachersController::class, 'teachers'])->name('professores');
    Route::get('/register', [TeachersController::class, 'create'])->name('registro_professor');
    Route::post('/', [TeachersController::class, 'store'])->name('professores_store');
    Route::delete('/{id}', [TeachersController::class, 'destroy'])->name('professor_destroy');
    
});
Route::prefix('schools')->group(function(){
    Route::get('/', [SchoolsController::class, 'schools'])->name('escolas');
    Route::get('/register', [SchoolsController::class, 'create_school'])->name('registro_escola');
    Route::post('/', [SchoolsController::class, 'schools_store'])->name('escolas_store');
    Route::delete('/{id}', [SchoolsController::class, 'destroy'])->name('escola_destroy');

});

Route::fallback(function(){
    return "Rota não encontrada!";
});
