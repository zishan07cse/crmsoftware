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
        Schema::create('realestate_customers', function (Blueprint $table) {
            $table->id();
            $table->integer('cif');
            $table->string('fullname');
            $table->string('nationality');
            $table->string('country');
            $table->string('customer_category');
            $table->integer('mobilenumber');
            $table->string('profession');
            $table->string('designation');
            $table->string('organizationname');
            $table->integer('annualincome');
            $table->integer('disbursement');
            $table->integer('totalfinanceamount');
            $table->integer('assefinanceamount');
            $table->integer('delinquency');
            $table->integer('userid');
            $table->boolean('status')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('realestate_customers');
    }
};