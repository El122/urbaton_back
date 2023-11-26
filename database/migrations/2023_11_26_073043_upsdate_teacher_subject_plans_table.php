<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('teacher_subjects', function(Blueprint $table)
            {
                $table->dropColumn('plan');

                $table->string('current')->nullable()->after('subject_id');
                $table->string('total')->nullable()->after('subject_id');
            });

    }

    public function down(): void {
        Schema::table('teacher_subjects', function(Blueprint $table)
            {
                $table->string('plan')->nullable()->after('subject_id');

                $table->dropColumn('current');
                $table->dropColumn('total');
            });
    }
};
