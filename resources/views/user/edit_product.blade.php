@extends('layouts.admin_app')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Product</h1>


    <div class="col shadow mb-4 p-5">
        <form action="{{route('update_product',['id'=>$product->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Title</label>
                <input class="form-control" type="name" name="title" value="{{$product->title}}" required>
            </div>
            <div class="form-group col-lg-4">
                <label for="">Image</label>
                <img class="img-thumbnail" src="{{$product->image}}" alt="">
                <input class="form-control" type="file" name="image" value="">
            </div>
            <div class="form-group">
                <label for="">Client</label>
                <input class="form-control" type="name" name="client" value="{{$product->client}}" required>
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <textarea class="form-control" name="description" id="" cols="30"
                    required>{{$product->description}}</textarea>
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
            <button class="btn btn-primary btn-lg" type="submit">Edit Product</button>
        </form>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

@endsection