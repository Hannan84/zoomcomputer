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
    <form action="{{ route('admin.store.offer') }}" method="POST" enctype="multipart/form-data" class="text-capitalize">
        @csrf
        <div class="form-group">
            <label for="deadline">deadline</label>
            <input type="datetime-local" name="deadline" class="form-control w-25" id="deadline"required>
        </div>
        <div class="form-group">
            <label for="t1">title</label>
            <input type="text" name="title" class="form-control" id="t1" placeholder="Enter Branch Name & Offer" required>
        </div>
        <div class="form-group">
            <label for="short_details">short details</label>
            <input type="text" name="short_details" class="form-control" id="short_details" placeholder="Must be within 30 letter" required>
        </div>
        <div class="form-group">
            <label for="image">image</label>
            <input type="file" name="image" class="form-control" id="image" required>
        </div>
        <div class="form-group">
            <label for="details">Details</label>
            <textarea name="details" id="details" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="condition">condition</label>
            <textarea name="condition" id="condition" class="form-control" required></textarea>
            <button type="submit" class="btn btn-primary w-100">Submit Now</button>
    </form>
</div>
@endsection