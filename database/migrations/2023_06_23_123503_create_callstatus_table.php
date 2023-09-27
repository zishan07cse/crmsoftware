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
        Schema::create('callstatus', function (Blueprint $table) {
            $table->id();
            $table->string('callstatus');
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
        Schema::dropIfExists('callstatus');
    }
};