<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header">
        <div class="card-body">
            <h4>{{$sector->name}}<i class="fas fa-arrow-right float-right"></i></h4>
            <div class="table-responsive">
                <table class="table table-bordered hundred" id="myTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Sl.</th>
                        <th>Company Name</th>
                        <th>LTP (BDT)</th>
                        <th>YCP (BDT)</th>
                        <th>Change</th>
                        <th>Trade</th>
                        <th>Turnover (BDT mn)</th>
                        <th>Volume</th>
                        <th>Sponsor/Director</th>
                        <th>Government</th>
                        <th>Institute</th>
                        <th>Foreign</th>
                        <th>Public</th>
                        <th>Paid Up Capital (BDT mn)</th>
                        <th>3 Year Revenue CAGR</th>
                        <th>3 Year NPAT CAGR</th>
                        <th>ROA</th>
                        <th>ROE</th>
                        <th>Audited EPS</th>
                        <th>Audited P/E(x)</th>
                        <th>Forward P/E(x)</th>
                        <th>NAVPS</th>
                        <th>P/NAVPS(x)</th>
                        <th>DPS</th>
                        <th>Dividend Yield</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Sl.</th>
                        <th>Company Name</th>
                        <th>LTP (BDT)</th>
                        <th>YCP (BDT)</th>
                        <th>Change</th>
                        <th>Trade</th>
                        <th>Turnover (BDT mn)</th>
                        <th>Volume</th>
                        <th>Sponsor/Director</th>
                        <th>Government</th>
                        <th>Institute</th>
                        <th>Foreign</th>
                        <th>Public</th>
                        <th>Paid Up Capital (BDT mn)</th>
                        <th>3 Year Revenue CAGR</th>
                        <th>3 Year NPAT CAGR</th>
                        <th>ROA</th>
                        <th>ROE</th>
                        <th>Audited EPS</th>
                        <th>Audited P/E(x)</th>
                        <th>Forward P/E(x)</th>
                        <th>NAVPS</th>
                        <th>P/NAVPS(x)</th>
                        <th>DPS</th>
                        <th>Dividend Yield</th>
                    </tr>
                    </tfoot>
                    <tbody>

                    @php
                        $i = 0;
                    @endphp
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
                            <td>{{sprintf("%01.2f", $item->last_trading_price)}}</td>
                            <td>{{sprintf("%01.2f", $item->yesterday_closing)}}</td>
                            <td>{{sprintf("%01.2f", $item->price_change)}}</td>
                            <td>{{sprintf("%01.2f", $item->trade)}}</td>
                            <td>{{sprintf("%01.2f", $item->turnover_bdt_mn)}}</td>
                            <td>{{sprintf("%01.2f", $item->volume)}}</td>
                            <td>{{sprintf("%01.2f", $item->sponsor_or_director)}}</td>
                            <td>{{sprintf("%01.2f", $item->government)}}</td>
                            <td>{{sprintf("%01.2f", $item->institute)}}</td>
                            <td>{{sprintf("%01.2f", $item->foreign)}}</td>
                            <td>{{sprintf("%01.2f", $item->public)}}</td>
                            <td>{{sprintf("%01.2f", $item->paid_up_capital_bdt_mn)}}</td>
                            <td>{{sprintf("%01.2f", $item->three_year_revenue_cagr)}}</td>
                            <td>{{sprintf("%01.2f", $item->three_year_npat_cagr)}}</td>
                            <td>{{sprintf("%01.2f", $item->roa)}}</td>
                            <td>{{sprintf("%01.2f", $item->roe)}}</td>
                            <td>{{sprintf("%01.2f", $item->audited_eps)}}</td>
                            <td>{{sprintf("%01.2f", $item->pe_1_basic)}}</td>
                            <td>{{sprintf("%01.2f", $item->pe_5)}}</td>
                            <td>{{sprintf("%01.2f", $item->navps)}}</td>
                            <td>{{sprintf("%01.2f", $item->p_navps_x)}}</td>
                            <td>{{sprintf("%01.2f", $item->dps)}}</td>
                            <td>{{sprintf("%01.2f", $item->dividend_yield)}}</td>
                        </tr>
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

