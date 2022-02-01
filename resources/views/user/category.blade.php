@extends('layouts.admin_app')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Categories Table</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if (session()->has('done'))
                <div class="alert alert-success">
                    {{session()->get('done')}}
                </div>
                @endif
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Category Name</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $id=0; ?>
                        @foreach ($category as $categories)
                        <?php $id++;?>
                        <tr>
                            <th>{{$id}}</th>
                            <th>{{$categories->name}}</th>
                            <th><img height="100" src="{{$categories->image}}" alt="not Found"></th>
                            <th>{{$categories->description}}</th>
                            <th><a href="{{route('delete_category',['id'=>$categories->id])}}"
                                    class="btn btn-danger btn-circle btn-lg">
                                    <span class="icon">
                                        <i class="fas fa-trash"></i>
                                    </span>
                                </a>
                                <a href="{{route('edit_category',['id'=>$categories->id])}}"
                                    class="btn btn-success btn-circle btn-lg">
                                    <span class="icon">
                                        <i class="fas fa-edit"></i>
                                    </span>
                                </a>
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$category->links()}}
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

@endsection