@extends('admin.master')
@section('contents')
<!-- Message -->
@if(session()->has('error'))
<p class="alert alert-danger">{{ session()->get('error') }}</p>
@endif
@if(session()->has('message'))
<p class="alert alert-success">{{ session()->get('message') }}</p>
@endif
<!-- end -->

<div class="table_button text-uppercase">
    <a href="{{ route('admin.add.offer') }}" class="btn btn-primary">Add Offer</a>
</div>
<div class="manage_table">
    <table class="table table-borderless table-hover" id="myOfferTable">
        <thead class="table-primary">
            <tr class="text-center text-capitalize">
                <th scope="col">SL</th>
                <th scope="col">Deadline</th>
                <th scope="col">title</th>
                <th scope="col">short-details</th>
                <th scope="col">image</th>
                <th scope="col">details</th>
                <th scope="col">condition</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($offers as $key=>$offer)
            <tr class="text-center">
                <td>{{ $key+1 }}</td>
                <td> {{ $offer->deadline }}</td>
                <td>{{ $offer->title }}</td>
                <td>{{ $offer->short_details }}</td>
                <td><img src="{{ asset('uploads/offer/'.$offer->image) }}" style="width:80px;height:80px;"></td>
                <td>{{ $offer->details }}</td>
                <td>{{ $offer->condition }}</td>
                <td>
                    <a href="{{ route('admin.view.offer',$offer->id) }}" class="btn btn-success"><i class="fa fa-eye"></i></a>
                    <a href="{{ route('admin.edit.offer',$offer->id) }}" class="btn btn-primary"><i class="fa fa-th-list"></i></a>
                    <a href="{{ route('admin.delete.offer',$offer->id) }}" class="btn btn-danger mt-1"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection

<!-- jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js" integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {
        $('#myOfferTable').DataTable();
    });
</script>