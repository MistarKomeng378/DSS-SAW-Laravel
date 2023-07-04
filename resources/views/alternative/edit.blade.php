@extends('template.index')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Ubah Alternatif</h1>
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
                            <form action="{{route('alternatives.update', $alternative->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">NIK</label>
                                            <div class="input-group">
                                                <input id="nik" type="text" class="form-control" maxlength="16" value="{{ $alternative->nik }}" name="nik" disabled>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Nama Warga</label>
                                            <div class="input-group">
                                                <input id="name" type="text" class="form-control" placeholder="Nama Warga" value="{{ $alternative->name }}" name="name" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Tempat Lahir</label>
                                            <div class="input-group">
                                                <input id="tempat_lahir" type="text" class="form-control" placeholder="Tempat Lahir" value="{{ $alternative->tempat_lahir }}" name="tempat_lahir" required>
                                            </div>
                                        </div>
                                    </div>                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">Tanggal Lahir</label>
                                            <div class="input-group">
                                                <input id="tgl_lahir" type="date" class="form-control" placeholder="Tanggal Lahir" value="{{ $alternative->tgl_lahir }}" name="tgl_lahir" required>
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
                                                    @if ($alternative->jns_kelamin == "L")
                                                        <option value="L" selected='selected'>Laki-Laki</option>
                                                        <option value="P">Perempuan</option>
                                                    @else
                                                        <option value="L">Laki-Laki</option>
                                                        <option value="P" selected='selected'>Perempuan</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>
                                    </div>                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">No HP</label>
                                            <div class="input-group">
                                                <input id="telp" type="text" class="form-control" value="{{ $alternative->telp }}"  maxlength="13" placeholder="No Hp" name="telp" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="name">Alamat</label>
                                            <div class="input-group">
                                                <input id="alamat" type="text" class="form-control" value="{{ $alternative->alamat }}" placeholder="Alamat" name="alamat" required>
                                            </div>
                                        </div>
                                    </div>    
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">RT</label>
                                            <div class="input-group">
                                                <input id="rt" type="text" class="form-control" value="{{ $alternative->rt }}" placeholder="RT" name="rt" required>
                                            </div>
                                        </div>
                                    </div>                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">RW</label>
                                            <div class="input-group">
                                                <input id="rw" type="text" class="form-control" value="{{ $alternative->rw }}" placeholder="RW" name="rw" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        @foreach ($criteriaweights as $key => $cw)
                                        <div class="form-group">
                                            <label for="criteria[{{$cw->id}}]">{{$cw->name}} :</label>
                                            <select class="form-control" id="criteria[{{$cw->id}}]"
                                                name="criteria[{{$cw->id}}]">
                                                <!--
                                                @php
                                                    $res = $criteriaratings->where('criteria_id', $cw->id)->all();
                                                @endphp
                                                -->
                                                @foreach ($res as $cr)
                                                <option value="{{$cr->id}}"
                                                    {{ $cr->id == $alternativescores[$key]->rating_id ? "selected=selected" : "" }}>
                                                    {{$cr->description}}</option>
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
                                                        <option value="{{ $year }}" @if($alternative->periode == $year) selected @endif>{{ $year }}</option>
                                                    @endfor
                                                </select>
                                            </div>
                                        </div>
                                    </div>    
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
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
