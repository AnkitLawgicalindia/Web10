@extends('layouts.admin_app')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Product Table</h1>

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
                            <th>Title</th>
                            <th>Image</th>
                            <th>Client</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $id=0; ?>
                        @foreach ($product as $products)
                        <?php $id++;?>
                        <tr>
                            <th>{{$id}}</th>
                            <th>{{$products->title}}</th>
                            <th><img height="100" src="{{$products->image}}" alt="not Found"></th>
                            <th>{{$products->client}}</th>
                            <th>{{$products->description}}</th>
                            <th>{{$products->category_name}}</th>
                            <th><a href="{{route('delete_product',['id'=>$products->id])}}"
                                    class="btn btn-danger btn-circle btn-lg">
                                    <span class="icon">
                                        <i class="fas fa-trash"></i>
                                    </span>
                                </a>
                                <a href="{{route('edit_product',['id'=>$products->id])}}"
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
                {{$product->links()}}
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

@endsection