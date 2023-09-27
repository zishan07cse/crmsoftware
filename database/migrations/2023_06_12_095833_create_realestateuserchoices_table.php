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
        Schema::create('realestateuserchoices', function (Blueprint $table) {
            $table->id();
            $table->string('flatinuae');
            $table->string('prefercountry');
            $table->string('propertytpe');
            $table->string('cityname');
            $table->string('areaname');
            $table->string('paymenttype');
            $table->string('movingtime');
            $table->string('developername');
            $table->string('developernamebyus');
            $table->bigInteger('totalbudget');
            $table->integer('userid');
            $table->integer('customerid');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('realestateuserchoices');
    }
};