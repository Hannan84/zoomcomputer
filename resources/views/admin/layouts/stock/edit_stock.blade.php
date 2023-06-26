@extends('admin.master')
@section('contents')
<div class="myform">
    <form action="{{ route('admin.update.stock',$stock->id) }}" method="post">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">Total Produce</label>
            <input type="number" name="total_produce" value="{{ $stock->total_produce }}" class="form-control" id="exampleFormControlInput1" placeholder="Enter quantity" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit Now</button>
    </form>
</div>
@endsection