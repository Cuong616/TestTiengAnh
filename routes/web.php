<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\UserManagementController;

// ── Auth routes (guests only) ──────────────────────────────
Route::middleware('guest')->group(function () {
    Route::get('/login',     [LoginController::class,    'showForm'])->name('login');
    Route::post('/login',    [LoginController::class,    'login']);
    Route::get('/register',  [RegisterController::class, 'showForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
});

// ── Logout ────────────────────────────────────────────────
Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout')->middleware('auth');

// ── Public routes ─────────────────────────────────────────
Route::get('/',            fn() => redirect()->route('dashboard'));
Route::get('/dashboard',   [PageController::class, 'dashboard'])->name('dashboard');
Route::get('/vocabulary',  [PageController::class, 'vocabulary'])->name('vocabulary');
Route::get('/grammar',     [PageController::class, 'grammar'])->name('grammar');
Route::get('/listening',   [PageController::class, 'listening'])->name('listening');
Route::get('/speaking',    [PageController::class, 'speaking'])->name('speaking');
Route::get('/reading',     [PageController::class, 'reading'])->name('reading');
Route::get('/writing',     [PageController::class, 'writing'])->name('writing');
Route::get('/exercises',   [PageController::class, 'exercises'])->name('exercises');
Route::get('/flashcards',  [PageController::class, 'flashcards'])->name('flashcards');
Route::get('/exams',       [PageController::class, 'exams'])->name('exams');
Route::get('/leaderboard', [PageController::class, 'leaderboard'])->name('leaderboard');
Route::get('/progress',    [PageController::class, 'progress'])->name('progress');

// ── Auth-required (user) ──────────────────────────────────
Route::middleware('auth')->group(function () {
    Route::get('/profile',  [PageController::class, 'profile'])->name('profile');
    Route::get('/settings', [PageController::class, 'settings'])->name('settings');
});

// ── Admin routes ──────────────────────────────────────────
Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {

    // Dashboard
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Quản lý khoá học
    Route::get   ('/courses',                      [CourseController::class, 'index'])  ->name('courses.index');
    Route::get   ('/courses/create',               [CourseController::class, 'create']) ->name('courses.create');
    Route::post  ('/courses',                      [CourseController::class, 'store'])  ->name('courses.store');
    Route::get   ('/courses/{course}/edit',        [CourseController::class, 'edit'])   ->name('courses.edit');
    Route::put   ('/courses/{course}',             [CourseController::class, 'update']) ->name('courses.update');
    Route::delete('/courses/{course}',             [CourseController::class, 'destroy'])->name('courses.destroy');

    // Bài học (sub-resource)
    Route::post  ('/courses/{course}/lessons',             [CourseController::class, 'storelesson'])   ->name('courses.lessons.store');
    Route::delete('/courses/{course}/lessons/{lesson}',    [CourseController::class, 'destroyLesson']) ->name('courses.lessons.destroy');

    // Quản lý người dùng
    Route::get   ('/users',              [UserManagementController::class, 'index'])      ->name('users.index');
    Route::get   ('/users/{user}',       [UserManagementController::class, 'show'])       ->name('users.show');
    Route::patch ('/users/{user}/role',  [UserManagementController::class, 'updateRole']) ->name('users.updateRole');
    Route::delete('/users/{user}',       [UserManagementController::class, 'destroy'])    ->name('users.destroy');
});
