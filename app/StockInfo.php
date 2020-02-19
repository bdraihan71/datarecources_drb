<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StockInfo extends DrbModel
{
    
    public function company(){
        return $this->belongsTo('App\Company');
    }

    public function getThreeYearRevenueCagrAttribute(){
        if($this->beginning_revenue!=0){
            return (($this->ending_revenue / $this->beginning_revenue) ** (1/3))-1;
        }
        return '';
    }

    public function getThreeYearNpatCagrAttribute(){
        return 2;
    }

    public function getRoaAttribute(){
        return 3;
    }

    public function getRoeAttribute(){
        return 4;
    }

    public function getAuditedEpsAttribute(){
        return 5;
    }

    public function getPnavpsXattribute(){
        return 6;
    }

    public function getDividendYieldAttribute(){
        return 7;
    }
}


// $table->string('company_id');
// $table->string('last_trading_price')->nullable();
// $table->string('closing_price')->nullable();
// $table->string('yesterday_closing')->nullable();
// $table->string('price_change')->nullable();
// $table->string('turnover_bdt_mn')->nullable();
// $table->string('volume')->nullable();
// $table->string('trade')->nullable();
// $table->string('sponsor_or_director')->nullable();
// $table->string('government')->nullable();
// $table->string('institute')->nullable();
// $table->string('foreign')->nullable();
// $table->string('public')->nullable();
// $table->string('paid_up_capital_bdt_mn')->nullable();
// $table->string('')->nullable();
// $table->string('')->nullable();
// $table->string('three_year_revenue_cagr')->nullable();
// $table->string('beginning_npat')->nullable();
// $table->string('ending_npat')->nullable();
// $table->string('three_year_npat_cagr')->nullable();
// $table->string('npat')->nullable();
// $table->string('beginning_asset')->nullable();
// $table->string('ending_asset')->nullable();
// $table->string('roa')->nullable();
// $table->string('npat_non_controlling_interest')->nullable();
// $table->string('beginning_equity')->nullable();
// $table->string('ending_equity')->nullable();
// $table->string('roe')->nullable();
// $table->string('audited_eps')->nullable();
// // Duplicate of pe_1 & pe_5
// // $table->string('audited_p_e_x')->nullable();
// // $table->string('forward_p_e_x')->nullable();
// $table->string('navps')->nullable();
// $table->string('p_navps_x')->nullable();
// $table->string('dps')->nullable();
// $table->string('dividend_yield')->nullable();
// $table->string('close_price_from_pe')->nullable();
// $table->string('ycp')->nullable();
// $table->string('pe_1_basic')->nullable();
// $table->string('pe_2_diluted')->nullable();
// $table->string('pe_3_basic')->nullable();
// $table->string('pe_4_diluted')->nullable();
// $table->string('pe_5')->nullable();
// $table->string('pe_6')->nullable();    