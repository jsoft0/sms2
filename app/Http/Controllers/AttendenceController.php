<?php

namespace App\Http\Controllers;

use App\Models\Attendence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendenceController extends Controller
{

    public function index(){
        $attendences=Attendence::all();
        // return view('subjects.index',['subjects'=>$subjects]);
        return view('attendence.index',compact('attendences'));

    }
    public function store(Request $request){


     // DB::table('attendences')->insert([

        // ]);
        $attendence =Attendence::create([
            'name'=>$request->st_name,
            'reg_no'=>$request->r_no,
            'roll_no'=>$request->roll_no,
        ]);

        return redirect()->back();

        // $attendence = new Attendence;
        // $attendence->name=$request->st_name;
        // $attendence->reg_no=$request->r_no;
        // $attendence->roll_no=$request->roll_no;
        // $attendence->save();
    }

    public function destroy($id)
        {
            DB::table('attendences')->where('id',$id)->delete();

            return redirect()->back();

        }

}
