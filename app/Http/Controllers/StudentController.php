<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\ClassGroup;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;


class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('classGroup', 'section')->get();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $classGroups = ClassGroup::all();
        $sections = Section::all();
        return view('students.create', compact('classGroups', 'sections'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'reg_no' => 'required|integer',
            'roll_no' => 'required|integer',
            'name' => 'required|string',
            'date_of_birth' => 'required|date',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'class_group_id' => 'required|exists:class_groups,id',
            'section_id' => 'required|exists:sections,id',
        ]);

        $picturePath = $request->file('picture')->store('student_pictures', 'public');

        Student::create([
            'reg_no' => $request->reg_no,
            'roll_no' => $request->roll_no,
            'name' => $request->name,
            'date_of_birth' => $request->date_of_birth,
            'picture' => $picturePath,
            'class_group_id' => $request->class_group_id,
            'section_id' => $request->section_id,
        ]);

        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }


    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit(Student $student)
    {
        $classGroups = ClassGroup::all();
        $sections = Section::all();
        return view('students.edit', compact('student', 'classGroups', 'sections'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'reg_no' => 'required|integer',
            'roll_no' => 'required|integer',
            'name' => 'required|string',
            'date_of_birth' => 'required|date',
            'class_group_id' => 'required|exists:class_groups,id',
            'section_id' => 'required|exists:sections,id',
        ]);

        // Check if a new picture was uploaded
        if ($request->hasFile('picture')) {
            $request->validate([
                'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Delete the old picture from storage
            File::delete(storage_path('app/' . $student->picture));

            // Upload the new picture
            $picturePath = $request->file('picture')->store('student_pictures', 'public');
        } else {
            // Keep the existing picture
            $picturePath = $student->picture;
        }

        // Update the student record
        $student->update([
            'reg_no' => $request->reg_no,
            'roll_no' => $request->roll_no,
            'name' => $request->name,
            'date_of_birth' => $request->date_of_birth,
            'picture' => $picturePath,
            'class_group_id' => $request->class_group_id,
            'section_id' => $request->section_id,
        ]);

        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy(Student $student)
    {
        Storage::delete($student->picture); // Delete student picture from storage
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
