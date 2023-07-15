<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Penerima Dana Bantuan</title>

    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
</head>

<style>
    .page-break {
        page-break-after: always;
    }
    
</style>

<body>
    <h4 align="center">DATA PENERIMA DANA BANTUAN</h4>
    <div class="page-break"> 
        <table border="1" cellpadding="0" cellspacing="0" width="100%">
            <thead>
                <tr style="background-color: #e7e7e7;">
                    <th height="45px">No</th>
                    <th>NIK</th>
                    <th>Nama Warga</th>
                    <th>Alamat</th>
                    <th>Telp</th>
                        @foreach ($criteriaweights as $c)
                            <th>{{$c->name}}</th>
                        @endforeach
                    {{-- <th>Total</th> --}}
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($alternatives as $a)
                <tr>
                    <td align="center">{{ ++$i }}</td>
                    <td> &nbsp; {{ $a->nik }}</td>
                    <td> &nbsp; {{$a->name}}</td>
                    <td> &nbsp; {{$a->telp}}</td>
                    <td> &nbsp; {{$a->alamat}}</td>
                    @php
                        $scr = $scores->where('ida', $a->id)->all();
                        $total = 0;
                    @endphp
                    @foreach ($scr as $s)
                        @php
                        $total += $s->rating;
                        @endphp
                        <td> &nbsp; {{$s->description}}</td>
                        
                    @endforeach 
                    
                    {{-- <td>{{$total}}</td> --}}

                    
                    @if ($total > 0.9)
                        @php
                            $ket = 'Penerima Bantuan';                                    
                        @endphp                                            
                    @else
                        @php
                            $ket = 'Bukan Penerima';
                        @endphp      
                    @endif
                    <td> &nbsp;{{ $ket }}</td>
                </tr> 
                @endforeach
            </tbody>
        </table>
    </div>
        
</body>

</html>