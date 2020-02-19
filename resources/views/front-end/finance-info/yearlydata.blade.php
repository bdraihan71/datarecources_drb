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
            @foreach ($finance_infos as $item)
                <tr>
                    <td>{{$item->company->name}}</td>
                    <td>{{$item->company->ticker}}</td>
                    <td>{{$item->year}}</td>
                    @if(auth()->user())
                        @if($user->subscribers->last()->is_expire != null)
                           <td><a href="#" class="btn btn-warning">Please Subscribe</a></td>
                        @else
                            @if($item->annual_excel_url != '#')
                            <td><a target="_blank" href="{{ env('S3_URL') }}{{ $item->annual_excel_url }}" type="button" class="btn btn-outline-primary">{{ $item->annual_excel_url_file_name != null ? $item->annual_excel_url_file_name : 'Excel' }}</a></td>
                            @else
                                <td>No Excel</td>
                            @endif
                        @endif    
                    @else
                        <td><a href="/login" class="btn btn-warning">Login</a></td>   
                    @endif

                    @if(auth()->user())
                        @if($user->subscribers->last()->is_expire != null)
                           <td><a href="#" class="btn btn-warning">Please Subscribe</a></td>
                        @else    
                            @if($item->annual_pdf_1_url != '#')
                                <td><a target="_blank" href="{{ env('S3_URL') }}{{ $item->annual_pdf_1_url }}" type="button" class="btn btn-outline-primary">{{ $item->annual_pdf_1_url_file_name != null ? $item->annual_pdf_1_url_file_name : 'PDF' }}</a></td>
                            @else
                                <td>No PDF</td>
                            @endif
                        @endif    
                    @else
                        <td><a href="/login" class="btn btn-warning">Login</a></td>
                    @endif  

                    @if(auth()->user())
                        @if($user->subscribers->last()->is_expire != null)
                           <td><a href="#" class="btn btn-warning">Please Subscribe</a></td>
                        @else    
                            @if($item->annual_pdf_2_url != '#')
                                <td><a target="_blank" href="{{ env('S3_URL') }}{{ $item->annual_pdf_2_url }}" type="button" class="btn btn-outline-primary">{{ $item->annual_pdf_2_url_file_name != null ? $item->annual_pdf_2_url_file_name : 'PDF' }}</a></td>
                            @else
                                <td>No PDF</td>
                            @endif
                        @endif    
                    @else
                        <td><a href="/login" class="btn btn-warning">Login</a></td>
                    @endif

                    @if(auth()->user()) 
                        @if($user->subscribers->last()->is_expire != null)
                           <td><a href="#" class="btn btn-warning">Please Subscribe</a></td>
                        @else
                            @if($item->annual_pdf_3_url != '#')
                                <td><a target="_blank" href="{{ env('S3_URL') }}{{ $item->annual_pdf_3_url }}" type="button" class="btn btn-outline-primary">{{ $item->annual_pdf_3_url_file_name != null ? $item->annual_pdf_3_url_file_name : 'PDF' }}</a></td>
                            @else
                                <td>No PDF</td>
                            @endif
                        @endif    
                    @else
                        <td><a href="/login" class="btn btn-warning">Login</a></td>
                    @endif 

                    @if(auth()->user()) 
                        @if($user->subscribers->last()->is_expire != null)
                           <td><a href="#" class="btn btn-warning">Please Subscribe</a></td>
                        @else
                            @if($item->annual_pdf_4_url != '#')
                                <td><a target="_blank" href="{{ env('S3_URL') }}{{ $item->annual_pdf_4_url }}" type="button" class="btn btn-outline-primary">{{ $item->annual_pdf_4_url_file_name != null ? $item->annual_pdf_4_url_file_name : 'PDF' }}</a></td>
                            @else
                                <td>No PDF</td>
                            @endif
                        @endif    
                    @else
                        <td><a href="/login" class="btn btn-warning">Login</a></td>
                    @endif 

                    @if(auth()->user())
                        @if($user->subscribers->last()->is_expire != null)
                           <td><a href="#" class="btn btn-warning">Please Subscribe</a></td>
                        @else
                            @if($item->annual_pdf_5_url != '#')
                                <td><a target="_blank" href="{{ env('S3_URL') }}{{ $item->annual_pdf_5_url }}" type="button" class="btn btn-outline-primary">{{ $item->annual_pdf_5_url_file_name != null ? $item->annual_pdf_5_url_file_name : 'PDF' }}</a></td>
                            @else
                                <td>No PDF</td>
                            @endif
                        @endif    
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