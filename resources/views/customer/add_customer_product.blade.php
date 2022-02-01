@extends('layouts.customer_app')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Add Product</h1>
    <div class="col shadow mb-4 p-5">
        @if (session()->has('done'))
        <div class="alert alert-success">
            {{session()->get('done')}}
        </div>
        @endif
        <form action="{{route('save_customer_product')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Name</label>
                <input class="form-control" type="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input class="form-control" type="file" name="image" required>
            </div>
            <div class="form-group">
                <label for="">Mobile Number</label>
                <input class="form-control" type="number" name="mobile" required>
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input class="form-control" type="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="">Delivery Address</label>
                <select class="form-control" name="delivery_address" id="" required>
                    <option value="">Select Location</option>
                    @foreach ($delivery as $deliverys)
                    <option value="{{$deliverys->id}}">{{$deliverys->delivery_address}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Address</label>
                <textarea class="form-control" name="address" id="" cols="30" required></textarea>
            </div>
            <button class="btn btn-primary btn-lg" type="submit">Add Product</button>
        </form>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

@endsection