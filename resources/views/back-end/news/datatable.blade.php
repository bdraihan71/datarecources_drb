<?php $i = 1 ; ?>
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        News List
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Sl.</th>
                    <th>Heading</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Source</th>
                    <th>Publish</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Sl.</th>
                    <th>Heading</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Source</th>
                    <th>Publish</th>
                    <th>Action</th>
                </tr>
                </tfoot>
                <tbody>
                    @foreach($allnews as $news)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$news->heading}}</td>
                            <td><a href="{{ env('S3_URL') }}{{$news->image}}" target="_blank">Link</a></td>
                            <td class="more">{{$news->body}}</td>
                            <td><a href="{{$news->source}}" target="_blank">Link</a></td>
                            <td>
                                @if ( $news->is_published == 0)
                                    No
                                @else
                                    Yes
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('news.edit', $news->id)}}" class="btn btn-outline-primary">Edit</a>
                                <form action="{{ route('news.destroy', $news->id)}}" onclick="return confirm('Are you sure, you want to delete this news?')" method="post" style="display: inline;">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>
