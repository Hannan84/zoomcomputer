@extends('admin.master')
@section('contents')
<div class="myform">
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

    <form action="{{ route('admin.store.subCategory') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="sun1">Sub-Category Name</label>
            <input type="text" name="sub_category_name" class="form-control" id="sun1" placeholder="Enter Subcategory Name" required>
        </div>
        <div class="form-group">
            <label for="cni1">Category Name</label>
            <select class="form-control" id="cni1" name="category_id">
                @foreach($categories as $subcategory)
                <option value="{{ $subcategory->id }}">{{ $subcategory->category_name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit Now</button>

    </form>
</div>
@endsection