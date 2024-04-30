<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClassGroup extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded=['id'];


    public function sections()
    {
        return $this->hasMany(Section::class);
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }

    public function assignSubjects()
    {
        return $this->hasMany(AssignSubject::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
