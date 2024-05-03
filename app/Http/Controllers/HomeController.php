<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\Attendence;
use App\Models\ClassGroup;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
// Get the counts from each table
$totalClasses = ClassGroup::count();
$totalSections = Section::count();
$totalTeachers = Teacher::count();
$totalStudents = Student::count();
$totalSubjects = Subject::count();
$totalAttendances = Attendence::count();

// Store the counts in an associative array
$tableCounts = [
    'Classes' => $totalClasses,
    'Sections' => $totalSections,
    'Teachers' => $totalTeachers,
    'Students' => $totalStudents,
    'Subjects' => $totalSubjects,
];
        return view('admin',compact('tableCounts'));
    }
}
