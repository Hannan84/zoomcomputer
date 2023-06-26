@extends('admin.master')
@section('contents')

<div class="table_button text-center">
    <h1>Customer List</h1>
</div>
<!-- Message -->
@if(session()->has('error'))
<p class="alert alert-danger">{{ session()->get('error') }}</p>
@endif
@if(session()->has('message'))
<p class="alert alert-success">{{ session()->get('message') }}</p>
@endif
<!-- end -->
<div class="manage_table">
    <table class="table table-borderless table-hover" id="customer_table">
        <thead class="table-primary">
            <tr class="text-center">
                <th>Name</th>
                <th>email</th>
                <th>phone</th>
                <th>Address</th>
                <th class="bg-warning"><span class="text-success">Inable</span> / <span class="text-danger">Disable</span></th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr class="text-center">
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->address }}</td>
                <td>
                    @if($user->status != 'disabled')
                    <a href="{{ route('admin.ban.customer',$user->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                    @else
                    <a href="{{ route('admin.un.ban.customer',$user->id) }}" class="btn btn-success"><i class="fa fa-check"></i></a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

<!-- jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $('#customer_table').DataTable();
    });
</script>