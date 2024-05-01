<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AttendenceController;
use App\Http\Controllers\ClassGroupController;
use App\Http\Controllers\AssignSubjectController;
use App\Http\Controllers\TeacherDashboardController;
use App\Http\Controllers\Auth\TeacherLoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

// Authenticated routes for CRUD operations
Route::middleware(['auth'])->group(function () {
    // Student Routes
    Route::get('/students', [StudentController::class, 'index'])->name('students.index');
    Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
    Route::post('/students', [StudentController::class, 'store'])->name('students.store');
    Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');
    Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
    Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');
    Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');

    // Subject Routes
    Route::resource('subjects', SubjectController::class)->except(['show']);

    // Section Routes
    Route::resource('sections', SectionController::class)->except(['show']);

    // Class Group Routes
    Route::resource('classes', ClassGroupController::class)->except(['show']);

    // Teacher Routes
    Route::get('add-teacher', [TeacherController::class, 'create'])->name('teacher.create');
    Route::post('add-teacher', [TeacherController::class, 'store'])->name('teacher.store');
    Route::get('teacher-list', [TeacherController::class, 'index'])->name('teacher.index');
    Route::get('edit-teacher/{teacher}', [TeacherController::class, 'edit'])->name('teacher.edit');
    Route::put('edit-teacher/{teacher}', [TeacherController::class, 'update'])->name('teacher.update');
    Route::delete('delete-teacher/{teacher}', [TeacherController::class, 'destroy'])->name('teacher.destroy');  

    // Assign Subject Routes
    Route::resource('assign_subjects', AssignSubjectController::class)->except(['show']);

    // attendence Routes
    Route::get('student/attendence', [AttendenceController::class, 'createAttendence'])->name('attendence.create');
    Route::post('student/attendence', [AttendenceController::class, 'storeAttendence'])->name('attendence.store');
    Route::get('studentreport/attendence', [AttendenceController::class, 'reportattendence'])->name('attendence.index');
});


// Teacher Authentication Routes
Route::get('/teacher/login', [TeacherLoginController::class, 'showLoginForm'])->name('teacher.login');
Route::post('/teacher/login', [TeacherLoginController::class, 'login'])->name('teacher.login.submit');
Route::post('/teacher/logout', [TeacherLoginController::class, 'logout'])->name('teacher.logout');

// Teacher Dashboard Routes
Route::prefix('teacher')->middleware('auth:teacher')->group(function () {
    Route::get('/dashboard', [TeacherDashboardController::class, 'index'])->name('teacher.dashboard');
    // Add more teacher specific routes here
});


// Authentication Routes
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
