<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header">
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered hundred" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Company</th>
                <th>Ticker</th>
                <th>Year</th>
                <th>Q1 PDF</th>
                <th>Q1 Excel</th>
                <th>Q2 PDF</th>
                <th>Q2 Excel</th>
                <th>Q3 PDF</th>
                <th>Q3 Excel</th>
                <th>Q4 PDF</th>
                <th>Q4 Excel</th>
                <th>Annual Excel</th>
                <th>Annual PDF 1</th>
                <th>Annual PDF 2</th>
                <th>Annual PDF 3</th>
                <th>Annual PDF 4</th>
                <th>Annual PDF 5</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Company</th>
                <th>Ticker</th>
                <th>Year</th>
                <th>Q1 PDF</th>
                <th>Q1 Excel</th>
                <th>Q2 PDF</th>
                <th>Q2 Excel</th>
                <th>Q3 PDF</th>
                <th>Q3 Excel</th>
                <th>Q4 PDF</th>
                <th>Q4 Excel</th>
                <th>Annual Excel</th>
                <th>Annual PDF 1</th>
                <th>Annual PDF 2</th>
                <th>Annual PDF 3</th>
                <th>Annual PDF 4</th>
                <th>Annual PDF 5</th>
            </tr>
            </tfoot>
            <tbody>
            @php
                $i = 1;
            @endphp
            {{-- {{dd($user->subscriptionplans)}} --}}
            @foreach ($finance_infos as $item)
                <tr>
                    @if($item->company!=null)
                    <td>{{$item->company->name}}</td>
                    <td>{{$item->company->ticker}}</td>
                    @else
                    <td>No Company Available</td>
                    <td>No Company Available</td>
                    @endif
                    <td>{{$item->year}}</td>
                    @if(auth()->user())
                       @include('front-end.partial.q1__pdf_url', compact('item'))
                    @else
                        <td><a href="/login" class="btn btn-warning">Login</a></td>   
                    @endif 

                    @if(auth()->user())
                       @include('front-end.partial.q1_excel_url', compact('item'))
                    @else
                        <td><a href="/login" class="btn btn-warning">Login</a></td>   
                    @endif 

                    @if(auth()->user())
                        @include('front-end.partial.q2__pdf_url', compact('item'))
                    @else
                        <td><a href="/login" class="btn btn-warning">Login</a></td>   
                    @endif 

                    @if(auth()->user())
                        @if($item->q2_excel_url != '#')
                            <td><a target="_blank" href="{{ env('S3_URL') }}{{ $item->q2_excel_url }}" type="button" class="btn btn-outline-primary">{{ $item->q2_excel_url_file_name != null ? $item->q2_excel_url_file_name : 'Excel' }}</a></td>
                        @else
                            <td>No Excel</td>
                        @endif
                    @else
                        <td><a href="/login" class="btn btn-warning">Login</a></td>   
                    @endif 

                    @if(auth()->user())
                        @if($item->q3__pdf_url != '#')
                            <td><a target="_blank" href="{{ env('S3_URL') }}{{ $item->q3__pdf_url }}" type="button" class="btn btn-outline-primary">{{ $item->q3__pdf_url_file_name != null ? $item->q3__pdf_url_file_name : 'PDF' }}</a></td>
                        @else
                            <td>No PDF</td>
                        @endif
                    @else
                        <td><a href="/login" class="btn btn-warning">Login</a></td>   
                    @endif 

                    @if(auth()->user())
                        @if($item->q3_excel_url != '#')
                            <td><a target="_blank" href="{{ env('S3_URL') }}{{ $item->q3_excel_url }}" type="button" class="btn btn-outline-primary">{{ $item->q3_excel_url_file_name != null ? $item->q3_excel_url_file_name : 'Excel' }}</a></td>
                        @else
                            <td>No Excel</td>
                        @endif
                    @else
                        <td><a href="/login" class="btn btn-warning">Login</a></td>   
                    @endif 

                    @if(auth()->user())
                        @if($item->q4__pdf_url != '#')
                            <td><a target="_blank" href="{{ env('S3_URL') }}{{ $item->q4__pdf_url }}" type="button" class="btn btn-outline-primary">{{ $item->q4__pdf_url_file_name != null ? $item->q4__pdf_url_file_name : 'PDF' }}</a></td>
                        @else
                            <td>No PDF</td>
                        @endif
                    @else
                        <td><a href="/login" class="btn btn-warning">Login</a></td>   
                    @endif 

                    @if(auth()->user())
                        @if($item->q4_excel_url != '#')
                            <td><a target="_blank" href="{{ env('S3_URL') }}{{ $item->q4_excel_url }}" type="button" class="btn btn-outline-primary">{{ $item->q4_excel_url_file_name != null ? $item->q4_excel_url_file_name : 'Excel' }}</a></td>
                        @else
                            <td>No Excel</td>
                        @endif
                    @else
                        <td><a href="/login" class="btn btn-warning">Login</a></td>   
                    @endif 
                    
                
                    @if(auth()->user())
                        @include('front-end.partial.annual_excel_url', compact('item'))
                    @else
                        <td><a href="/login" class="btn btn-warning">Login</a></td>   
                    @endif  

                    @if(auth()->user())
                        @include('front-end.partial.annual_pdf_1_url', compact('item'))
                    @else
                        <td><a href="/login" class="btn btn-warning">Login</a></td>   
                    @endif 

                    @if(auth()->user())
                        @include('front-end.partial.annual_pdf_2_url', compact('item'))
                    @else
                        <td><a href="/login" class="btn btn-warning">Login</a></td>   
                    @endif 

                    @if(auth()->user())
                        @include('front-end.partial.annual_pdf_3_url', compact('item'))
                    @else
                        <td><a href="/login" class="btn btn-warning">Login</a></td>   
                    @endif 

                    @if(auth()->user())
                         @include('front-end.partial.annual_pdf_4_url', compact('item'))
                    @else
                        <td><a href="/login" class="btn btn-warning">Login</a></td>   
                    @endif 

                    @if(auth()->user())
                       @include('front-end.partial.annual_pdf_5_url', compact('item'))     
                    @else
                        <td><a href="/login" class="btn btn-warning">Login</a></td>   
                    @endif 
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>