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
                <form action="{{ route('post_laporanpendampingsosial') }}" method="post" class="form-horizontal" id='monitoring-usulan'>
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
                        <div class="col-md-2 d-grid"><strong></strong><br /><button type="submit" class="btn btn-block btn-primary"> Filter</button></div>
                    </div>
                </form>
                <br><br>
                <div class="table-responsive">
                    <table id="list-data" class="table"><?php /*<table id="datatable" class="table table-striped" data-toggle="data-table">*/ ?>
                        <thead>
                            <tr>
                                <th width="25">No</th>
                                <th>Nama Pendamping Sosial</th>
                                <th>Nama PPKS yang didampingi</th>
                                <th>Asal Rujukan</th>
                                <th width="40">Klaster</th>
                                <th width="40">Sub Klaster</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $dt)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td colspan="5">{{$dt->nama_petugas}}</td>
                                </tr>
                                @foreach($dt->ppks as $ppks)
                                    <tr>
                                        <td colspan="2">&nbsp;</td>
                                        <td>{{$ppks->nama_depan." ".$ppks->nama_belakang}}</td>
                                        <td>{{$ppks->sumber}}</td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>
                                @endforeach
                            @endforeach
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