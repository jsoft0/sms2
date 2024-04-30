<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        // return $classGroups;
        return view("teacher.index", compact("teachers"));
    }
    public function create()
    {
        return view("teacher.add");
    }
    public function store(Request $request)
    {
        // return $request;
        $teacher = Teacher::create($request->all());
        return redirect()->route('teacher.index')->with("success", "Successfully created Teacher");
    }

    public function edit($id){

    $teacher = Teacher::find($id);
        return view("teacher.edit", compact("teacher"));
    }
    public function update(Request $request,Teacher $teacher){
        $teacher->update([

            'name'=> $request->name,
            'address'=> $request->address,
            'email'=> $request->email,
            'phone'=> $request->phone,

        ]);
        return redirect()->route('teacher.index');
    }
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect()->back();
    }
}
