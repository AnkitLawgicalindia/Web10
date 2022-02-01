@extends('layouts.customer_app')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Client Requirement</h1>
    <div class="col shadow mb-4 p-5">
        @if (session()->has('done'))
        <div class="alert alert-success">
            {{session()->get('done')}}
        </div>
        @endif
        <form action="{{route('save_customer_requirement',['id'=>$design->id])}}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Category Title</label>
                <input class="form-control" type="name" name="title" required>
            </div>
            <div class="form-group">
                <label for="">Design</label>
                <img class="img-thumbnail" src="{{$design->image}}" alt="">
                <input style="display: none" class="form-control" type="text" name="design" value="{{$design->image}}">
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <textarea class="form-control" name="description" id="" cols="30" required></textarea>
            </div>
            <button class="btn btn-primary btn-lg" type="submit">Add Product</button>
        </form>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

@endsection