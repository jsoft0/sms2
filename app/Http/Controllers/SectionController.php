<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\ClassGroup;


class SectionController extends Controller
{

    public function index()
    {
        $sections = Section::all();
        return view('sections.index', compact('sections'));
    }

    public function create()
    {
        $classGroups = ClassGroup::all();
        return view('sections.create', compact('classGroups'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'class_group_id' => 'required|exists:class_groups,id',
        ]);

        Section::create($request->all());

        return redirect()->route('sections.index')->with('success', 'Section created successfully.');
    }

    public function edit(Section $section)
    {
        $classGroups = ClassGroup::all();
        return view('sections.edit', compact('section', 'classGroups'));
    }

    public function update(Request $request, Section $section)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'class_group_id' => 'required|exists:class_groups,id',
        ]);

        $section->update($request->all());

        return redirect()->route('sections.index')->with('success', 'Section updated successfully.');
    }

    public function destroy(Section $section)
    {
        $section->delete();

        return redirect()->route('sections.index')->with('success', 'Section deleted successfully.');
    }
}
