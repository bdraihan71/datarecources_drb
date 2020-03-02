<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header">
    <div class="card-body">
        
        <div class="table-responsive">
              @if(count($errors) > 0 )
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <ul class="p-0 m-0" style="list-style: none;">
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" data-display-length='100'>
            <thead>
            <tr>
                <th>Sl.</th>
                <th>Particular</th>
                <th>Download</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Sl.</th>
                <th>Particular</th>
                <th>Download</th>
            </tr>
            </tfoot>
            <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($page->pageItems as $item)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$item->particular}}</td>
                    <td>
                        @if(auth()->user())
                            @if($item->pdf_file_url != '#')
                                
                                <form action="{{ route('download.store' )}}" method="post" style="display: inline;">
                                    @csrf
                                    <input name="file_path" type="hidden" value="{{ env('S3_URL') }}{{ $item->pdf_file_url }}">
                                    <button type="submit" class="btn btn-outline-primary">PDF</button>
                                </form>

                            @endif
                            @if($item->excel_file_url != '#')
                               
                                <form action="{{ route('download.store' )}}" method="post" style="display: inline;">
                                    @csrf
                                    <input name="file_path" type="hidden" value="{{ env('S3_URL') }}{{ $item->excel_file_url }}">
                                    <button type="submit" class="btn btn-outline-primary">Excel</button>
                                </form>
                            @endif
                        @else
                            <span class="font-weight-bold">Please <a href="/login" class="btn btn-warning">Login</a> to Download</span>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>

