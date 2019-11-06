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
                        <button type="button" class="btn btn-outline-primary">PDF</button>
                        <button type="button" class="btn btn-outline-primary">Excel</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>