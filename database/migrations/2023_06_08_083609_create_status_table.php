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
        Schema::create('status', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('interest')->default(0);
            $table->tinyInteger('called')->default(0);
            $table->tinyInteger('meeting')->default(0);
            $table->tinyInteger('followup')->default(0);
            $table->integer('userid');
            $table->integer('customerid');
            $table->integer('sectiontype');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('status');
    }
};