@extends('admin.master')
@section('contents')

<div class="view m-4">
    <div class="image">
        <img src="{{ asset('/uploads/offer/'.$offer->image ) }}" alt="" class="w-50 h-50">
    </div>
    <div class="image_desc">
        <form action="{{ route('admin.change.offer.image',$offer->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="file" name="image" class="w-25 mt-2 form-control" required>
            <button type="submit" class="btn btn-primary mt-2">Change</button>
        </form>
    </div>
</div>
@endsection