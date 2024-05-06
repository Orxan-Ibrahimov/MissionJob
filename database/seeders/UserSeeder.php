<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Orxan',
            'last_name' => 'Ibrahimov',
            'nickname' => 'Developer',
             'active_role' => 'administrator',
            'email' => 'orxan@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('Orxan@620')
        ])->assignRole(['administrator', 'manager', 'head-teacher', 'teacher', 'supervisor', 'student', 'mentor']);

        User::create([
            'first_name' => 'Anar',
            'last_name' => 'Memmedov',
            'nickname' => 'Programmer',
            'active_role' => 'manager',
            'email' => 'anar@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('anaranar'),
        ])->assignRole(['manager', 'teacher', 'mentor']);

        User::create([
            'first_name' => 'Abbas',
            'last_name' => 'Abasov',
            'nickname' => 'King',
            'active_role' => 'head-teacher',
            'email' => 'abbas@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('abbas123'),
        ])->assignRole(['head-teacher', 'teacher', 'manager']);

        User::create([
            'first_name' => 'Nazile',
            'last_name' => 'Memmedova',
            'nickname' => 'Hermosa',
            'email' => 'nazile@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('hermosaa'),
        ])->assignRole('teacher', 'head-teacher');

        User::create([
            'first_name' => 'Cavid',
            'last_name' => 'Hesenov',
            'nickname' => 'Johny',
            'email' => 'cavid@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('JohnyBravo'),
        ])->assignRole('mentor');

        User::create([
            'first_name' => 'Peter',
            'last_name' => 'Parker',
            'nickname' => 'Spider',
            'email' => 'peter@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('spiderboy'),
        ])->assignRole('student');

        User::create([
            'first_name' => 'Clark',
            'last_name' => 'Kent',
            'nickname' => 'superman',
            'email' => 'clark@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('kriptonyte'),
        ])->assignRole('supervisor');
    }
}
