<?php

namespace App\Http\Controllers;


use App\Models\AssignSubject;
use App\Models\Teacher;
use App\Models\ClassGroup;
use App\Models\Section;
use App\Models\Subject;
use Illuminate\Http\Request;

class AssignSubjectController extends Controller
{
    public function index()
    {
        $assignSubjects = AssignSubject::all();
        return view('assign_subjects.index', compact('assignSubjects'));
    }

    public function create()
    {
        $teachers = Teacher::all();
        $classGroups = ClassGroup::all();
        $sections = Section::all();
        $subjects = Subject::all();
        return view('assign_subjects.create', compact('teachers', 'classGroups', 'sections', 'subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'teacher_id' => 'required|exists:teachers,id',
            'class_group_id' => 'required|exists:class_groups,id',
            'section_id' => 'required|exists:sections,id',
            'subject_id' => 'required|exists:subjects,id',
        ]);

        AssignSubject::create($request->all());

        return redirect()->route('assign_subjects.index')->with('success', 'Assigned subject created successfully.');
    }

    public function edit(AssignSubject $assignSubject)
    {
        $teachers = Teacher::all();
        $classGroups = ClassGroup::all();
        $sections = Section::all();
        $subjects = Subject::all();
        return view('assign_subjects.edit', compact('assignSubject', 'teachers', 'classGroups', 'sections', 'subjects'));
    }

    public function update(Request $request, AssignSubject $assignSubject)
    {
        $request->validate([
            'teacher_id' => 'required|exists:teachers,id',
            'class_group_id' => 'required|exists:class_groups,id',
            'section_id' => 'required|exists:sections,id',
            'subject_id' => 'required|exists:subjects,id',
        ]);

        $assignSubject->update($request->all());

        return redirect()->route('assign_subjects.index')->with('success', 'Assigned subject updated successfully.');
    }

    public function destroy(AssignSubject $assignSubject)
    {
        $assignSubject->delete();

        return redirect()->route('assign_subjects.index')->with('success', 'Assigned subject deleted successfully.');
    }
}
