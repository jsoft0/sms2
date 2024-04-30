<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\ClassGroup;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return view('subjects.index', compact('subjects'));
    }

    public function create()
    {
        $classGroups = ClassGroup::all();
        return view('subjects.create', compact('classGroups'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'class_group_id' => 'required|exists:class_groups,id',
        ]);

        Subject::create($request->all());

        return redirect()->route('subjects.index')->with('success', 'Subject created successfully.');
    }

    public function show(Subject $subject)
    {
        return view('subjects.show', compact('subject'));
    }

    public function edit(Subject $subject)
    {
        $classGroups = ClassGroup::all();
        return view('subjects.edit', compact('subject', 'classGroups'));
    }

    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'class_group_id' => 'required|exists:class_groups,id',
        ]);

        $subject->update($request->all());

        return redirect()->route('subjects.index')->with('success', 'Subject updated successfully.');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();

        return redirect()->route('subjects.index')->with('success', 'Subject deleted successfully.');
    }
}
