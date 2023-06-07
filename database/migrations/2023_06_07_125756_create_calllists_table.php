<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('calllists', function (Blueprint $table) {
            $table->id();
            $table->date('called_date');
            $table->time('called_time');
            $table->integer('userid');
            $table->integer('customerid');
            $table->integer('callednumber');
            $table->integer('sectiontype');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calllists');
    }
};