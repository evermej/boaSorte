<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\SellerController;
use App\Http\Controllers\admin\RolesController;
use App\Http\Controllers\admin\SalesController;

Route::name('admin.')->group(function(){
    
    Route::resource('sellers', SellerController::class)->names('sellers');

    Route::resource('roles', RolesController::class)->names('roles');

    Route::get('sales', [SalesController::class, 'sales'])->name('sales');
});