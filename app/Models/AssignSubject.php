<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignSubject extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function teacher(){
        return $this->belongsTo(Teacher::class,'teacher_id');
    }
    public function classGroup(){
        return $this->belongsTo(ClassGroup::class,'class_group_id');
    }

    public function section(){
        return $this->belongsTo(Section::class,'section_id');
    }

    public function subject(){
        return $this->belongsTo(Subject::class,'subject_id');
    }





}
