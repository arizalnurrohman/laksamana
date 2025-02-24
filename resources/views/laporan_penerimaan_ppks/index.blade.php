@extends('layout.master')
@section('add-css')

@endsection
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Data Laporan @if ($activeMenu) {{ $activeMenu->menu }} @endif</h4>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('download_laporanpenerimaanppks') }}" method="post" class="form-horizontal" id='monitoring-usulan'>
                    @csrf
                    <div class="row">
                        @php
                            use Carbon\Carbon;
                            \Carbon\Carbon::setLocale('id');
                        @endphp
                        <div class="col-md-4 text-dark"><strong>Bulan Awal</strong><br />
                            <select class="form-select" id="bulan_awal" name="bulan_awal">
                                <option value="0">Pilih Bulan Awal</option>
                                @for ($i = 1; $i <= 12; $i++)
                                <option value="{{$i}}" {{(app('request')->input('bulan_awal')==$i ? 'Selected="Selected"' : '')}}>{{ Carbon::create()->month($i)->translatedFormat('F') }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-md-4 text-dark"><strong>Bulan Akhir</strong><br />
                            <select class="form-select" id="bulan_akhir" name="bulan_akhir">
                                <option value="0">Pilih Bulan Akhir</option>
                                @for ($i = 1; $i <= 12; $i++)
                                <option value="{{$i}}" {{(app('request')->input('bulan_awal')==$i ? 'Selected="Selected"' : '')}}>{{ Carbon::create()->month($i)->translatedFormat('F') }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-md-2 text-dark"><strong>Tahun</strong><br />
                            <select class="form-select" id="tahun" name="tahun">
                                <option value="0">Pilih Tahun</option>
                                @for ($i = date("Y")-2; $i <= date("Y"); $i++)
                                <option value="{{$i}}" {{(app('request')->input('tahun')==$i ? 'Selected="Selected"' : '')}}>{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-md-2 d-grid"><strong></strong><br /><button type="submit" class="btn btn-block btn-primary"> Download</button></div>
                    </div>
                </form>
                <br><br>
                <div class="table-responsive">
                    <table id="list-data" class="table"><?php /*<table id="datatable" class="table table-striped" data-toggle="data-table">*/ ?>
                        <thead>
                            <tr>
                                <th width="25">No</th>
                                <th>Kategori PPKS</th>
                                @php $total_per_bulan = []; @endphp
                                @for($x = $bln_awal; $x <= $bln_akhr; $x++)
                                    @php $total_per_bulan[$x] = 0; @endphp
                                    <th width="40">{{ date("F", strtotime("$tahun-$x-01")) }}</th>
                                @endfor
                                <th width="40">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $dt)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $dt->kategori }}</td>
                                
                                    @php 
                                        $jumlah_per_kategori = 0;
                                        $angka = $bln_awal;
                                    @endphp
                                
                                    @foreach ($dt->bulan as $x => $bulanx)
                                        @php
                                            $jumlah_per_kategori += $bulanx;
                                            $total_per_bulan[$angka] = ($total_per_bulan[$angka] ?? 0) + $bulanx;
                                            $angka++;
                                        @endphp
                                        <td style="text-align:left">{{ $bulanx }}</td> 
                                    @endforeach
                                
                                    <td>{{ $jumlah_per_kategori }}</td>
                                </tr>
                            
                            @endforeach
                            <tr>
                                <td>&nbsp;</td>
                                <td>Grand Total</td>
                                @for($x = $bln_awal; $x <= $bln_akhr; $x++)
                                    <th width="40">{{$total_per_bulan[$x]}}</th>
                                @endfor
                                <td>{{array_sum($total_per_bulan)}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


 
@endsection
@section('add-js')
<script src="{{ url('assets/js/sweetalert.js') }}"></script>
<script>
    // function load_this_data(){
    //     loadTabelData("list-data", "{{route('load_laporanassessment')}}", ['No', 'Nama PPKS','Tanggal','Aksi']);
    // }
    // $(document).ready(function () {
    //     load_this_data();
    // });

    // function dokumen_assesment(id){
    //     $.ajax({
    //         url: `/laporan-dokumen-assessment/edit/${id}`,
    //         type: 'GET',
    //         success: function (data) {
    //             $('#iframeBA').attr('src', data.dokumen_ba);
    //             $('#ba{{ $activeMenu->access }}Modal').modal('show');
    //         },
    //         error: function (xhr, status, error) {
    //             console.error(`Error: ${error}`);
    //             alert('Failed to fetch data. Please try again.');
    //         }
    //     });
        
    // }

</script>

@endsection