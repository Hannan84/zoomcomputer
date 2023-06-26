@extends('admin.master')
@section('contents')
<div class="myform">
    <form action="{{ route('admin.update.subCategory',$subCategory->id) }}" method="post">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">Sub-Category Name</label>
            <input type="text" name="sub_category_name" value="{{ $subCategory->sub_category_name}}" class="form-control" id="exampleFormControlInput1" placeholder="Enter Subcategory Name" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Now</button>
    </form>
</div>
@endsection