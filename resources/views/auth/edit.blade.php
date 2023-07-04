@extends('template.index')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ubah User</h1>
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
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                    <strong>Oops!</strong> Ada Kesalahan dalam pengisian data<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                            <form action="{{route('user.update', $user->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name">Username</label>
                                    <div class="input-group">                                        
                                        <input id="username" type="text" class="form-control" placeholder="Username" value="{{ $user->username }}" name="username" required>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="weight">Email</label>
                                    <div class="input-group">
                                        <input id="email" type="email" class="form-control" placeholder="E-mail" name="email" value="{{ $user->email }}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description">Password</label>
                                    <div class="input-group">
                                        <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
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
