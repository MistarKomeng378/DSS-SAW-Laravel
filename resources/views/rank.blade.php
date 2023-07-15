@extends('template.index')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Peringkat</h1>
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
                            <div class="col-lg-12">
                                <a href="{{url('export')}}" class='btn btn-primary' target="_blank"> <span
                                    class='fa fa-print'></span> Cetak</a>
                            </div>
                            <table id="mytable" class="display nowrap table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>NIK</th>
                                        <th>Nama Warga</th>
                                        @foreach ($criteriaweights as $c)
                                        <th>{{$c->name}}</th>
                                        @endforeach
                                        <th>Total</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($alternatives as $a)
                                    <tr>
                                        <td>{{ $a->nik }}</td>
                                        <td>{{$a->name}}</td>
                                        @php
                                            $scr = $scores->where('ida', $a->id)->all();
                                            $total = 0;
                                        @endphp
                                        @foreach ($scr as $s)
                                            @php
                                            $total += $s->rating;
                                            @endphp
                                            <td>{{$s->rating}}</td>
                                            
                                        @endforeach 
                                        
                                        <td>{{$total}}</td>

                                        
                                        @if ($total >= 200)
                                            @php
                                                $ket = 'Penerima Bantuan';
                                                $btn = 'btn btn-success btn-sm';                                                
                                            @endphp                                            
                                        @else
                                            @php
                                                $ket = 'Bukan Penerima';
                                                $btn = 'btn btn-danger btn-sm';
                                            @endphp      
                                        @endif
                                        <td> 
                                            <span data-toggle="tooltip" data-placement="bottom">
                                                <button type="submit" class="{{ $btn }}">{{ $ket }}</button>
                                            </span>
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
            // "pageLength": 3,            
            "order": [[ 6, 'desc' ]],            
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
