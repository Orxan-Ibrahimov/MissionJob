<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Group::create([
            'name' => 'Back 1',
            'head_teacher_id' => 3,
            'perspective_id' => 1
        ]);

        Group::create([
            'name' => 'Front 12',
            'head_teacher_id' => 4,
            'perspective_id' => 2
        ]);
    }
}
