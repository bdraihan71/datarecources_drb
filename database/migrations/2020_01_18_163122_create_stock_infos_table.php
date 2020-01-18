<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('company_id');
            $table->string('last_trading_price')->nullable();
            $table->string('closing_price')->nullable();
            $table->string('yesterday_closing')->nullable();
            $table->string('price_change')->nullable();
            $table->string('turnover_(bdt_mn)')->nullable();
            $table->string('volume')->nullable();
            $table->string('trade')->nullable();
            $table->string('sponsor_or_director')->nullable();
            $table->string('foreign_public')->nullable();
            $table->string('paid_up_capital_bdt_mn')->nullable();
            $table->string('5_year_revenue_cagr')->nullable();
            $table->string('5_year_npat_cagr')->nullable();
            $table->string('p_or_e_audited')->nullable();
            $table->string('p_or_e_unaudied')->nullable();
            $table->string('navps')->nullable();
            $table->string('p_or_navps_divinded')->nullable();
            $table->string('dividend_yield')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_infos');
    }
}
