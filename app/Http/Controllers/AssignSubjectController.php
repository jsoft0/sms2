<?php

namespace App\Http\Controllers;
use App\Models\AssignSubject;
use App\Models\Teacher;
use App\Models\ClassGroup;
use App\Models\Section;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as Validator;

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
        // $sections = Section::all();
        $subjects = Subject::all();
        $sections = [];
        return view('assign_subjects.create', compact('teachers', 'classGroups', 'sections', 'subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'teacher_id' => 'required',
            'class_group_id' => 'required',
            'section_id' => 'required',
            'subject_id' => 'required',
        ]);

        AssignSubject::create($request->all());

        return redirect()->route('assign_subjects.index')->with('success', 'Assign Subject created successfully.');
    }

    public function edit(AssignSubject $assignSubject)
    {
        $teachers = Teacher::all();
        $classGroups = ClassGroup::all();
        // $sections = Section::all();


        $sections = Section::where('class_group_id', $assignSubject->class_group_id)->get();

        $subjects = Subject::all();
        return view('assign_subjects.edit', compact('assignSubject', 'teachers', 'classGroups', 'sections', 'subjects'));
    }

    public function update(Request $request, AssignSubject $assignSubject)
    {
        $request->validate([
            'teacher_id' => 'required',
            'class_group_id' => 'required',
            'section_id' => 'required',
            'subject_id' => 'required',
        ]);

        $assignSubject->update($request->all());

        return redirect()->route('assign_subjects.index')->with('success', 'Assign Subject updated successfully.');
    }

    public function destroy(AssignSubject $assignSubject)
    {
        $assignSubject->delete();
        return redirect()->route('assign_subjects.index')->with('success', 'Assign Subject deleted successfully.');
    }

    public function getSectionsByClassGroup(Request $request)
{
    $sections = Section::where('class_group_id', $request->class_group_id)->get();
    return response()->json($sections);
}


}
