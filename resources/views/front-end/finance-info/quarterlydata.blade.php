<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header">
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Company</th>
                <th>Ticker</th>
                <th>Year</th>
                @isset($q1)
                    <th>Q1 PDF</th>
                    <th>Q1 Excel</th>
                @endisset
                @isset($q2)
                    <th>Q2 PDF</th>
                    <th>Q2 Excel</th>
                @endisset
                @isset($q3)
                    <th>Q3 PDF</th>
                    <th>Q3 Excel</th>
                @endisset
                @isset($q4)
                    <th>Q4 PDF</th>
                    <th>Q4 Excel</th>
                @endisset

            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Company</th>
                <th>Ticker</th>
                <th>Year</th>
                @isset($q1)
                    <th>Q1 PDF</th>
                    <th>Q1 Excel</th>
                @endisset
                @isset($q2)
                    <th>Q2 PDF</th>
                    <th>Q2 Excel</th>
                @endisset
                @isset($q3)
                    <th>Q3 PDF</th>
                    <th>Q3 Excel</th>
                @endisset
                @isset($q4)
                    <th>Q4 PDF</th>
                    <th>Q4 Excel</th>
                @endisset
            </tr>
            </tfoot>
            <tbody>
            @php
                $i = 1;
            @endphp
            @if(auth()->user())
            @foreach ($finance_infos as $item)
                <tr>
                    <td>{{$item->company->name}}</td>
                    <td>{{$item->company->ticker}}</td>
                    <td>{{$item->year}}</td>
                    @isset($q1)
                        @if($item->q1__pdf_url != '#')
                            <td><a target="_blank" href="{{ env('S3_URL') }}{{ $item->q1__pdf_url }}" type="button" class="btn btn-outline-primary">PDF</a></td>
                        @else
                            <td>No PDF</td>
                        @endif
                        @if($item->q1_excel_url != '#')
                            <td><a target="_blank" href="{{ env('S3_URL') }}{{ $item->q1_excel_url }}" type="button" class="btn btn-outline-primary">Excel</a></td>
                        @else
                            <td>No Excel</td>
                        @endif
                    @endisset

                    @isset($q2)
                        @if($item->q2__pdf_url != '#')
                            <td><a target="_blank" href="{{ env('S3_URL') }}{{ $item->q2__pdf_url }}" type="button" class="btn btn-outline-primary">PDF</a></td>
                        @else
                            <td>No PDF</td>
                        @endif
                        @if($item->q2_excel_url != '#')
                            <td><a target="_blank" href="{{ env('S3_URL') }}{{ $item->q2_excel_url }}" type="button" class="btn btn-outline-primary">Excel</a></td>
                        @else
                            <td>No Excel</td>
                        @endif
                    @endisset

                    
                    @isset($q3)
                        @if($item->q3__pdf_url != '#')
                            <td><a target="_blank" href="{{ env('S3_URL') }}{{ $item->q3__pdf_url }}" type="button" class="btn btn-outline-primary">PDF</a></td>
                        @else
                            <td>No PDF</td>
                        @endif
                        @if($item->q3_excel_url != '#')
                            <td><a target="_blank" href="{{ env('S3_URL') }}{{ $item->q3_excel_url }}" type="button" class="btn btn-outline-primary">Excel</a></td>
                        @else
                            <td>No Excel</td>
                        @endif
                    @endisset


                    @isset($q4)
                        @if($item->q4__pdf_url != '#')
                            <td><a target="_blank" href="{{ env('S3_URL') }}{{ $item->q4__pdf_url }}" type="button" class="btn btn-outline-primary">PDF</a></td>
                        @else
                            <td>No PDF</td>
                        @endif
                        @if($item->q4_excel_url != '#')
                            <td><a target="_blank" href="{{ env('S3_URL') }}{{ $item->q4_excel_url }}" type="button" class="btn btn-outline-primary">Excel</a></td>
                        @else
                            <td>No Excel</td>
                        @endif
                    @endisset    
                </tr>
            @endforeach
            @else
            <h2><a href="/login">Please login to view & download data</a></h2>
            @endif
            </tbody>
        </table>
        </div>
    </div>
</div>