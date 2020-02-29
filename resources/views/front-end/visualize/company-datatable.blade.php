<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header">
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered data-matrix" id="dataTable" width="100%" cellspacing="0" data-display-length='100'>
            <thead>
                <tr>
                    <th rowspan="2">Sl.</th>
                    <th rowspan="2">Company</th>
                    <th rowspan="2">Sector</th>
                    <th rowspan="2">LTP<br>(BDT)</th>
                    <th rowspan="2">YCP<br>(BDT)</th>
                    <th rowspan="2">Change<br>(%)</th>
                    <th rowspan="2">Turnover<br>(BDT mn)</th>
                    <th rowspan="2">Volume</th>
                    <th rowspan="2">Audited<br>EPS(BDT)</th>
                    <th rowspan="2">Audited<br>P/E(x)</th>
                    <th rowspan="2">Forward<br>P/E(x)</th>
                    <th rowspan="2">NAVPS</th>
                    <th rowspan="2">P/NAVPS<br>(x)</th>
                    <th rowspan="2">DPS</th>
                    <th rowspan="2">Dividend<br>Yield(%)</th>
                    <th rowspan="2">ROAE<br>(%)</th>
                    <th rowspan="2">ROAA<br>(%)</th>
                    <th rowspan="2">3 Year NPAT<br>CAGR(%)</th>
                    <th rowspan="2">3 Year Revenue<br>CAGR(%)</th>
                    <th rowspan="2">Paid Up Capital<br>(BDT mn)</th>
                    <th rowspan="1" colspan="4">Ownership</th>
                </tr>
                <tr>
                    <th>Sponsor/Director<br>(%)</th>
                    <th>Foreign<br>(%)</th>
                    <th>Institute<br>(%)</th>
                    <th>Public<br>(%)</th>        
                </tr>
                </thead>
                <tfoot>
                    
                    
                <tr>
                    <th rowspan="2">Sl.</th>
                    <th rowspan="2">Company</th>
                    <th rowspan="2">Sector</th>
                    <th rowspan="2">LTP<br>(BDT)</th>
                    <th rowspan="2">YCP<br>(BDT)</th>
                    <th rowspan="2">Change<br>(%)</th>
                    <th rowspan="2">Turnover<br>(BDT mn)</th>
                    <th rowspan="2">Volume</th>
                    <th rowspan="2">Audited<br>EPS(BDT)</th>
                    <th rowspan="2">Audited<br>P/E(x)</th>
                    <th rowspan="2">Forward<br>P/E(x)</th>
                    <th rowspan="2">NAVPS</th>
                    <th rowspan="2">P/NAVPS<br>(x)</th>
                    <th rowspan="2">DPS</th>
                    <th rowspan="2">Dividend<br>Yield(%)</th>
                    <th rowspan="2">ROAE<br>(%)</th>
                    <th rowspan="2">ROAA<br>(%)</th>
                    <th rowspan="2">3 Year NPAT<br>CAGR(%)</th>
                    <th rowspan="2">3 Year Revenue<br>CAGR(%)</th>
                    <th rowspan="2">Paid Up Capital<br>(BDT mn)</th>
                    <th>Sponsor/Director<br>(%)</th>
                    <th>Foreign<br>(%)</th>
                    <th>Institute<br>(%)</th>
                    <th>Public<br>(%)</th>        
                </tr>
                <tr>
                    <th rowspan="1" colspan="4">Ownership</th>
                </tr>
                </tfoot>
            <tbody>
                @php
                    $i = 0;
                @endphp
                @foreach($sectors as $sector)

                    @foreach ($sector->company as $company)
                        @php
                            if($company->stockInfo != null){
                                $item = $company->stockInfo;
                            }else{
                                $item = null;
                            }
                        @endphp
                    @if($item)
                    <tr>
                        <td>{{++$i}}</td>
                        <td>{{$item->company->name}}</td>
                        <td>{{$sector->name}}</td>
                        <td class="text-right">{{sprintf("%01.2f", $item->last_trading_price)}}</td>
                        <td class="text-right">{{sprintf("%01.2f", $item->yesterday_closing)}}</td>
                        <td class="text-right">{{sprintf("%01.2f", $item->price_change)}}</td>
                        <td class="text-right">{{sprintf("%01.2f", $item->turnover_bdt_mn)}}</td>
                        <td class="text-right">{{sprintf("%01.2f", $item->volume)}}</td>
                        <td class="text-right">{{sprintf("%01.2f", $item->audited_eps)}}</td>
                        <td class="text-right">{{sprintf("%01.2f", $item->pe_1_basic)}}</td>
                        <td class="text-right">{{sprintf("%01.2f", $item->pe_5)}}</td>
                        <td class="text-right">{{sprintf("%01.2f", $item->navps)}}</td>
                        <td class="text-right">{{sprintf("%01.2f", $item->p_navps_x)}}</td>
                        <td class="text-right">{{sprintf("%01.2f", $item->dps)}}</td>
                        <td class="text-right">{{sprintf("%01.2f", $item->dividend_yield)}}</td>
                        <td class="text-right">{{sprintf("%01.2f", $item->roe)}}</td>
                        <td class="text-right">{{sprintf("%01.2f", $item->roa)}}</td>
                        <td class="text-right">{{sprintf("%01.2f", $item->three_year_npat_cagr)}}</td>
                        <td class="text-right">{{sprintf("%01.2f", $item->three_year_revenue_cagr)}}</td>
                        <td class="text-right">{{sprintf("%01.2f", $item->paid_up_capital_bdt_mn)}}</td>
                        <td class="text-right">{{sprintf("%01.2f", $item->sponsor_or_director)}}</td>
                        <td class="text-right">{{sprintf("%01.2f", $item->foreign)}}</td>
                        <td class="text-right">{{sprintf("%01.2f", $item->institute)}}</td>
                        <td class="text-right">{{sprintf("%01.2f", $item->public)}}</td>
                       
                    </tr>
                    @endif
                @endforeach
            @endforeach
            
            </tbody>
        </table>
        
        </div>
    </div>

    <p class="legend"> 
        N/A= Not applicable<br>
        LTP= Last Traded Price<br>
        YCP= Yesterday Closing Price<br>
        EPS= Earnings Per Share<br>
        NAVPS= Net Asset Value Per Share<br>
        DPS= Dividend Per Share<br>
        ROAE= Return on Average Equity <br>
        ROAA= Return on Average Asset<br>
        CAGR= Compound Annual Growth Rate<br>
    </p>
</div>
@section('scripts')

@endsection