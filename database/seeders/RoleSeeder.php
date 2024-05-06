<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'administrator']);
        Role::create(['name' => 'manager']);
        Role::create(['name' => 'head-teacher']);
        Role::create(['name' => 'teacher']);
        Role::create(['name' => 'mentor']);
        Role::create(['name' => 'student']);
        Role::create(['name' => 'supervisor']);
    }
}
