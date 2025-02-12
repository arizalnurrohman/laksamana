@extends('layout.master')
@section('add-css')

@endsection
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Data @if ($activeMenu) {{ $activeMenu->menu }} @endif</h4>
                </div>
                
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="list-data" class="table"><?php /*<table id="datatable" class="table table-striped" data-toggle="data-table">*/ ?>
                        <thead>
                            <tr>
                                <th width="25">No</th>
                                <th>Nama PPKS</th>
                                <th width="40">Rehabilitasi</th>
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
 
@endsection
@section('add-js')
<script src="{{ url('assets/js/sweetalert.js') }}"></script>
<script>
    function load_this_data(){
        loadTabelData("list-data", "{{route('load_rehabilitasi')}}", ['No', 'Nama PPKS','Rehabilitasi','Aksi']);
    }
    $(document).ready(function () {
        load_this_data();
    });
</script>

@endsection