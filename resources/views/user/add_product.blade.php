@extends('layouts.admin_app')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Add Product</h1>

    @if (session()->has('done2'))
    <div class="alert alert-success">
        {{session()->get('done2')}}
    </div>
    @endif
    <div class="col shadow mb-4 p-5">
        <form action="{{route('save_product')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Title</label>
                <input class="form-control" type="name" name="title" value="" required>
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input class="form-control" type="file" name="image" value="" required>
            </div>
            <div class="form-group">
                <label for="">Client</label>
                <input class="form-control" type="name" name="client" value="" required>
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <textarea class="form-control" name="description" id="" cols="30" required></textarea>
            </div>
            <div class="form-group">
                <label for="">Category</label>
                <select class="form-control" name="category_id" id="" required>
                    <option value="">Select Category</option>
                    @foreach ($category as $categories)
                    <option value="{{$categories->id}}">{{$categories->name}}</option>
                    @endforeach
                </select>
            </div>
            <button class="btn btn-primary btn-lg" type="submit">Add Product</button>
        </form>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

@endsection