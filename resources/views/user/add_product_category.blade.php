@extends('layouts.admin_app')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Add Product Category</h1>
    <div class="col shadow mb-4 p-5">
        @if (session()->has('done'))
        <div class="alert alert-success">
            {{session()->get('done')}}
        </div>
        @endif
        <form action="{{route('save_category')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="">Category Name</label>
                <input class="form-control" type="name" name="name" value="{{old('name')}}" required>
            </div>
            <div class="form-group">
                <label for="">Image</label>
                <input class="form-control" type="file" name="image" required>
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