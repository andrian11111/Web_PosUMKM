<?php
use App\Models\UMKM;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UMKMController;
use App\Http\Controllers\DashboardController;




// Route untuk UMKM yang hanya bisa diakses oleh pengguna yang sudah login
Route::middleware('auth')->group(function () {
    Route::get('/umkm/create', [UMKMController::class, 'create'])->name('umkm.create');
    Route::post('/umkm/store', [UMKMController::class, 'store'])->name('umkm.store');
    Route::get('/umkm', [UMKMController::class, 'index'])->name('umkm.index');
    Route::get('/umkm/{umkm}/edit', [UMKMController::class, 'edit'])->name('umkm.edit');
    Route::post('umkm/{umkm}', [UMKMController::class, 'update'])->name('umkm.update');

    Route::delete('/umkm/{umkm}', [UMKMController::class, 'destroy'])->name('umkm.destroy');
    route::get('ukm/addgallery', [UMKMController::class, 'addgallery'])->name('add.gallery');
    route::post('umkm/post', [UMKMController::class, 'postgallery'])->name('post.gallery');
    Route::delete('/dashboard/{dashboard}', [UMKMController::class, 'destroy_admin'])->name('destroy_admin');
    
});

//route menampilkan data detail
Route::get('/umkm/{umkm}', [UmkmController::class, 'show'])->name('umkm.show');

// Route utama untuk aplikasi (misalnya halaman depan)


Route::get('/', function () {
    // Ambil 20 data pertama dari model UMKM
    $umkms = UMKM::take(20)->get();

    // Kirim data UMKM ke view
    return view('welcome', compact('umkms'));
});
Route::get('/', function () {
    $umkms = UMKM::take(20)->get();

    return view('welcome', compact('umkms'));
})->name('welcome');

Route::get('/panduan', [UMKMController::class, 'panduan'])->name('panduan');
Route::get('/privasi', [UMKMController::class, 'privasi'])->name('privasi');




// Route yang hanya dapat diakses oleh pengguna yang sudah login (auth)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Memuat route terkait autentikasi (login, register, dll.)
require __DIR__.'/auth.php';

// Route dashboard untuk pengguna biasa (hanya bisa diakses pengguna biasa)
Route::middleware(['auth', 'adminMiddleware'])->group(function() {
    Route::get('/dashboard', function () {
        // Ambil 20 data pertama dari model UMKM
        $umkms = UMKM::take(20)->get();

        // Kirim data UMKM ke view
        return view('dashboard', compact('umkms'));
    })->name('dashboard'); 
});
//route pencarian di welcome
Route::get('/search', [UMKMController::class, 'search'])->name('umkm.search');
// Route dashboard untuk admin (hanya bisa diakses oleh admin)



Route::resource('umkm', UmkmController::class);


