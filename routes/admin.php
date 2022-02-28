<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;

//Route::get('',[HomeController::class,'index'])->middleware('admin');

Route::middleware(['auth:sanctum', 'admin'])->get('/admin', function () {
    return view('admin.index');
})->name('admin');