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
        // flashy()->success('Class deleted successfully !','#');

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
        // flashy()->success('Class created successfully !','#');
        return redirect()->route('classes.index')->with('success', 'Class created successfully.');
    }

    public function edit($id)
    {
        // flashy()->success('Class edit successfully !','#');
        $classGroup=ClassGroup::where('id',$id)->first();


        return view('classes.edit', compact('classGroup'));


    }

    public function update(Request $request, $id)
    {
        $classGroup=ClassGroup::where('id',$id)->first();

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $classGroup->update($request->all());
        // flashy()->success('Class update successfully !','#');
        return redirect()->route('classes.index')->with('success', 'Class updated successfully.');
    }

    public function destroy($id)
    {
        $classGroup=ClassGroup::where('id',$id)->first();
        $classGroup->delete();
        flashy()->success('Class deleted successfully !','#');
        return redirect()->route('classes.index')->with('success', 'Class deleted successfully.');
    }
}
