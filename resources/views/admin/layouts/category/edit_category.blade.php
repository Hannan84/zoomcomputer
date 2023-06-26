@extends('admin.master')
@section('contents')
<div class="myform">
    <form action="{{ route('admin.update.category',$category->id) }}" method="post">
        @csrf
        <div class="form-group">
            <label for="c_n1">Category Name</label>
            <input type="text" name="category_name" value="{{ $category->category_name }}" class="form-control" id="c_n1" placeholder="Enter Category Name" required>
        </div>
        <div class="form-group">
            <label for="Image1">Category Image</label>
            <input type="file" name="image" value="{{ $category->image }}" accept="image/*" class="form-control" id="Image1" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Now</button>

    </form>
</div>
@endsection