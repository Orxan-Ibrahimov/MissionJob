<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mockery\Matcher\Any;

class Group extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function head_teacher()
    {
        return $this->belongsTo(User::class);
    }

    public function perspectıve()
    {
        return $this->belongsTo(Perspective::class);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class);
    }


    public function members()
    {
        return $this->hasMany(User::class);
    }

    public function attendances()
    {
        return $this->hasMany(StudentAttendance::class);
    }  
    
}
