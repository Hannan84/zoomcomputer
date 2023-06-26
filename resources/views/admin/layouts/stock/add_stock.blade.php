@extends('admin.master')
@section('contents')
<div class="myform">
    <form action="{{ route('admin.store.stock') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="pnn1">Product Name</label>
            <select class="form-control" id="pnn1" name="product_id">
                @foreach($stock as $product)
                <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Total Produce</label>
            <input type="number" name="total_produce" class="form-control" id="exampleFormControlInput1" placeholder="Enter quantity" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit Now</button>

    </form>
</div>
@endsection