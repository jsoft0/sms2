<?php

use App\Models\Subject;
use App\Models\Attendence;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AttendenceController;
use App\Http\Controllers\ClassGroupController;

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

Route::get('add-class', function () {
    return view('class.add');
})->name('add.class');

Route::get('list-class', [ClassGroupController::class, 'index'])->name('class.list');
Route::post('add-class', [ClassGroupController::class, 'store'])->name('class.store');

Route::delete('delete-class/{classGroup}', [ClassGroupController::class, 'destroy'])->name('class.destroy');

Route::get('edit-class/{classGroup}', [ClassGroupController::class, 'edit'])->name('class.edit');
Route::put('edit-class/{ClassGroup}', [ClassGroupController::class, 'update'])->name('class.update');

Route::get('add-teacher', [TeacherController::class, 'create'])->name('teacher.create');

Route::post('add-teacher', [TeacherController::class, 'store'])->name('teacher.store');

Route::get('teacher-list', [TeacherController::class, 'index'])->name('teacher.index');

Route::get('edit-teacher/{teacher}', [TeacherController::class, 'edit'])->name('teacher.edit');
Route::put('edit-teacher/{teacher}', [TeacherController::class, 'update'])->name('teacher.update');

Route::delete('delete-teacher/{teacher}', [TeacherController::class, 'destroy'])->name('teacher.destroy');

Route::get('add-student', [SubjectController::class,'create'])->name('add.students');



Route::get('add-subject', [SubjectController::class,'create'])->name('add.subjects');

Route::post('add-subject', [SubjectController::class,'store'])->name('subject.store');
Route::get('subjects', [SubjectController::class,'index'])->name('subject.index');
Route::get('edit-subject/{subjects}', [SubjectController::class, 'edit'])->name('subject.edit');
Route::PUT('edit-subject/{subject}', [SubjectController::class, 'update'])->name('subject.update');
Route::delete('delete-subject/{subject}', [SubjectController::class, 'destroy'])->name('subject.destroy');


Route::get('add-attendence', function () {
    return view('attendence.add');
})->name('add.attendence');

Route::post('add-attendence', [AttendenceController::class,'store'])->name('attendence.store');
Route::get('attendences', [AttendenceController::class,'index'])->name('attendence.index');
Route::get('edit-attendence{attendences}', [AttendenceController::class, 'edit'])->name('attendence.edit');
Route::PUT('edit-attendence/{attendence}', [AttendenceController::class, 'update'])->name('attendence.update');
Route::delete('delete-attendence/{attendence}', [AttendenceController::class, 'destroy'])->name('attendence.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
