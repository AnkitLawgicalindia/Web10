@extends('layouts.admin_app')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Customer Table</h1>

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
                            <th>Customer Title</th>
                            <th>Customer Design</th>
                            <th>Customer Message</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $id=0; ?>
                        @foreach ($customer_requirement as $customer_requirements)
                        <?php $id++;?>
                        <tr>
                            <th>{{$id}}</th>
                            <th>{{$customer_requirements->title}}</th>
                            <th><img class="img-thumbnail" src="{{$customer_requirements->design}}" alt=""></th>
                            <th>{{$customer_requirements->description}}</th>
                            <th>
                                <a href="{{route('status_customer_requirement',['id'=>$customer_requirements->id])}}"
                                    class="btn btn-success btn-lg">
                                    Accept Request
                                </a><br><br>
                                <a href="{{route('delete_customer_requirement',['id'=>$customer_requirements->id])}}"
                                    class="btn btn-danger btn-circle btn-lg">
                                    <span class="icon">
                                        <i class="fas fa-trash"></i>
                                    </span>
                                </a>
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$customer_requirement->links()}}
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

@endsection