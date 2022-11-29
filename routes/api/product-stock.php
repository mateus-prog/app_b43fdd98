<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductStockController;

/*
|--------------------------------------------------------------------------
| Product Stock Routes
|--------------------------------------------------------------------------
|
*/

Route::resource('product-stock', ProductStockController::class, [
    'only' => ['index', 'store', 'edit', 'update', 'destroy']
]);