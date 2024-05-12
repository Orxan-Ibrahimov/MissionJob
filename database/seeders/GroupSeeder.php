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
            'name' => 'Test Group',
            'head_teacher_id' => 3
        ]);

        Group::create([
            'name' => 'Arrogant Group',
            'head_teacher_id' => 4
        ]);
    }
}
