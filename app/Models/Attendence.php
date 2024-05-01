<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendence extends Model
{
    use HasFactory;
    protected $guarded=['id'];


protected $fillable = ['class_id', 'section_id', 'attendance_date', /* other columns */];



    public function classGroup(){
        return $this->belongsTo(ClassGroup::class,'class_group_id');
    }

    public function section(){
        return $this->belongsTo(Section::class,'section_id');
    }

    public function student(){
        return $this->belongsTo(Student::class,'student_id');
    }


}
