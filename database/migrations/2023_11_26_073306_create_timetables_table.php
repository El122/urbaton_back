<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('timetables', function(Blueprint $table)
            {
                $table->id();

                $table->date('date');
                $table->integer('index');
                $table->string('classwork')->nullable();
                $table->string('homework')->nullable();

                $table->foreignId('teacher_subject_id');
                $table->foreignId('group_id');

                $table->timestamps();
            });
    }

    public function down(): void {
        Schema::dropIfExists('timetables');
    }
};
