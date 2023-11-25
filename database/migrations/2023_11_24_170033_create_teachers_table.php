<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->cascadeOnDelete();

            $table->integer("experience")->default(0);
            $table->string("role")->nullable();

            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('teachers');
    }
};
