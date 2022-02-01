@extends('layouts.admin_app')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Mail Table</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if (session()->has('done3'))
                <div class="alert alert-success">
                    Successfully Deleted
                </div>
                @endif
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Mobile Number</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $id=0; ?>
                        @foreach ($mail as $mails)
                        <?php $id++;?>
                        <tr>
                            <th>{{$id}}</th>
                            <th>{{$mails->name}}</th>
                            <th>{{$mails->mobile}}</th>
                            <th>{{$mails->email}}</th>
                            <th>{{$mails->message}}</th>
                            <th><a href="{{route('delete_mail',['id'=>$mails->id])}}"
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
                {{$mail->links()}}
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

@endsection