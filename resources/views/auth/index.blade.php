@extends('template.index')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Users</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ $message }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif

                            <a href="{{route('user.create')}}" class='btn btn-primary'> <span
                                    class='fa fa-plus'></span> Tambah User</a>
                            <br>
                            <table id="mytable" class="display nowrap table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Username</th>
                                        <th>E-mail</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $users)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $users->username}}</td>
                                        <td>{{ $users->email}}</td>
                                        <td>
                                            <form action="{{ route('user.destroy',$users->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <span data-toggle="tooltip" data-placement="bottom" title="Edit Data">
                                                    <a href="{{ route('user.edit',$users->id) }}"
                                                        class="btn btn-primary btn-sm"><span class="fa fa-edit"></span>
                                                    </a>
                                                </span>
                                                <span data-toggle="tooltip" data-placement="bottom" title="Delete Data">
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <span class="fa fa-trash-alt"></span>
                                                    </button>
                                                </span>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.col-md-6 -->

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection

@section('script')
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()

        $('#mytable').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });

</script>
@endsection
