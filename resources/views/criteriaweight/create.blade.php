@extends('template.index')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Kriteria</h1>
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
                            <form action="{{route('criteriaweights.store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <div class="input-group">
                                        <input id="name" type="text" class="form-control" placeholder="Nama Kriteria"
                                            name="name" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="type">Tipe</label>
                                    <select class="form-control" id="type" name="type">
                                        <option value="benefit">Benefit</option>
                                        <option value="cost">Cost</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="weight">Bobot</label>
                                    <div class="input-group">
                                        <input id="weight" type="text" class="form-control" placeholder="Bobot"
                                            name="weight" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="description">Deskripsi :</label>
                                    <div class="input-group">
                                        <input id="description" type="text" class="form-control" placeholder="Deskripsi"
                                            name="description" required>
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

