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
            'register_id' => rand(100000, 999999),
            'active_role' => 'administrator',
            'email' => 'orxan@gmail.com',
            'email_verified_at' => now(),
            'updated_at' => null,
            'password' => Hash::make('Orxan@620')
        ])->assignRole(['administrator', 'manager', 'head-teacher', 'teacher', 'supervisor', 'student', 'mentor']);

        User::create([
            'first_name' => 'Anar',
            'last_name' => 'Memmedov',
            'register_id' => rand(100000, 999999),
            'active_role' => 'manager',
            'email' => 'anar@gmail.com',
            'email_verified_at' => now(),
            'updated_at' => null,
            'password' => Hash::make('anaranar'),
        ])->assignRole(['manager', 'teacher', 'mentor', 'student']);

        User::create([
            'first_name' => 'Abbas',
            'last_name' => 'Abasov',
            'register_id' => rand(100000, 999999),            
            'active_role' => 'head-teacher',
            'email' => 'abbas@gmail.com',
            'email_verified_at' => now(),
            'updated_at' => null,
            'password' => Hash::make('abbas123'),
        ])->assignRole(['head-teacher', 'teacher', 'manager', 'student']);

        User::create([
            'first_name' => 'Nazile',
            'last_name' => 'Memmedova',
            'register_id' => rand(100000, 999999),            
            'email' => 'nazile@gmail.com',
            'email_verified_at' => now(),
            'updated_at' => null,
            'password' => Hash::make('hermosaa'),
        ])->assignRole('teacher', 'head-teacher', 'student');

        User::create([
            'first_name' => 'Cavid',
            'last_name' => 'Hesenov',
            'register_id' => rand(100000, 999999),            
            'email' => 'cavid@gmail.com',
            'email_verified_at' => now(),
            'updated_at' => null,
            'password' => Hash::make('JohnyBravo'),
        ])->assignRole('mentor', 'student');

        User::create([
            'first_name' => 'Peter',
            'last_name' => 'Parker',
            'register_id' => rand(100000, 999999),            
            'email' => 'peter@gmail.com',
            'email_verified_at' => now(),
            'updated_at' => null,
            'password' => Hash::make('spiderboy'),
        ])->assignRole('student');

        User::create([
            'first_name' => 'Clark',
            'last_name' => 'Kent',
            'register_id' => rand(100000, 999999),            
            'email' => 'clark@gmail.com',
            'email_verified_at' => now(),
            'updated_at' => null,
            'password' => Hash::make('kriptonyte'),
        ])->assignRole('supervisor', 'student');
    }
}
