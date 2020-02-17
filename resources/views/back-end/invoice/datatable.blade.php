<?php $i = 1 ; ?>
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Menu List</div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Plan Name</th>
                <th>User Name</th>
                <th>Price</th>
                <th>Expiry Date</th>
                <th>Action</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Plan Name</th>
                <th>User Name</th>
                <th>Price</th>
                <th>Expiry Date</th>
                <th>Action</th>
            </tr>
            </tfoot>
            <tbody>
                @foreach ($invoices as $invoice)
                    <tr>
                        <td>{{ $invoice->subscriptionplan->name }}</td>
                        <td>{{ $invoice->user->full_name }}</td>
                        <td>{{ $invoice->price }}</td>
                        <td>{{ $invoice->expiry_date }}</td>
                        <td>view</td>
                        {{-- @if($menu->parent)
                            <td>{{ $menu->parent->title }}</td>
                        @else
                            <td>No Parent Menu</td>
                        @endif
                        <td>
                            <a href="{{ route('menu.edit', $menu->id)}}" class="btn btn-outline-primary">Edit</a>
                            <form action="{{ route('menu.destroy', $menu->id)}}" onclick="return confirm('Are you sure, you want to delete this menu?')" method="post" style="display: inline;">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                            </form>
                        </td> --}}
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>
