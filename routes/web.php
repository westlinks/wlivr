<?php

use Illuminate\Support\Facades\Route;
use Westlinks\SimpleIvr\Http\Controllers\IvrSettingController;

Route::group(['middleware' => ['web', 'auth', 'admin.access']], function(){
    Route::get('/admin/ivr-settings', [IvrSettingController::class, 'index'])->name('ivr_settings.index');
    Route::post('/admin/ivr-settings', [IvrSettingController::class, 'store'])->name('ivr_settings.store');
});
