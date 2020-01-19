<?php $i = 1 ; ?>
<div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-table"></i>
            Stock Info List
            <a class="btn btn-danger" target="_blank" href="http://127.0.0.1:8001/api/fetch/dse?url=http://dsebd.org/latest_share_price_all_by_change.php" >Sync from: http://dsebd.org/latest_share_price_all_by_change.php</a>    
        </div>
        <div class="card-body">
            <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>sl</th>
                        <th>company_id</th>
                        <th>last_trading_price</th>
                        <th>yesterday_closing</th>
                        <th>turnover_bdt_mn</th>
                        <th>volume</th>
                        <th>trade</th>
                        <th>price_change</th>
                        <th>sponsor_or_director</th>
                        <th>paid_up_capital_bdt_mn</th>
                        <th>five_year_revenue_cagr</th>
                        <th>p_or_e_audited</th>
                        <th>p_or_e_unaudied</th>
                        <th>navps</th>
                        <th>p_or_navps_divinded</th>
                        <th>dividend_yield</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>sl</th>
                        <th>company_id</th>
                        <th>last_trading_price</th>
                        <th>yesterday_closing</th>
                        <th>turnover_bdt_mn</th>
                        <th>volume</th>
                        <th>trade</th>
                        <th>price_change</th>
                        <th>sponsor_or_director</th>
                        <th>paid_up_capital_bdt_mn</th>
                        <th>five_year_revenue_cagr</th>
                        <th>p_or_e_audited</th>
                        <th>p_or_e_unaudied</th>
                        <th>navps</th>
                        <th>p_or_navps_divinded</th>
                        <th>dividend_yield</th>
                    </tr>
                </tfoot>
                <tbody>
                @foreach ($stockinfos as $item)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{ $item->company_id }}</td>
                        <td>{{ $item->last_trading_price }}</td>
                        <td>{{ $item->yesterday_closing }}</td>
                        <td>{{ $item->turnover_bdt_mn }} </td>
                        <td>{{ $item->volume }}</td>
                        <td>{{ $item->trade }}</td>
                        <td>{{ $item->price_change }}</td>
                        <td>{{ $item->sponsor_or_director }}</td>
                        <td>{{ $item->paid_up_capital_bdt_mn }}</td>
                        <td>{{ $item->five_year_revenue_cagr }}</td>
                        <td>{{ $item->p_or_e_audited }}</td>
                        <td>{{ $item->p_or_e_unaudied }}</td>
                        <td>{{ $item->navps }}</td>
                        <td>{{ $item->p_or_navps_divinded }}</td>
                        <td>{{ $item->dividend_yield }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
