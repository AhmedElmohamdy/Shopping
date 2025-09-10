<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryAdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\ProductAdminController;
use App\Http\Controllers\ContactAdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Else_;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\OrderAdminController;
use App\Http\Controllers\ProductImgsController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\RoleMiddleware;

use App\Http\Middleware\CheckRole;





Route::get('/',[HomePageController::class,'Index'])->name(name:'Home.Index');

//GetAllCategories For Cateories Page
Route::get('/Shopping/Categories', [CategoryController::class,'GetAllCategoriesAction'])->name(name:'Category.GetAll');

//get AllProduct , get Product By Category Id
Route::get('/Shopping/Product/{CatId?}', [ProductController::class,'GetAllProdectCategoryAction'])->name(name:'Prodect.CatId');

// Product Details
Route::get('/Shopping/ProductDetails/{ProId}', [ProductController::class,'GetProdectDetailsAction'])->name(name:'Prodect.ProductDetails');
//Route::get('/product/details/{id}', [ProductController::class, 'showProductDetails'])->name('product.details');


//ContactUs
Route::get('/Shopping/ContactUs', [ContactController::class,'ContactUs'])->name(name:'ContactUs');
Route::post('/Shopping/SaveContact', [ContactController::class,'SaveContact'])->name(name:'ContactUs.Save');

//SearchIcon
Route::post('/search', [ProductController::class, 'search'])->name('products.search');





//Admin Panel
//Route::get('/Admin', [AdminController::class,'Index'])->middleware(AuthMiddleware::class)->name(name:'Admin.Home');
//Route::get('/Admin', [AdminController::class,'Index'])->middleware('auth')->name(name:'Admin.Home');

Route::middleware(['auth', RoleMiddleware::class . ':admin,superadmin'])->group(function () {
    Route::get('/Admin', [AdminController::class, 'Index'])->name('Admin.Home');
});


//Product In Admin
//List All Product In Admin
Route::get('/Admin/GetAllProduct', [ProductAdminController::class,'ListProduct'])->name(name:'Admin.GetProduct');
//Add New Product In Database From Admin
Route::get('/Admin/AddProduct', [ProductAdminController::class,'AddNewProduct'])->name(name:'Prodect.AddNew');
Route::post('/Admin/SaveProduct', [ProductAdminController::class,'Save'])->name(name:'Prodect.Save');
//Update Product
Route::get('ad/Edit/{id?}', [ProductAdminController::class, 'Edit'])->name('product.edit');
//Delete
Route::delete('/Delete/{Id}',[ProductAdminController::class,'Delete'])->name(name:'products.Delete');




//Category In Admin
//List All Category In Admin
Route::get('/Admin/GetAllCategory', [CategoryAdminController::class,'ListCategory'])->name(name:'Admin.GetCategory');
//Add New Category In Database From Admin
Route::get('/Admin/AddCategory', [CategoryAdminController::class,'AddNewCategory'])->name(name:'Category.AddNew');
Route::post('/Admin/SaveCategory', [CategoryAdminController::class,'Save'])->name(name:'Category.Save');
//Update Category
Route::get('Cat/Edit/{id}', [CategoryAdminController::class, 'Edit'])->name('Category.edit');
//Delete
Route::delete('Cat/Delete/{Id?}',[CategoryAdminController::class,'Delete'])->name(name:'Category.Delete');


//Review In Admin 
Route::get('/Admin/GetAllReview', [ContactAdminController::class,'GetAllContacts'])->name(name:'Review.GetAll');
//Delete
Route::delete('/Delete/{Id? }',[ContactAdminController::class,'Delete'])->name(name:'Review.Delete');




//User In Admin
Route::get('/Admin/GetAllUsers', [UserController::class,'GetAllUsers'])->name(name:'User.GetAll');
//Delete
Route::delete('/Delete/{Id?}',[UserController::class,'Delete'])->name(name:'User.Delete');






//Slider In Admin
//List All Slider In Admin
Route::get('/Admin/GetAllSlider', [SliderController::class,'ListSlider'])->name(name:'Admin.GetSlider');
//Add New Slider In Database From Admin
Route::get('/Admin/AddSlider', [SliderController::class,'AddNewSlider'])->name(name:'Slider.AddNew');
Route::post('/Admin/SaveSlider', [SliderController::class,'Save'])->name(name:'Slider.Save');
//Update Slider
Route::get('/Edit/{id}', [SliderController::class, 'Edit'])->name('Slider.edit');
//Delete
Route::delete('/Admin/Delete/{Id}',[SliderController::class,'Delete'])->name(name:'Slider.Delete');

Route::get('/sliders', [SliderController::class, 'ShowAllSlider'])->name('sliders.view');






//settings In Admin
//List All Settings In Admin
Route::get('/Admin/GetAllSettings', [SettingsController::class,'ListSettings'])->name(name:'Admin.GetSettings');
//Add New Settings In Database From Admin
Route::get('/Admin/AddSettings', [SettingsController::class,'AddNewSettings'])->name(name:'Settings.AddNew');
Route::post('/Admin/SaveSettings', [SettingsController::class,'Save'])->name(name:'Settings.Save');
//Update Settings
Route::get('/Admin/Edit/{id}', [SettingsController::class, 'Edit'])->name('Settings.edit');
//Delete
Route::delete('/Admin/Delete/{Id?}',[SettingsController::class,'Delete'])->name(name:'Settings.Delete');




//List All Productimages In Admin
Route::get('/Admin/GetAllProductImages', [ProductImgsController::class,'GetAllProductImage'])->name(name:'Admin.GetProductImage');
//add image to product
Route::get('/Admin/AddImage', [ProductImgsController::class, 'AddImageForm'])->name('product.addImageForm');
Route::post('/Admin/SaveImage', [ProductImgsController::class, 'SaveImage'])->name('product.SaveImage');
//Update productImg
Route::get('/Edit/{id?}', [ProductImgsController::class, 'EditProductImage'])->name('productImg.Edit');
//Delete
Route::delete('/DeleteImg/{Id?}',[ProductImgsController::class,'DeleteProductImage'])->name(name:'productImg.Delete');








//cart
Route::get('/Cart/Index', [CartController::class,'index'])->middleware('auth')->name(name:'Cart.Index');
Route::post('/addToCart/{id}', [CartController::class, 'addToCart'])->middleware('auth')->name('cart.add');
Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');

// Checkout
Route::get('/checkout', [CheckoutController::class, 'index'])->middleware('auth')->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');


// Order Admin
Route::get('/orders', [OrderAdminController::class, 'GetAllOrders'])->name('orders.GetAll');
Route::get('/orders/delete/{id}', [OrderAdminController::class, 'DeleteOrder'])->name('orders.delete');
Route::get('/orders/{id}', [OrderAdminController::class, 'GetOrderDetails'])->name('orders.details');




//hide register from home
//Auth::routes(['Register' => false]);


Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware(AuthMiddleware::class)->name('home');

//Login
Route::get('login', [LoginController::class, 'showLoginForm'])->middleware(AuthMiddleware::class)->name('login');
Route::post('login', [LoginController::class, 'login'])->middleware(AuthMiddleware::class);
Route::post('logout', [LoginController::class, 'logout'])->middleware(AuthMiddleware::class)->name('logout');


// Registration Routes
Route::get('register', [RegisterController::class, 'create'])->middleware(AuthMiddleware::class)->name('register');
Route::post('register', [RegisterController::class, 'store'])->middleware(AuthMiddleware::class);
Route::get('/register/success', [RegisterController::class, 'success'])->name('register.success');

// Password Reset Routes
Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('/reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');








//language switcher
Route::get('lang/{locale}', [LanguageController::class, 'SetLocal'])->name('lang.switch');





