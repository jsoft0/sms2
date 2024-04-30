<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use HasFactory;

    use SoftDeletes;
    protected $guarded=['id'];

    public function classGroup()
    {
        return $this->belongsTo(ClassGroup::class, 'class_group_id');
    }
    public function student() : HasMany {
        return $this->hasMany(Student::class);
    }


}
