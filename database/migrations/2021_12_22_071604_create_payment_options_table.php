<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_options', function (Blueprint $table) {
            $table->id('option_id');
            $table->string('name');
        });

        Schema::create('company_payment_option', function (Blueprint $table) {
            $table->id();
            $table->foreignId('option_id')->constrained('payment_options', 'option_id')->cascadeOnDelete();
            $table->foreignId('company_id')->constrained('companies', 'company_id')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('company_payment_option');
        Schema::dropIfExists('payment_options');
    }
}
