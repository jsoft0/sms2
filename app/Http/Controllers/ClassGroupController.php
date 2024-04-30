<?php

namespace App\Http\Controllers;
use App\Models\ClassGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as Validator;

class ClassGroupController extends Controller
{
    public function index()
    {
        $classGroups = ClassGroup::all();
        return view('classes.index', compact('classGroups'));
    }

    public function create()
    {
        return view('classes.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $classGroup = ClassGroup::create($request->all());
        return redirect()->route('classes.index')->with('success', 'Class created successfully.');
    }

    public function edit($id)
    {
        $classGroup=ClassGroup::where('id',$id)->first();
        return view('classes.edit', compact('classGroup'));
    }

    public function update(Request $request, ClassGroup $classGroup)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $classGroup->update($request->all());
        return redirect()->route('classes.index')->with('success', 'Class updated successfully.');
    }

    public function destroy($id)
    {
        $classGroup=ClassGroup::where('id',$id)->first();
        $classGroup->delete();
        return redirect()->route('classes.index')->with('success', 'Class deleted successfully.');
    }
}
