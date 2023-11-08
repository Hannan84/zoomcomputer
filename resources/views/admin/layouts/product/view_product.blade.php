@extends('admin.master')
@section('contents')

<div class="view m-4">
    <div class="image">
        @foreach ($product_images as $image)
        <img src="{{ asset('/uploads/products/' .$image ) }}" alt="" class="w-25 h-25">
        @endforeach
    </div>
    <div class="image_desc">
        <form action="{{ route('admin.change.product.image',$product->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <label for="img1">Image <span style="font-size:12px;">(max 3)</span></label>
            <input type="file" accept="image/*" name="product_image[]" multiple class="w-25 h-25 mt-2 form-control" id="img1" required>
            <button type="submit" class="btn btn-primary mt-2">Change</button>
        </form>
    </div>
</div>
@endsection