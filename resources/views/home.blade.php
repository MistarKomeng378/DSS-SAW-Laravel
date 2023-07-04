@extends('template.index')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
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
                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $countWarga }}</h3>            
                            <p>Warga</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i> 
                        </div>
                        <a href="#" class="small-box-footer"><i class="fas fa-home"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $countMale }}</h3>
                            <p>Laki-Laki</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-mars"></i>
                        </div>
                        <a href="#" class="small-box-footer"><i class="fas fa-mars"></i></a>
                    </div>
                </div>

                <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $countFemale }}</h3>            
                            <p>Perempuan</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-venus"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-venus"></i></a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
