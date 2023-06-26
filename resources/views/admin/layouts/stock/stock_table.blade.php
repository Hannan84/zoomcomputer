@extends('admin.master')
@section('contents')
<!-- Added, Edit, Delete Message -->
@if(session()->has('error'))
<p class="alert alert-danger">{{ session()->get('error') }}</p>
@endif
@if(session()->has('message'))
<p class="alert alert-success">{{ session()->get('message') }}</p>
@endif
<!-- end -->
<div class="table_button">
    <a href="{{ route('admin.add.stock') }}" class="btn btn-primary">Add Stock</a>
</div>
<div class="manage_table">
    <table class="table table-borderless table-hover" id="myStockTable">
        <thead class="table-primary">
            <tr class="text-center">
                <th scope="col">SL</th>
                <th scope="col">product_id</th>
                <th scope="col">Total Produce</th>
                <th scope="col">Available Stock</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stock as $key=>$product)
            <tr class="text-center">
                <td>{{ $key+1 }}</td>
                <td>{{ $product->product_id }}</td>
                <td>{{ $product->total_produce }}</td>
                <td>1</td>
                <td>
                    <a href="{{ route('admin.edit.stock',$product->id) }}" class="btn btn-primary"><i class="fa fa-th-list"></i></a>
                    <a href="{{ route('admin.delete.stock',$product->id) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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
        $('#myStockTable').DataTable();
    });
</script>