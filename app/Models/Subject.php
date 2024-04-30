<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $guarded=['id'];

    public function ClassGroup(){
        return $this->belongsTo(ClassGroup::class,'class_group_id');
    }

    public function assignSubjects()
    {
        return $this->hasMany(AssignSubject::class);
    }

}
