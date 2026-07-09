<?php

use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth', 'role:Administrador'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('permissions', PermissionController::class);
});

Route::middleware('auth')->group(function () {
    Route::view('/setores', 'modules.setores')->middleware('permission:setores')->name('modules.setores');
    Route::view('/especialidades', 'modules.especialidades')->middleware('permission:especialidades')->name('modules.especialidades');
    Route::view('/equipamentos', 'modules.equipamentos')->middleware('permission:equipamentos')->name('modules.equipamentos');
    Route::view('/unidades', 'modules.unidades')->middleware('permission:unidades')->name('modules.unidades');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';