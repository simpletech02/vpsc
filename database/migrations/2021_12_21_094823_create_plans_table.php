<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id('plan_id');
            $table->foreignId('company_id')->constrained('companies', 'company_id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->unsignedInteger('disk_size');
            $table->string('disk_type');
            $table->unsignedInteger('ram');
            $table->unsignedInteger('cpu_count');
            $table->unsignedInteger('cpu_mhz');
            $table->string('traffic');
            $table->unsignedInteger('port_speed');
            $table->unsignedFloat('price_usd');
            $table->unsignedFloat('price_rub');
            $table->unsignedFloat('price_eur');
            $table->timestamp('dt_added')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plans');
    }
}
