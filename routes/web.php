<?php

// use App\Http\Controllers\AllController;

use App\Http\Controllers\AllController;
use Illuminate\Support\Facades\Route;


Route::get('/log-in', [AllController::class,'view_login'])->name('log_in_page');

Route::get('/registration', [AllController::class,'view_registration'])->name('registration_page');

Route::get('/main-page',[AllController::class,'main_page'])->name('go_main');

Route::get('/main-page/inward',[AllController::class,'view_inward'])->name('inward');

Route::get('/main-page/outward',[AllController::class,'view_outward'])->name('outward');

Route::post('/log-in',[AllController::class,'userlogin'])->name('log_in');

Route::get('/main-page',[AllController::class,'view_main'])->name('main_page');

Route::post('/registration',[AllController::class,'userRegistration'])->name('registration');

Route::post('/logout',[AllController::class,'logout'])->name('log_out');

Route::post('/main-page/inward',[AllController::class,'enter_inward'])->name('add_inward');

Route::post('/main-page/outward',[AllController::class,'enter_outward'])->name('add_outward');


