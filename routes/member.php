<?php

use App\Http\Controllers\Admin\SubcategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Member\MemberRegistrationController;

// Route::controller('App\Http\Controllers\Member\MemberRegistrationController')->group(function () {
//     Route::get('/member_registration', 'index')->name('member_registration');
// });
Route::get('member_registration',[MemberRegistrationController::class,'index'])->name('member_registration');
Route::post('member_registration_store',[MemberRegistrationController::class,'Store'])->name('member_registration_store');


Route::post('/get_subcategory', [MemberRegistrationController::class,'getSubcategory'])->name('getSubcategory');
