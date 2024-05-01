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
        Schema::table('sub_assessments', function (Blueprint $table) {
            $table->integer('order_number')->after('assessment_id')->nullable();
        });
        Schema::table('assessment_l2_s', function (Blueprint $table) {
            $table->integer('order_number')->after('sub_assessment_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tables', function (Blueprint $table) {
            //
        });
    }
};
