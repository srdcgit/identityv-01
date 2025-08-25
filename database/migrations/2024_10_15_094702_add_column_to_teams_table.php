<?php

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
        Schema::table('teams', function (Blueprint $table) {
            $table->string('designation')->nullable()->after('name');
            $table->string('linkdin')->nullable()->after('designation');
            $table->string('twiter')->nullable()->after('linkdin');
            $table->string('facebook')->nullable()->after('twiter');
            $table->integer('age')->nullable()->after('facebook');
            $table->string('my_services')->nullable()->after('experience');
            $table->string('college')->nullable()->after('education');
            $table->string('university')->nullable()->after('college');
            $table->string('master_degree')->nullable()->after('university');
            $table->string('courses')->nullable()->after('specialization');
            $table->string('my_skills')->nullable()->after('courses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('teams', function (Blueprint $table) {
            //
        });
    }
};
