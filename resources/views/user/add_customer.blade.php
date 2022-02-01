@extends('layouts.admin_app')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Add Customer</h1>
    <div class="col shadow mb-4 p-5">
        @if (session()->has('done'))
        <div class="alert alert-success">
            {{session()->get('done')}}
        </div>
        @endif
        <form action="{{route('save_customer')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Customer Name</label>
                <input class="form-control" type="name" name="name" value="{{old('name')}}" required>
            </div>
            <div class="form-group">
                <label for="">Customer Mobile Number</label>
                <input class="form-control" type="number" name="mobile" value="{{old('mobile')}}" required>
            </div>
            <div class="form-group">
                <label for="">Customer Email</label>
                <input class="form-control" type="email" name="email" value="{{old('email')}}" required>
            </div>
            <div class="form-group">
                <label for="">Customer Password</label>
                <input class="form-control" type="password" name="password" value="{{old('password')}}" required>
            </div>
            <button class="btn btn-primary btn-lg" type="submit">Add Product</button>
        </form>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

@endsection