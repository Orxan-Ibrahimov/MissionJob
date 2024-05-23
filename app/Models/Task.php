<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function task_type(){
        return $this->belongsTo(TaskType::class);
    }

    public function group(){
        return $this->belongsTo(Group::class);
    }

    public function lesson(){
        return $this->belongsTo(Lesson::class);
    }
}
