<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function head_teacher(){
        return $this-> belongsTo(User::class);
    }

    public function perspectıve(){
        return $this-> belongsTo(Perspective::class);
    }

    public function lessons(){
        return $this->hasMany(Lesson::class);
    }
}
