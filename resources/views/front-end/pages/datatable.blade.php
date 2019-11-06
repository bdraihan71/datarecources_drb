<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header">
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                        @if($item->pdf_file_url != '#')
                            <a target="_blank" href="{{ env('S3_URL') }}{{ $item->pdf_file_url }}" type="button" class="btn btn-outline-primary">PDF</a>
                        @endif
                        @if($item->excel_file_url != '#')
                            <a target="_blank" href="{{ env('S3_URL') }}{{ $item->excel_file_url }}" type="button" class="btn btn-outline-primary">Excel</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>