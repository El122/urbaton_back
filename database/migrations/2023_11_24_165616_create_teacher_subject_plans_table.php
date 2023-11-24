<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('teacher_subject_plans', function (Blueprint $table) {
            $table->id();

            $table->foreignId('teacher_subject_id')->constrained();
            $table->foreignId('group_id')->constrained();

            $table->integer('current');
            $table->integer('total');
            $table->string('year');

            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('teacher_subject_plans');
    }
};
