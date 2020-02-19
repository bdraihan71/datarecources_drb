<form action="{{ route('stockinfo.process') }}" method="post">
@csrf
<button>Save</button>

<table border="1">
    <style>
        input{
            width: 50%;
        }
    </style>
    <tr>
        <td>Company Name</td>
        <td>LTP (BDT)</td>
        <td>YCP (BDT)</td>
        <td>Change</td>
        <td>Trade</td>
        <td>Turnover (BDT mn)</td>
        <td>Volume</td>
        <td>Sponsor/Director</td>
        <td>Government</td>
        <td>Institute</td>
        <td>Foreign</td>
        <td>Public</td>
        <td>Paid Up Capital (BDT mn)</td>
        <td>Beginning Revenue</td>
        <td>Ending Revenue</td>
        <td>3 Year Revenue CAGR</td>
        <td>Beginning NPAT</td>
        <td>Ending NPAT</td>
        <td>3 Year NPAT CAGR</td>
        <td>NPAT</td>
        <td>Beginning Asset</td>
        <td>Ending Asset</td>
        <td>ROA</td>
        <td>NPAT-non Controlling Interest</td>
        <td>Beginning Equity</td>
        <td>Ending Equity</td>
        <td>ROE</td>
        <td>Audited EPS</td>
        <td>Audited P/E(x)</td>
        <td>Forward P/E(x)</td>
        <td>NAVPS</td>
        <td>P/NAVPS(x)</td>
        <td>DPS</td>
        <td>Dividend Yield</td>
    </tr>
@foreach($stockInfos as $stockInfo)
    <tr>
        <td>{{ $stockInfo->company->name}}</td>
        <td>{{ $stockInfo->last_trading_price}}</td>
        <td>{{ $stockInfo->yesterday_closing}}</td>
        <td>{{ $stockInfo->price_change}}</td>
        <td>{{ $stockInfo->trade}}</td>
        <td>{{ $stockInfo->turnover_bdt_mn}}</td>
        <td>{{ $stockInfo->volume}}</td>
        <td><input name="data[{{$stockInfo->id}}][sponsor_or_director]" value="{{ $stockInfo->sponsor_or_director}}"></td>
        <td><input name="data[{{$stockInfo->id}}][government]"  value="{{ $stockInfo->government}}"></td>
        <td><input name="data[{{$stockInfo->id}}][institute]"  value="{{ $stockInfo->institute}}"></td>
        <td><input name="data[{{$stockInfo->id}}][foreign]"  value="{{ $stockInfo->foreign}}"></td>
        <td><input name="data[{{$stockInfo->id}}][public]"  value="{{ $stockInfo->public}}"></td>
        <td><input name="data[{{$stockInfo->id}}][paid_up_capital_bdt_mn]"  value="{{ $stockInfo->paid_up_capital_bdt_mn}}"></td>
        <td><input name="data[{{$stockInfo->id}}][beginning_revenue]"  value="{{ $stockInfo->beginning_revenue}}"></td>
        <td><input name="data[{{$stockInfo->id}}][ending_revenue]"  value="{{ $stockInfo->ending_revenue}}"></td>
        <td>{{ $stockInfo->three_year_revenue_cagr}}</td>
        <td><input name="data[{{$stockInfo->id}}][beginning_npat]"  value="{{ $stockInfo->beginning_npat}}"></td>
        <td><input name="data[{{$stockInfo->id}}][ending_npat]"  value="{{ $stockInfo->ending_npat}}"></td>
        <td>{{ $stockInfo->three_year_npat_cagr}}</td>
        <td><input name="data[{{$stockInfo->id}}][npat]"  value="{{ $stockInfo->npat}}"></td>
        <td><input name="data[{{$stockInfo->id}}][beginning_asset]"  value="{{ $stockInfo->beginning_asset}}"></td>
        <td><input name="data[{{$stockInfo->id}}][ending_asset]"  value="{{ $stockInfo->ending_asset}}"></td>
        <td>{{ $stockInfo->roa}}</td>
        <td><input name="data[{{$stockInfo->id}}][npat_non_controlling_interest]"  value="{{ $stockInfo->npat_non_controlling_interest}}"></td>
        <td><input name="data[{{$stockInfo->id}}][beginning_equity]"  value="{{ $stockInfo->beginning_equity}}"></td>
        <td><input name="data[{{$stockInfo->id}}][ending_equity]"  value="{{ $stockInfo->ending_equity}}"></td>
        <td>{{ $stockInfo->roe}}</td>
        <td>{{ $stockInfo->audited_eps}}</td>
        <td>{{ $stockInfo->pe_5}}</td>
        <td>{{ $stockInfo->pe_1_basic}}</td>
        <td><input name="data[{{$stockInfo->id}}][navps]"  value="{{ $stockInfo->navps}}"></td>
        <td>{{ $stockInfo->p_navps_x}}</td>
        <td><input name="data[{{$stockInfo->id}}][dps]"  value="{{ $stockInfo->dps}}"></td>
        <td>{{ $stockInfo->dividend_yield}}</td>

    </tr>
@endforeach
</form>