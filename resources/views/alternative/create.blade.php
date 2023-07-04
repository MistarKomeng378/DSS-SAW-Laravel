@extends('template.index')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Add new alternative</h1>
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
                            <form action="{{route('alternatives.store')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">NIK</label>
                                            <div class="input-group">
                                                <input id="nik" type="text" class="form-control" maxlength="16" placeholder="NIK" name="nik" required>
                                            </div>
                                        </div>
                                    </div>                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Nama Warga</label>
                                            <div class="input-group">
                                                <input id="name" type="text" class="form-control" placeholder="Nama Warga" name="name" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Tempat Lahir</label>
                                            <div class="input-group">
                                                <input id="tempat_lahir" type="text" class="form-control" placeholder="Tempat Lahir" name="tempat_lahir" required>
                                            </div>
                                        </div>
                                    </div>                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Tanggal Lahir</label>
                                            <div class="input-group">
                                                <input id="tgl_lahir" type="date" class="form-control" placeholder="Tanggal Lahir" name="tgl_lahir" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Jenis Kelamin</label>
                                            <div class="input-group">
                                                <select class="form-control" id="jns_kelamin" name="jns_kelamin">
                                                    <option value="L">Laki-Laki</option>
                                                    <option value="P">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">No HP</label>
                                            <div class="input-group">
                                                <input id="telp" type="text" class="form-control"  maxlength="13" placeholder="No Hp" name="telp" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Alamat</label>
                                            <div class="input-group">
                                                <input id="alamat" type="text" class="form-control" placeholder="Alamat" name="alamat" required>
                                            </div>
                                        </div>
                                    </div>    
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">RT</label>
                                            <div class="input-group">
                                                <input id="rt" type="text" class="form-control" placeholder="RT" name="rt" required>
                                            </div>
                                        </div>
                                    </div>                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">RW</label>
                                            <div class="input-group">
                                                <input id="rw" type="text" class="form-control" placeholder="RW" name="rw" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    
                                <div class="row">
                                    <div class="col-md-6">
                                        {{-- Kriteria --}}
                                        @foreach ($criteriaweights as $cw)
                                        <div class="form-group">
                                            <label for="criteria[{{$cw->id}}]">{{$cw->name}}</label>
                                            <select class="form-control" id="criteria[{{$cw->id}}]"
                                                name="criteria[{{$cw->id}}]">
                                                <!--
                                                @php
                                                    $res = $criteriaratings->where('criteria_id', $cw->id)->all();
                                                @endphp
                                                -->
                                                @foreach ($res as $cr)
                                                    <option value="{{$cr->id}}">{{$cr->description}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @endforeach
                                    </div>    
                                </div> 
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Periode</label>
                                            <div class="input-group">
                                                <select class="form-control" id="periode" name="periode">
                                                    {{ $year = date('Y') }}
                                                    {{ $yearEnd = $year + 4 }}
                                                    @for ($year; $year <= $yearEnd ; $year++)  
                                                        <option value="{{ $year }}">{{ $year }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
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
