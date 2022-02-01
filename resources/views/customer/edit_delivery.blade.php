@extends('layouts.customer_app')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Delivery Address</h1>
    <div class="col shadow mb-4 p-5">
        @if (session()->has('done'))
        <div class="alert alert-success">
            {{session()->get('done')}}
        </div>
        @endif
        <form action="{{route('update_delivery',['id'=>$delivery->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for=""> Delivery Address</label>
                <textarea class="form-control" name="delivery_address" id="" cols="30"
                    required>{{$delivery->delivery_address}}</textarea>
            </div>
            <button class="btn btn-primary btn-lg" type="submit">Edit</button>
        </form>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

@endsection