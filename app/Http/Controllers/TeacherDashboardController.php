<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\Models\Student;
use App\Models\Attendence;
use App\Models\ClassGroup;
use Illuminate\Http\Request;

class TeacherDashboardController extends Controller
{
    public function index(){
        return view('t_dashboard.index');
    }



    public function getSections(Request $request)
    {
        $classId = $request->input('class_id');
        $sections = Section::where('class_group_id', $classId)->get();

        $options = '<option selected>Select Section</option>';
        foreach ($sections as $section) {
            $options .= '<option value="' . $section->id . '">' . $section->name . '</option>';
        }

        return $options;
    }

    //new function end//
    // public function createAttendence(Request $request)
    // {

    //     if ($request->has('select-class')) {

    //         $students = Student::where('class_group_id', $request->input('select-class'))->where('section_id', $request->input('select-section'))->get();
    //     } else {
    //         $students = Student::all();
    //     }
    //     $classes = ClassGroup::all();
    //     $sections = Section::all();
    //     return view('t_dashboard.attendance.create', compact('students', 'classes', 'sections'));
    // }



    public function createAttendence(Request $request)
{
    $classes = ClassGroup::all();
    $sections = Section::all();

    if ($request->has('select-class') && $request->has('select-section')) {
        $students = Student::where('class_group_id', $request->input('select-class'))
            ->where('section_id', $request->input('select-section'))
            ->get();
    } else {
        $students = collect(); // Empty collection if no specific criteria are met
    }

    return view('t_dashboard.attendance.create', compact('students', 'classes', 'sections'));
}



    public function storeAttendence(Request $request)
    {
        // Get attendance data and current date from the request
        $attendanceData = $request->input('attendance');
        $currentDate = $request->input('attendance_date');
        // return  $attendanceData;
        foreach ($attendanceData as $studentId => $status) {
           // Check if attendance has already been marked for the selected class, section, and date
            $existingAttendance = Attendence::where('student_id', $studentId)
            ->where('date', $currentDate)
            ->exists();

            if ($existingAttendance) {
                return back()->with('error', 'Attendance has already been marked for this class, section, and date.');
            }
        }

        // Loop through each attendance record
        foreach ($attendanceData as $studentId => $status) {
            // Check if $studentId is a valid student ID (non-empty)
            if ($studentId) {
                // Create a new Attendence model instance
                $attendanceModel = new Attendence();

                // Set the attributes and save the attendance record
                $attendanceModel->student_id = $studentId;
                $attendanceModel->status = $status;
                $attendanceModel->date = $currentDate;
                $attendanceModel->save();
            }
        }

        // Return a response indicating success
        // return response()->json(['message' => 'Attendance data saved successfully']);
        return redirect()->route('t_dashboard.attendance.create')->withInput($request->all());
    }




    //new code //
    public function getSections1(Request $request)
    {
        $classId = $request->input('class_id');
        $sections = Section::where('class_group_id', $classId)->get();

        $html = '<select class="custom-select" name="select-section">';
        $html .= '<option selected>Select Section</option>';
        foreach ($sections as $section) {
            $html .= '<option value="' . $section->id . '">' . $section->name . '</option>';
        }
        $html .= '</select>';

        return $html;
    }


    //new code //

    public function reportAttendence(Request $request)
    {
        // Fetch all classes, sections, and students
        $classes = ClassGroup::all();
        $sections = Section::all();
        $students = Student::all();

        // Check if specific class, section, and date are selected
        if ($request->filled('select-class', 'select-section', 'attendance_date')) {
            // Validate the form data
            $request->validate([
                'select-class' => 'required|numeric',
                'select-section' => 'required|numeric',
                'attendance_date' => 'required|date',
            ]);

            // Retrieve the selected class, section, and attendance date from the form
            $classId = $request->input('select-class');
            $sectionId = $request->input('select-section');
            $attendanceDate = $request->input('attendance_date');

            // Use your model to fetch attendance data based on the selected criteria
            $attendanceData = Attendence::whereHas('student', function ($query) use ($classId, $sectionId) {
                $query->where('class_group_id', $classId)
                    ->where('section_id', $sectionId);
            })
                ->where('date', $attendanceDate)
                ->get();

            // Pass the data to your view for rendering
            return view('t_dashboard.attendance.index', compact('attendanceData', 'classes', 'sections', 'students'));
        } else {
            // If no specific criteria selected, return the view without student list
            return view('t_dashboard.attendance.index', compact('classes', 'sections', 'students'));
        }
    }

}
