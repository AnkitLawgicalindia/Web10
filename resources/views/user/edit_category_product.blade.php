@extends('layouts.admin_app')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Category</h1>


    <div class="col shadow mb-4 p-5">
        <form action="{{route('update_category',['id'=>$category->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Category Name</label>
                <input class="form-control" type="name" name="name" value="{{$category->name}}" required>
            </div>
            <div class="form-group col-lg-4">
                <label for="">Image</label>
                <img class="img-thumbnail" src="{{$category->image}}" alt="">
                <input class="form-control" type="file" name="image" value="">
            </div>
            <div class="form-group">
                <label for="">Description</label>
                <textarea class="form-control" name="description" id="" cols="30" required></textarea>
            </div>
            <button class="btn btn-primary btn-lg" type="submit">Edit category</button>
        </form>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

@endsection