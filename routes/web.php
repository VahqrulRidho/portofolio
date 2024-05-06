<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\KeahlianController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\ResumeDetailController;
use App\Http\Controllers\ServiceController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('gambar/{folder}/{filename}', function ($folder, $filename) {
    $path = storage_path('app/gambar/' . $folder . '/' . $filename);

    if (!file_exists($path)) {
        abort(500);
    }

    $file = file_get_contents($path);
    $type = mime_content_type($path);

    return response($file)->header('Content-Type', $type);
})->name('show-gambar');

Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::get('/#contact', [FrontendController::class, 'index'])->name('index.pesan');
Route::get('/portofolio-detail/{id}', [FrontendController::class, 'portofolio'])->name('portofolio');
Route::post('kirim/pesan', [FrontendController::class, 'pesan'])->name('kirim.pesan');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // Change Password
    Route::get('/change-password', [App\Http\Controllers\HomeController::class, 'changePassword'])->name('change-password');
    Route::post('/change-password', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('update-password');

    // Route Profile
    Route::get('admin/profile', [ProfileController::class, 'index'])->name('admin.profile');
    Route::get('admin/profile/create', [ProfileController::class, 'create'])->name('admin.profile.create');
    Route::get('admin/profile/edit/{id}', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::get('admin/profile/show/{id}', [ProfileController::class, 'show'])->name('admin.profile.show');
    Route::patch('admin/profile/{id}', [ProfileController::class, 'update'])->name('admin.profile.update');
    Route::post('admin/profile/store', [ProfileController::class, 'store'])->name('admin.profile.store');
    Route::delete('admin/profile/destroy/{id}', [ProfileController::class, 'destroy'])->name('admin.profile.destroy');

    // Route Services
    Route::get('admin/service', [ServiceController::class, 'index'])->name('admin.service');
    Route::get('admin/service/create', [ServiceController::class, 'create'])->name('admin.service.create');
    Route::get('admin/service/edit/{id}', [ServiceController::class, 'edit'])->name('admin.service.edit');
    Route::patch('admin/service/{id}', [ServiceController::class, 'update'])->name('admin.service.update');
    Route::post('admin/service/store', [ServiceController::class, 'store'])->name('admin.service.store');
    Route::delete('admin/service/destroy/{id}', [ServiceController::class, 'destroy'])->name('admin.service.destroy');

    // Route Contact
    Route::get('admin/contact', [ContactController::class, 'index'])->name('admin.contact');
    Route::get('admin/contact/create', [ContactController::class, 'create'])->name('admin.contact.create');
    Route::get('admin/contact/edit/{id}', [ContactController::class, 'edit'])->name('admin.contact.edit');
    Route::patch('admin/contact/{id}', [ContactController::class, 'update'])->name('admin.contact.update');
    Route::post('admin/contact/store', [ContactController::class, 'store'])->name('admin.contact.store');
    Route::delete('admin/contact/destroy/{id}', [ContactController::class, 'destroy'])->name('admin.contact.destroy');

    // Route Contact
    Route::get('admin/pesan', [ContactController::class, 'pesan'])->name('admin.pesan');
    Route::delete('admin/pesan/destroy/{id}', [ContactController::class, 'hapus'])->name('admin.pesan.hapus');

    // Route Keahlian
    Route::get('admin/keahlian', [KeahlianController::class, 'index'])->name('admin.keahlian');
    Route::get('admin/keahlian/create', [KeahlianController::class, 'create'])->name('admin.keahlian.create');
    Route::get('admin/keahlian/edit/{id}', [KeahlianController::class, 'edit'])->name('admin.keahlian.edit');
    Route::patch('admin/keahlian/{id}', [KeahlianController::class, 'update'])->name('admin.keahlian.update');
    Route::post('admin/keahlian/store', [KeahlianController::class, 'store'])->name('admin.keahlian.store');
    Route::delete('admin/keahlian/destroy/{id}', [KeahlianController::class, 'destroy'])->name('admin.keahlian.destroy');

    // Route Resume
    Route::get('admin/resume', [ResumeController::class, 'index'])->name('admin.resume');
    Route::get('admin/resume/create', [ResumeController::class, 'create'])->name('admin.resume.create');
    Route::get('admin/resume/edit/{id}', [ResumeController::class, 'edit'])->name('admin.resume.edit');
    Route::patch('admin/resume/{id}', [ResumeController::class, 'update'])->name('admin.resume.update');
    Route::post('admin/resume/store', [ResumeController::class, 'store'])->name('admin.resume.store');
    Route::delete('admin/resume/destroy/{id}', [ResumeController::class, 'destroy'])->name('admin.resume.destroy');

    // Route Detail Resume 
    Route::get('admin/detail-resume', [ResumeDetailController::class, 'index'])->name('admin.detail-resume');
    Route::get('admin/detail-resume/create', [ResumeDetailController::class, 'create'])->name('admin.detail-resume.create');
    Route::get('admin/detail-resume/edit/{id}', [ResumeDetailController::class, 'edit'])->name('admin.detail-resume.edit');
    Route::get('admin/detail-resume/show/{id}', [ResumeDetailController::class, 'show'])->name('admin.detail-resume.show');
    Route::patch('admin/detail-resume/{id}', [ResumeDetailController::class, 'update'])->name('admin.detail-resume.update');
    Route::post('admin/detail-resume/store', [ResumeDetailController::class, 'store'])->name('admin.detail-resume.store');
    Route::delete('admin/detail-resume/destroy/{id}', [ResumeDetailController::class, 'destroy'])->name('admin.detail-resume.destroy');

    // Route Portofolio
    Route::get('admin/portofolio', [PortofolioController::class, 'index'])->name('admin.portofolio');
    Route::get('admin/portofolio/create', [PortofolioController::class, 'create'])->name('admin.portofolio.create');
    Route::get('admin/portofolio/edit/{id}', [PortofolioController::class, 'edit'])->name('admin.portofolio.edit');
    Route::get('admin/portofolio/show/{id}', [PortofolioController::class, 'show'])->name('admin.portofolio.show');
    Route::patch('admin/portofolio/{id}', [PortofolioController::class, 'update'])->name('admin.portofolio.update');
    Route::post('admin/portofolio/store', [PortofolioController::class, 'store'])->name('admin.portofolio.store');
    Route::delete('admin/portofolio/destroy/{id}', [PortofolioController::class, 'destroy'])->name('admin.portofolio.destroy');
});
