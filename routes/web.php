<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PayslipController;
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


    Route::get('/payslip/{id}/pdf', [PayslipController::class, 'generatePDF'])->name('payslip.pdf');
        //this is for hr department that add employee and etc...
    Route::controller(App\Http\Controllers\hrdepartmentController::class)->group(function () {
    Route::get('/employee', 'index')->name('employees.index');
    Route::get('/employee/create', 'create')->name('employees.create');
    Route::post('/employee', 'store')->name('employees.store');
    Route::get('/employee/{id}', 'show')->name('employees.show');
    Route::get('/employee/{id}/edit', 'edit')->name('employees.edit');
    Route::put('/employee/{id}', 'update')->name('employees.update');
    Route::delete('/employee/{id}', 'destroy')->name('employees.destroy');

    });


    //this is for add, edit and delete department
    Route::controller(App\Http\Controllers\departmentlistController::class)->group(function () {
    Route::get('/department', 'index')->name('department.index');
    Route::get('/department/create', 'create')->name('department.create');
    Route::post('/department', 'store')->name('department.store');
    Route::get('/department/{id}/edit', 'edit')->name('department.edit');
    Route::put('/department/{id}', 'update')->name('department.update');
    Route::delete('/department/{id}', 'destroy')->name('department.destroy');

    });
    //this is for add, edit and delete position :)
    Route::controller(App\Http\Controllers\positionlistController::class)->group(function () {
    Route::get('/position', 'index')->name('position.index');
    Route::get('/position/create', 'create')->name('position.create');
    Route::post('/position', 'store')->name('position.store');
    Route::get('/position/{id}/edit', 'edit')->name('position.edit');
    Route::put('/position/{id}', 'update')->name('position.update');
    Route::delete('/position/{id}', 'destroy')->name('position.destroy');
    });

    //This is for attendance list
    Route::controller(App\Http\Controllers\attendancelistController::class)->group(function () {
    Route::get('/attendance', 'index')->name('attendance.index');
    Route::get('/attendance/create', 'create')->name('attendance.create');
    Route::post('/attendance', 'store')->name('attendance.store');
    Route::get('/attendance/{id}/edit', 'edit')->name('attendance.edit');
    Route::put('/attendance/{id}', 'update')->name('attendance.update');
    Route::delete('/attendance/{id}', 'destroy')->name('attendance.destroy');

    });

    //This is for time keeping
    Route::controller(App\Http\Controllers\timekeepingController::class)->group(function () {
        Route::get('/timekeeping', 'index')->name('timekeeping.index');
        Route::get('/timekeeping/create', 'create')->name('timekeeping.create');
        Route::post('/timekeeping', 'store')->name('timekeeping.store');
        Route::get('/timekeeping/{id}/edit', 'edit')->name('timekeeping.edit');
        Route::put('/timekeeping/{id}', 'update')->name('timekeeping.update');
        Route::delete('/timekeeping/{id}', 'destroy')->name('timekeeping.destroy');

        });




});


// Route::get('/addemployee', [App\Http\Controllers\AddemployeeController::class, 'index']);


require __DIR__.'/auth.php';
