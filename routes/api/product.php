<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;

/*
|--------------------------------------------------------------------------
| Product Routes
|--------------------------------------------------------------------------
|
*/

Route::resource('products', ProductsController::class, [
    'only' => ['index', 'store', 'edit', 'update', 'destroy']
]);