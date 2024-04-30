<?php

namespace App\Models;

use App\Models\Attendence;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Student extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function classGroup()
    {
        return $this->belongsTo(ClassGroup::class);
    }

    public function attendences()
    {
        return $this->hasMany(Attendence::class);
    }
    public function section(){
        return $this->belongsTo(Section::class,'section_id');
    }


}


