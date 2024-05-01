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
        Schema::create('assessment_l2_s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sub_assessment_id')->constrained('sub_assessments')->cascadeOnDelete();
            $table->string('title');
            $table->text('video');
            $table->text('skill_point');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assessment_l2_s');
    }
};
