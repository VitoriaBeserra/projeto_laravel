<?php
 
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;

Route::get('/', function () {
    return view('welcome');
});
  
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
 
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('admin/dashboard');
 
    Route::get('/admin/services', [ServiceController::class, 'index'])->name('/admin/services');
    Route::get('/admin/services/create', [ServiceController::class, 'create'])->name('admin/services/create');
    Route::post('/admin/services/save', [ServiceController::class, 'save'])->name('admin/services/save');
    Route::get('/admin/services/edit/{id}', [ServiceController::class, 'edit'])->name('admin/services/edit');
    Route::put('/admin/services/update/{id}', [ServiceController::class, 'update'])->name('admin/services/update');
    Route::get('/admin/services/delete/{id}', [ServiceController::class, 'delete'])->name('admin/services/delete');

});

require __DIR__.'/auth.php';
 
//Route::get('admin/dashboard', [HomeController::class, 'index']);
//Route::get('admin/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'admin']);
