<?php

use App\Models\Group;
use App\Models\Perspective;
use App\Models\Persperctive;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('head_teacher_id')->foreignIdFor(User::class)->constrained()->cascadeOnUpdate();
            $table->bigInteger('perspective_id')->foreignIdFor(Perspective::class)->constrained()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('groups');
    }
};
