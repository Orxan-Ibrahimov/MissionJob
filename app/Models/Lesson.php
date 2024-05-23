<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function lectures()
    {
        return $this->hasMany(Lecture::class);
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
