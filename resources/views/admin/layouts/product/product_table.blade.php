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
    <a href="{{ route('admin.add.product') }}" class="btn btn-primary">Add Product</a>
</div>
<div class="manage_table">
    <table class="table table-borderless table-hover">
        <thead class="table-primary">
            <tr class="text-center">
                <th>SL</th>
                <th>Model</th>
                <th>Name</th>
                <th>Regular Price</th>
                <th>Image</th>
                <th>Offer</th>
                <th>Product Description</th>
                <!-- specification -->
                <th>processor</th>
                <th>display</th>
                <th>memory</th>
                <th>storage</th>
                <th>graphics</th>
                <th>operating_system</th>
                <th>battery</th>
                <th>adapter</th>
                <th>audio</th>
                <th>keyboard</th>
                <th>optical_drive</th>
                <th>webcam</th>
                <th>wifi</th>
                <th>bluetooth</th>
                <th>USB</th>
                <th>HDMI</th>
                <th>VGA</th>
                <th>audio_jack_combo</th>
                <th>dimensions</th>
                <th>weight</th>
                <th>colors</th>
                <th>manufacturing_warranty</th>

                <th>Category_id</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $key=>$product)
            <tr class="text-center">
                <td>{{ $key+1 }}</td>
                <td>{{ $product->model }}</td>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->regular_price }}</td>
                <td> <img src="{{ asset('/uploads/products/'.$product->product_image ) }}" style="width:80px;height:80px;" alt=""> </td>
                <td>{{ $product->product_offer }} %</td>
                <td><p style="height: 100px;width:250px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">{{ $product->product_description }}</p></td>
                <!-- specification -->
                <td>{{ $product->processor }}</td>
                <td>{{ $product->display }}</td>
                <td>{{ $product->memory }}</td>
                <td>{{ $product->storage }}</td>
                <td>{{ $product->graphics }}</td>
                <td>{{ $product->operating_system }}</td>
                <td>{{ $product->battery }}</td>
                <td>{{ $product->adapter }}</td>
                <td>{{ $product->audio }}</td>
                <td>{{ $product->keyboard }}</td>
                <td>{{ $product->optical_drive }}</td>
                <td>{{ $product->webcam }}</td>
                <td>{{ $product->wifi }}</td>
                <td>{{ $product->bluetooth }}</td>
                <td>{{ $product->USB }}</td>
                <td>{{ $product->HDMI }}</td>
                <td>{{ $product->VGA }}</td>
                <td>{{ $product->audio_jack_combo }}</td>
                <td>{{ $product->dimensions }}</td>
                <td>{{ $product->weight }}</td>
                <td>{{ $product->colors }}</td>
                <td>{{ $product->manufacturing_warranty }}</td>

                <td>{{ $product->category->category_name }}</td>

                <td>
                    <a href="{{ route('admin.view.product',$product->id) }}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                    <a href="{{ route('admin.edit.product',$product->id) }}" class="btn btn-primary mt-1"><i class="fa fa-th-list"></i></a>
                    <a href="{{ route('admin.delete.product',$product->id) }}" class="btn btn-danger mt-1"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
