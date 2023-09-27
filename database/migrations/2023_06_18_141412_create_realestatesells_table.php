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
        Schema::create('realestatesells', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('sellingcityname');
            $table->string('sellingareaname');
            $table->string('sellingpaymenttype');
            $table->bigInteger('totalprice');
            $table->bigInteger('sellngdate');
            $table->integer('userid');
            $table->integer('customerid');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('realestatesells');
    }
};
