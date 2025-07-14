<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\CooperationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\MajorController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SchoolController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SchoolController::class, 'home'])->name('home');
Route::get('/jurusan/asisten-keperawatan', [MajorController::class, 'ak'])->name('majors.ak');
Route::get('/jurusan/farmasi-klinis-dan-komunitas', [MajorController::class, 'fkk'])->name('majors.fkk');
Route::get('/jurusan/intrumentasi-medik', [MajorController::class, 'im'])->name('majors.im');
Route::get('/jurusan/teknologi-laboratorium-medik', [MajorController::class, 'tlm'])->name('majors.tlm');
Route::get('/jurusan/teknik-komputer-jaringan', [MajorController::class, 'tkj'])->name('majors.tkj');
Route::get('/jurusan/pekerjaan-sosial', [MajorController::class, 'ps'])->name('majors.ps');

Route::get('/sejarah', [SchoolController::class, 'history'])->name('history');
Route::get('/visi-misi', [SchoolController::class, 'visimisi'])->name('visimisi');
Route::get('/kepala-sekolah', [SchoolController::class, 'kepsek'])->name('kepsek');
Route::get('/data-pokok', [SchoolController::class, 'dapo'])->name('dapo');
Route::get('/berita', [SchoolController::class, 'news'])->name('news');
Route::get('/berita/{title}', [SchoolController::class, 'showNews'])->name('news.show');
Route::get('/kegiatan', [SchoolController::class, 'activities'])->name('activities');
Route::get('/kegiatan/{title}', [SchoolController::class, 'showActivity'])->name('activities.show');
Route::get('/galeri', [SchoolController::class, 'galleries'])->name('galleries');
Route::get('/video', [SchoolController::class, 'videos'])->name('videos');
Route::get('/kerjasama', [SchoolController::class, 'cooperations'])->name('cooperations');
Route::get('/guru', [SchoolController::class, 'teachers'])->name('teachers');

Route::group(['middleware' => 'guest'], function () {
    Route::get('/autentikasi', [AuthenticationController::class, 'index'])->name('login');
    Route::post('/register', [AuthenticationController::class, 'register'])->name('register');
    Route::post('/login', [AuthenticationController::class, 'login'])->name('authenticate');
});

Route::group(['middleware' => 'auth'], function () {
    Route::post('/logout', [AuthenticationController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => 'admin'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/dashboard/news', NewsController::class)->except('show');
    Route::resource('/dashboard/videos', VideoController::class)->except('show');
    Route::resource('/dashboard/galleries', GalleryController::class)->except('show');
    Route::resource('/dashboard/cooperations', CooperationController::class)->except('show', 'edit', 'update');
    Route::resource('/dashboard/teachers', TeacherController::class)->except('show');
    Route::get('/dashboard/roles', [RoleController::class, 'index'])->name('roles.index');

    Route::get('/dashboard/siswa', [StudentController::class, 'index'])->name('students.index');
    Route::get('/dashboard/siswa/tambah', [StudentController::class, 'create'])->name('students.create');
    Route::post('/dashboard/siswa', [StudentController::class, 'store'])->name('students.store');
    Route::get('/dashboard/siswa/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
    Route::put('/dashboard/siswa/{student}', [StudentController::class, 'update'])->name('students.update');
    Route::delete('dashboard/siswa/{student}', [StudentController::class, 'destroy'])->name('students.destroy');
});
