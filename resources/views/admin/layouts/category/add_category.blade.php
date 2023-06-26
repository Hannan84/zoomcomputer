@extends('admin.master')
@section('contents')
<!-- Validation Error Message -->
<div class="message">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>

<div class="myform">
    <form action="{{ route('admin.store.category') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="c_n1">Category Name</label>
            <input type="text" name="category_name" class="form-control" id="c_n1" placeholder="Enter Category Name" required>
        </div>
        <div class="form-group">
            <label for="img1">Category Image</label>
            <input type="file" name="image" accept="image/*" class="form-control" id="img1" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit Now</button>
    </form>
</div>
@endsection