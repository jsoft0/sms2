<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    public function index(){
        $subjects=Subject::all();
        // return view('subjects.index',['subjects'=>$subjects]);
        return view('subjects.index',compact('subjects'));

    }
    public function create()
    {
        return view("subjects.add");
    }
    public function store(Request $request)
    {
        // return $request;

        // $subject = new Subject;
        // $subject->name=$request->s_name;
        // $subject->course_code=$request->s_code;
        // $subject->save();
        DB::table('subjects')->insert([

            'name'=>$request->s_name,
            'course_code'=>$request->s_code,
            'created_at'=>now(),
            'updated_at'=>now(),

        ]);

        return redirect()->back();
    }

    public function edit($id){

        $subject = Subject::find($id);
            return view("subjects.edit", compact("subject"));
        }
        public function update(Request $request,$id){
            // $subject=Subject::find($id);
            // $subject->update([

            //     'name'=> $request->s_name,
            //     'course_code'=>$request->s_code,

            // ]);

            DB::table('subjects')->where('id',$id)->update([
                 'name'=> $request->s_name,
                'course_code'=>$request->s_code,
            ]) ;

            return redirect()->route('subject.index');
        }

        public function destroy($id)
        {
            DB::table('subjects')->where('id',$id)->delete();

            return redirect()->back();

        }

}
