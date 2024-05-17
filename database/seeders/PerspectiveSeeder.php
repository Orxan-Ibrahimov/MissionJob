<?php

namespace Database\Seeders;

use App\Models\Perspective;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerspectiveSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Perspective::create( ['name' => "Backend", 'creator_id' => 1]);
        Perspective::create( ['name' => "Frontend",'creator_id' => 1]);
    }
}
