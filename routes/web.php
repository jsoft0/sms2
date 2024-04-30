<?php

use App\Models\Subject;
use App\Models\Attendence;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AttendenceController;
use App\Http\Controllers\ClassGroupController;
use App\Http\Controllers\AssignSubjectController;

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

Route::resource('classes', ClassGroupController::class);




Route::get('add-teacher', [TeacherController::class, 'create'])->name('teacher.create');

Route::post('add-teacher', [TeacherController::class, 'store'])->name('teacher.store');

Route::get('teacher-list', [TeacherController::class, 'index'])->name('teacher.index');

Route::get('edit-teacher/{teacher}', [TeacherController::class, 'edit'])->name('teacher.edit');
Route::put('edit-teacher/{teacher}', [TeacherController::class, 'update'])->name('teacher.update');

Route::delete('delete-teacher/{teacher}', [TeacherController::class, 'destroy'])->name('teacher.destroy');


// students
Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');
Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');
Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');





Route::resource('subjects', SubjectController::class);


//section



Route::resource('sections', SectionController::class);






Route::resource('assign_subjects', AssignSubjectController::class);



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
