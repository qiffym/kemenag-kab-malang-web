<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\HeaderSlideController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\LayananInfoController;
use App\Http\Controllers\LayananPendidikanController;
use App\Http\Controllers\LayananHajiController;
use App\Http\Controllers\LayananKUAController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UnitStructureController;
use App\Http\Controllers\ZiController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



// Home
Route::get('/', [HomeController::class, 'index']);


// Layanan
Route::get('/layanan', [LayananController::class, 'layanan']);
Route::get('/layanan/read/{layanan:slug}', [LayananController::class, 'show']);

// Layanan Pendidikan
Route::get('/layanan/pendidikan', function () {
    return view('layanan.pendidikan', [
        'title' => 'Pendidikan',
    ]);
});

// Layanan Haji & Umrah
Route::get('/layanan/haji', function () {
    return view('layanan.haji', [
        'title' => 'Layanan Haji & Umrah',
    ]);
});
// Layanan KUA
Route::get('/layanan/kua', function () {
    return view('layanan.kua', [
        'title' => 'Layanan KUA',
    ]);
});
// Layanan KUA
Route::get('/layanan/kua', function () {
    return view('layanan.kua', [
        'title' => 'Layanan KUA',
    ]);
});
// Layanan Info
Route::resource('/layanan/info', LayananInfoController::class);


// PPID
Route::get('/ppid', function () {
    return view('ppid.ppid', [
        'title' => 'PPID',
    ]);
});
Route::get('/ppid/read', function () {
    return view('ppid.read', [
        'title' => 'PPID Read',
    ]);
});

// Profile
Route::get('/artikel', function () {
    return redirect('/');
});
Route::get('/artikel/{article:slug}', [ArticleController::class, 'show']);

// Berita
Route::get('/read', function () {
    return redirect('/');
});
Route::get('/berita', [PostController::class, 'index']);
Route::get('/read/{post:slug}', [PostController::class, 'show']);

// Unit
Route::get('/unit', [UnitController::class, 'unit']);
Route::get('unit/read/{unit:slug}', [UnitController::class, 'show']);

// Pengumuman
Route::get('/pengumuman', [AnnouncementController::class, 'pengumuman']);
Route::get('/pengumuman/read/{pengumuman}', [AnnouncementController::class, 'show']);

// Zona Integritas
Route::get('/zi', [ZiController::class, 'zi']);
Route::get('/zi/read/{zi:slug}', [ZiController::class, 'show']);

// Galeri
Route::get('/foto', function () {
    return view('galeri.foto', [
        'title' => 'Foto'
    ]);
});
Route::get('/video', function () {
    return view('galeri.video', [
        'title' => 'Video'
    ]);
});

// FAQ
Route::get('/faq', [FAQController::class, 'home']);

// Pengaduan
Route::get('/pengaduan', function () {
    return view('pengaduan.pengaduan', [
        'title' => 'Pengaduan Masyarakat'
    ]);
});
Route::get('/pengaduan-intern', function () {
    return view('pengaduan.pengaduan-intern', [
        'title' => 'Pengaduan Internal (WBS)'
    ]);
});

// Foto Peristiwa
Route::get('/admin/foto-peristiwa', function () {
    return view('admin.foto-peristiwa.index', [
        'title' => 'Foto Peristiwa'
    ]);
});

// Video
Route::get('/admin/video', function () {
    return view('admin.video.index', [
        'title' => 'Video'
    ]);
});


// Admin
Auth::routes(['register' => false]);
Route::middleware(['middleware' => 'user.online'])->group(function () {
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/admin', [App\Http\Controllers\DashboardController::class, 'index'])->name('name');
        Route::get('/admin/profile/{user}', [AdminController::class, 'show']);
        Route::resource('/admin/admin-control-panel', AdminController::class);
        Route::resource('/admin/berita', AdminPostController::class);
        Route::post('/admin/berita/{post:id}/activate', [AdminPostController::class, 'active']);
        Route::resource('/admin/unit/struktur', UnitStructureController::class);
        Route::post('/admin/unit/struktur/{unitStructure:id}/activate', [UnitStructureController::class, 'active']);
        Route::resource('/admin/unit', UnitController::class);
        Route::resource('/admin/artikel', ArticleController::class);
        Route::resource('/admin/header-slide', HeaderSlideController::class);
        Route::post('/admin/header-slide/{headerSlide:id}/activate', [HeaderSlideController::class, 'active']);
        Route::resource('/admin/faq', FAQController::class);
        Route::resource('/admin/layanan/pendidikan', LayananPendidikanController::class);
        Route::resource('/admin/layanan/haji', LayananHajiController::class);
        Route::resource('/admin/layanan/kua', LayananKUAController::class);
        Route::resource('/admin/pengumuman', AnnouncementController::class);
        Route::post('/admin/pengumuman/{pengumuman}/activate', [AnnouncementController::class, 'active'])->name('pengumuman.activate');
        Route::resource('/admin/zi', ZiController::class);
        Route::post('/admin/zi/{zi}/activate', [ZiController::class, 'active'])->name('zi.activate');
    });
});
