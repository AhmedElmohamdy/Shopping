<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CartController;



/*
// Public routes for Product
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);

// Protected routes for Product (admin and superadmin)
Route::middleware(['auth:sanctum', 'role:admin,superadmin'])->group(function () {
    Route::post('/products', [ProductController::class, 'store']);
    Route::put('/products/{id}', [ProductController::class, 'update']);
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);
});
*/

// Public routes for Product
Route::get('/Product/GetAll', [ProductController::class, 'index']);
Route::get('/Product/Show/{id}', [ProductController::class, 'show']);
Route::post('/products', [ProductController::class, 'store']);
Route::put('/products/{id}', [ProductController::class, 'update']);
Route::delete('/products/{id}', [ProductController::class, 'destroy']);



// Authentication routes
// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});


// Cart routes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/cart/add', [CartController::class, 'add']);
    Route::put('/cart/update/{id}', [CartController::class, 'update']);
    Route::delete('/cart/remove/{id}', [CartController::class, 'destroy']);
});
