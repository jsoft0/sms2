<?php

namespace App\Http\Controllers;

use App\Models\ClassGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClassGroupController extends Controller
{

    public function index(){
        $classGroups = ClassGroup::all();
        // return $classGroups;
        return view("class.index",compact("classGroups"));
    }
    public function store(Request $request){
        // return $request;
        // $classGroup=ClassGroup:

        $classGroup=ClassGroup::create([
            'name'=> $request->name,
            'teacher_id'=> $request->teacher_id,
            'section' => $request->section,
            'class' => $request->class,
            'subject' => $request->subject,
        ]);
        // $classGroup=DB::table('class_groups')->insert([
        //     'name'=> $request->name,
        //     'teacher_id'=> $request->teacher_id,
        //     'section' => $request->section,
        //     'class' => $request->class,
        //     'subject' => $request->subject,
        //     'created_at' =>now(),
        //     'updated_at'=>now(),
        // ]);
        return $classGroup;
    }


    public function destroy(ClassGroup $classGroup)
    {
        $classGroup->delete();
        return redirect()->back();
    }

    public function edit($id){

        $class = ClassGroup::find($id);
            return view("class.edit", compact("class"));
        }
        public function update(Request $request,ClassGroup $class){
            $class->update([

                'name'=> $request->name,
                'class'=> $request->class,
                'subject'=> $request->subject,
                'section'=> $request->section,

            ]);
            return redirect()->route('class.list');
        }
}
