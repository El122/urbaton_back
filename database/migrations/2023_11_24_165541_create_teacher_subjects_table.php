<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('teacher_subjects', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained();
            $table->foreignId('group_id')->constrained();
            $table->foreignId('subject_id')->constrained();

            $table->integer('plan');
            $table->string('year');

            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('teacher_subjects');
    }
};
