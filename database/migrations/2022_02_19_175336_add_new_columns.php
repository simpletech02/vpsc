<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->string('link')->after('crypto_friendly')->nullable();
            $table->string('primary_currency', 3)->after('link');
        });

        Schema::table('plans', function (Blueprint $table) {
            $table->string('name')->after('company_id')->nullable();
            $table->string('link')->after('name')->nullable();
            $table->boolean('is_btcpay')->after('price_eur')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn('link');
            $table->dropColumn('primary_currency');
        });

        Schema::table('plans', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('link');
            $table->dropColumn('is_btcpay');
        });
    }
}
