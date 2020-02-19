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

    public function getRoaAttribute(){
        if(($this->beginning_asset+$this->ending_asset)!=0){
            return ($this->npat / (($this->beginning_asset+$this->ending_asset)/2));
        }
        return '';
    }

    public function getRoeAttribute(){
        if(($this->beginning_equity+$this->ending_equity)!=0){
            return ($this->npat_non_controlling_interest / (($this->beginning_equity+$this->ending_equity)/2));
        }
        return '';
    }

    public function getAuditedEpsAttribute(){
        if((((float)$this->pe_1_basic))!=0){
            return (((float)$this->last_trading_price )/ ((float)$this->pe_1_basic));
        }
        return '';
    }

    public function getPnavpsXattribute(){
        if((((float)$this->navps))!=0){
            return (((float)$this->last_trading_price )/ ((float)$this->navps));
        }
        return '';
    }

    public function getDividendYieldAttribute(){
        if((((float)$this->last_trading_price))!=0){
            return (((float)$this->dps )/ ((float)$this->last_trading_price));
        }
        return '';
    }
}


