<?php
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Login Routes
Route::get('/login', [LoginController::class, 'show'])->name('login.show'); // Show login form
Route::post('/login', [LoginController::class, 'login'])->name('login.submit'); // Handle login submission

// Register Routes
Route::get('/register', [RegisterController::class, 'show'])->name('register.show'); // Show registration form
Route::post('/register', [RegisterController::class, 'store'])->name('register.submit'); // Handle registration submission

// Design Canvas Routes
Route::get('/user/design/canvas3', [ImportController::class, 'showCanvas3'])->name('canvas3.show'); // Show Canvas 3 design
Route::get('/user/design/canvas1', [ImportController::class, 'showCanvas1'])->name('canvas1.show'); // Show Canvas 1 design
Route::get('/user/design/canvas2', [ImportController::class, 'showCanvas2'])->name('canvas2.show'); // Show Canvas 2 design
Route::get('/user/design/canvas', [ImportController::class, 'showCanvas'])->name('canvas.show'); // Show main Canvas design

// Admin Routes
Route::get('/admin', [AdminController::class, 'show'])->name('admin.show'); // Show admin dashboard
Route::post('/admin/update-user', [AdminController::class, 'update'])->name('admin.user.update'); // Update user info
Route::post('/admin/add-user', [AdminController::class, 'store'])->name('admin.user.store'); // Add new user
Route::delete('/admin/destroy-user/{id}', [AdminController::class, 'delete'])->name('admin.user.destroy'); // Delete user
Route::get('/admin/setting', [AdminController::class, 'showSetting'])->name('admin.setting.show'); // Show admin settings

// Language Switch Route
Route::post('/language', function (Request $request) {
    $language = $request->input('language');
    if (!in_array($language, ['en', 'vi', 'jp'])) {
        $language = 'en';
    }
    session(['locale' => $language]);
    return redirect()->back();
})->name('language.switch'); // Switch language

// User Routes
Route::get('/', [UserController::class, 'showHome'])->name('user.home'); // Show user home
Route::get('/user/contact', [ContactController::class, 'show'])->name('user.contact.show'); // Show user contact
Route::get('/user/design', [UserController::class, 'showDesignPage'])->name('user.design.show'); // Show user design
Route::get('/user/setting', [UserController::class, 'showSettings'])->name('user.setting.show'); // Show user settings

// Contact Routes
Route::post('/import-excel', [ContactController::class, 'importFile'])->name('contact.import.excel'); // Import contacts from Excel
Route::delete('/contact/delete/{id}', [ContactController::class, 'deleteFile'])->name('contact.delete'); // Delete contact
Route::get('/contact/details/{id}', [ContactController::class, 'showFileDetails'])->name('contact.details.show'); // Show contact details

// Canvas Pro Route
Route::post('/user/design/canvas/get-fields', [ImportController::class, 'getFields'])->name('canvas.getFields'); // Get fields for Canvas design
