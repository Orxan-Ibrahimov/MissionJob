<?php

use App\Models\Group;
use App\Models\TaskType;
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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->bigInteger('task_type_id')->foreignIdFor(TaskType::class)->constrained()->cascadeOnUpdate();
            $table->bigInteger('group_id')->foreignIdFor(Group::class)->constrained()->cascadeOnUpdate();
            $table->date('deadline');
            $table->string('request');
            $table->string('response')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
