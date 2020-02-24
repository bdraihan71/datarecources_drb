@if($item->annual_excel_url != '#')
{{-- <td><a target="_blank" href="{{ env('S3_URL') }}{{ $item->annual_excel_url }}" type="button" class="btn btn-outline-primary">{{ $item->annual_excel_url_file_name != null ? $item->annual_excel_url_file_name : 'Excel' }}</a></td> --}}
<td>
    <form action="{{ route('download.store' )}}" method="post" style="display: inline;">
        @csrf
        <input name="file_path" type="hidden" value="{{ env('S3_URL') }}{{ $item->annual_excel_url }}">
        <button type="submit" class="btn btn-outline-primary">{{ $item->annual_excel_url_file_name != null ? $item->annual_excel_url_file_name : 'Excel' }}</button>
    </form>
</td>
@else
    <td>No Excel</td>
@endif