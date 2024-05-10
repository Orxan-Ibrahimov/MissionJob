<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Nette\Utils\Random;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');  
            $table->string('profile');
            $table->string('gender');         
            $table->string('active_role')-> default('student');
            $table->string('email')->unique();           
            $table->timestamp('email_verified_at')-> default(now());
            $table->string('password');
            $table->string('register_id') -> unique() -> default(rand(100000, 999999));
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
