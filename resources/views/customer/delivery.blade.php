@extends('layouts.customer_app')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Delivery Addresses Table</h1>

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
                            <th>Address</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $id=0; ?>
                        @foreach ($delivery as $deliverys)
                        <?php $id++;?>
                        <tr>
                            <td>{{$id}}</th>
                            <td>{{$deliverys->delivery_address}}</th>
                            <td><a href="{{route('edit_delivery',['id'=>$deliverys->id])}}"
                                    class="btn btn-success btn-circle btn-lg">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{route('delete_delivery',['id'=>$deliverys->id])}}"
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

            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

@endsection