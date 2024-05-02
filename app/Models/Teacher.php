<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Teacher extends Authenticatable
{
    use HasFactory;
    use Notifiable;

    protected $guarded=['id'];

    public function assignSubjects()
    {
        return $this->hasMany(AssignSubject::class);
    }
}
