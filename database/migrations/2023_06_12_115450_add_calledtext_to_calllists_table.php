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
        Schema::table('calllists', function (Blueprint $table) {
            //
            $table->string('calledtext');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('calllists', function (Blueprint $table) {
            //
            $table->dropColumn('calledtext');
        });
    }
};