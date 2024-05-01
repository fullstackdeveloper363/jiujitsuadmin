<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        \Illuminate\Support\Facades\DB::statement('ALTER TABLE `users` CHANGE `age` `dob` VARCHAR(191) NULL');
    }

    public function down()
    {
        \Illuminate\Support\Facades\DB::statement('ALTER TABLE `users` CHANGE `dop` `age` VARCHAR(191) NULL');
    }
};
