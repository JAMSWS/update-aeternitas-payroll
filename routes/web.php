<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

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


});

//  Route::controller(App\Http\Controllers\AddemployeeController::class)->group(function () {
//      Route::get('/addemployee', 'index');
//  });

Route::prefix('aeternitas')->group(function() {


        //this is for hr department that add employee and etc...
    Route::controller(App\Http\Controllers\hrdepartmentController::class)->group(function () {
    Route::get('/employee', 'index')->name('employees.index');
    Route::get('/employee/create', 'create')->name('employees.create');
    Route::post('/employee', 'store')->name('employees.store');
    Route::get('/employee/{id}/edit', 'edit')->name('employees.edit');
    Route::delete('/employee/{id}', 'destroy')->name('employees.destroy');






    });



});





// Route::get('/addemployee', [App\Http\Controllers\AddemployeeController::class, 'index']);

require __DIR__.'/auth.php';
