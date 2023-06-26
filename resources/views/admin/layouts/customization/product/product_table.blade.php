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
    <a href="{{ route('admin.add.customize.product') }}" class="btn btn-primary">Add Product</a>
</div>
<div class="manage_table">
    <table class="table table-borderless table-hover">
        <thead class="table-primary">
            <tr class="text-center">
                <th>SL</th>
                <th>Model</th>
                <th>Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Description</th>

                <th>Clock speed</th>
                <th>cache</th>
                <th>cores</th>
                <th>socket</th>

                <th>base frequency</th>
                <th>threads</th>
                <th>default tdp</th>

                <th>maximum size</th>
                <th>maximum speed</th>
                <th>type</th>
                <th>maximum_number_channels</th>

                <th>processor graphics</th>
                <th>maximum_dynamic_frequency</th>
                <th>warranty</th>

                <th>Category_id</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $key=>$product)
            <tr class="text-center">
                <td>{{ $key+1 }}</td>
                <td>{{ $product->model }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }}</td>
                <td> <img src="{{ asset('/uploads/customization/products/'.$product->image ) }}" style="width:80px;height:80px;" alt=""> </td>
                <td>{{ $product->description }}</td>

                <!-- specification -->
                <td>{{ $product->clock_speed }}</td>
                <td>{{ $product->cache }}</td>
                <td>{{ $product->cores }}</td>
                <td>{{ $product->socket }}</td>

                <td>{{ $product->base_frequency }}</td>
                <td>{{ $product->threads }}</td>
                <td>{{ $product->default_TDP }}</td>

                <td>{{ $product->maximum_size }}</td>
                <td>{{ $product->maximum_speed }}</td>
                <td>{{ $product->type }}</td>
                <td>{{ $product->maximum_number_channels }}</td>

                <td>{{ $product->processor_graphics }}</td>
                <td>{{ $product->maximum_dynamic_frequency }}</td>

                <td>{{ $product->warranty }}</td>
                
                <td>{{ $product->customization_category_id }}</td>

                <td>
                    <a href="{{ route('admin.view.customize.product',$product->id) }}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                    <a href="{{ route('admin.edit.customize.product',$product->id) }}" class="btn btn-primary mt-1"><i class="fa fa-th-list"></i></a>
                    <a href="{{ route('admin.delete.customize.product',$product->id) }}" class="btn btn-danger mt-1"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection