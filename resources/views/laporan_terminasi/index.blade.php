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
                <div class="table-responsive">
                    <table id="list-data" class="table"><?php /*<table id="datatable" class="table table-striped" data-toggle="data-table">*/ ?>
                        <thead>
                            <tr>
                                <th width="25">No</th>
                                <th>Nama PPKS</th>
                                <th width="40">Tanggal</th>
                                <th width="40">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- laporan lihat --}}
<div class="modal fade" id="ba{{ $activeMenu->access }}Modal" tabindex="-1" aria-labelledby="layananModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="layananModalLabel">Berita Acara</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <iframe 
                                id="iframeBA" 
                                src="" 
                                class="w-100 border rounded" 
                                style="height: 700px;" 
                                allowfullscreen 
                                title="PDF Viewer">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 
@endsection
@section('add-js')
<script src="{{ url('assets/js/sweetalert.js') }}"></script>
<script>
    function load_this_data(){
        loadTabelData("list-data", "{{route('load_laporantermininasi')}}", ['No', 'Nama PPKS','Tanggal','Aksi']);
    }
    $(document).ready(function () {
        load_this_data();
    });

    function dokumen_ba(id){
        $.ajax({
            url: `/laporan-termininasi/edit/${id}`,
            type: 'GET',
            success: function (data) {
                $('#iframeBA').attr('src', data.dokumen_ba);
                $('#ba{{ $activeMenu->access }}Modal').modal('show');
            },
            error: function (xhr, status, error) {
                console.error(`Error: ${error}`);
                alert('Failed to fetch data. Please try again.');
            }
        });
        
    }

</script>

@endsection