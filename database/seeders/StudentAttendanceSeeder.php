<?php

namespace Database\Seeders;

use App\Models\StudentAttendance;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;

class StudentAttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StudentAttendance::create([
            'date' => now(),
            'group_id' => 3,
            'user_id' => 6,
            'creator_id' => 1,
            'attendance_type_id' => 1
        ]);

        StudentAttendance::create([
            'date' => date_create('2024/04/20'),
            'group_id' => 3,
            'user_id' => 6,
            'creator_id' => 1,
            'attendance_type_id' => 1
        ]);


        StudentAttendance::create([
            'date' => now(),
            'group_id' => 3,
            'user_id' => 7,
            'creator_id' => 1,
            'attendance_type_id' => 2
        ]);
        StudentAttendance::create([
            'date' => date_create('2024/04/20'),
            'group_id' => 3,
            'user_id' => 7,
            'creator_id' => 1,
            'attendance_type_id' => 2
        ]);
    }
}
