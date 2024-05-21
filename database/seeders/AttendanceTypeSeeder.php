<?php

namespace Database\Seeders;

use App\Models\AttendanceType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttendanceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AttendanceType::create(['action' => 'present']);
        AttendanceType::create(['action' => 'late']);
        AttendanceType::create(['action' => 'absent']);
    }
}
