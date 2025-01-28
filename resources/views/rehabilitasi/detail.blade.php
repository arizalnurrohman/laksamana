@extends('layout.master')
@section('add-css')
<style type="text/css">
    .custom-dropzone {
        border: 2px dashed #6c757d;
        border-radius: 10px;
        background: #f8f9fa;
        padding: 20px;
        text-align: center;
        cursor: pointer;
        transition: background 0.3s, border-color 0.3s;
    }

    .custom-dropzone:hover {
        border-color: #007bff;
        background: #e9ecef;
    }

    .custom-dropzone input[type="file"] {
        display: none;
    }

    .file-list {
        margin-top: 10px;
    }

    .file-list-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 5px 10px;
        background: #ffffff;
        border: 1px solid #ddd;
        border-radius: 5px;
        margin-bottom: 5px;
    }

    .file-list-item span {
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }

    .file-list-item button {
        background: transparent;
        border: none;
        color: red;
        cursor: pointer;
    }
</style>
@endsection
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Data @if ($activeMenu) {{ $activeMenu->menu }} @endif  - {{$rehabilitasi->nama_depan." ".$rehabilitasi->nama_belakang}}</h4>
                </div>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPerkembangan{{ $activeMenu->access }}Modal">
                    <span class="btn-inner">
                        <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                    </span>
                    Data Perkembangan @if ($activeMenu) {{ $activeMenu->menu }} @endif
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="list-data" class="table"><?php /*<table id="datatable" class="table table-striped" data-toggle="data-table">*/ ?>
                        <thead>
                            <tr>
                                <th width="25">No</th>
                                <th>Tanggal Perkembangan</th>
                                <th width="40">IMG</th>
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

<div class="modal fade" id="addPerkembangan{{ $activeMenu->access }}Modal" tabindex="-1" aria-labelledby="layananModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="layananModalLabel">Perkembangan Rehabilitasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST" id="addPerkembangan{{ $activeMenu->access }}ModalForm">
                <div class="modal-body">
                
                    <div class="row">
                        <!-- Kolom Kiri -->
                        <div class="col-xl-9">
                            <div class="card">
                                <div class="row">
                                    <input type="hidden" name="layanan_residensial_id" id="layanan_residensial_id">
                                    <p><strong>Nama Lengkap:</strong> <span data-field="nama"></span></p>
                                    <p><strong>NIK:</strong> <span data-field="nik"></span></p>
                                    <p><strong>NO KK:</strong> <span data-field="nokk"></span></p>
                                    <p><strong>Tempat Lahir:</strong> <span data-field="tmp_lahir"></span></p>
                                    <p><strong>Tanggal Lahir:</strong> <span data-field="tgl_lahir"></span></p>
                                    <p><strong>Usia:</strong> <span data-field="usia"></span></p>
                                    <p><strong>Provinsi KTP:</strong> <span data-field="provinsi"></span></p>
                                    <p><strong>Kab/Kota KTP:</strong> <span data-field="kabupaten"></span></p>
                                    <p><strong>Kecamatan KTP:</strong> <span data-field="kecamatan"></span></p>
                                    <p><strong>Kelurahan KTP:</strong> <span data-field="kelurahan"></span></p>
                                    <p><strong>Alamat KTP:</strong> <span data-field="alamat"></span></p>
                                    <p><strong>Alamat Domisili:</strong> <span data-field="domisili"></span></p>
                                    <p><strong>Agama:</strong> <span data-field="agama"></span></p>
                                    <p><strong>Pendidikan:</strong> <span data-field="pendidikan"></span></p>
                                </div>
                            </div>
                        </div>

                        <!-- Kolom Kanan -->
                        <div class="col-xl-3">
                            <div class="card mb-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Tanggal Perkembangan: *</label>
                                        <input type="date" class="form-control" name="perkembangan_tanggal" placeholder="Tanggal Perkembangan" />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="kategori_ppks">Foto Perkembangan</label>
                                        <div class="custom-dropzone" onclick="document.getElementById('fotoInput').click();">
                                            <p class="text-secondary">Drag & drop files here or click to select files</p>
                                            <input type="file" id="fotoInput" name="foto" multiple accept=".jpg,.jpeg,.png,.pdf" onchange="handleFileUpload(event, 'foto')">
                                        </div>
                                        <div class="file-list" id="fileListFoto"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="kategori_ppks">File Perkembangan</label>
                                        <div class="custom-dropzone" onclick="document.getElementById('fotoInput').click();">
                                            <p class="text-secondary">Drag & drop files here or click to select files</p>
                                            <input type="file" id="fotoInput" name="foto" multiple accept=".jpg,.jpeg,.png,.pdf" onchange="handleFileUpload(event, 'foto')">
                                        </div>
                                        <div class="file-list" id="fileListFoto"></div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="layananModalForm">Simpan Perkembangan</button>
                </div>
            </form>
        </div>
    </div>
</div>
 
@endsection
@section('add-js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function load_this_data(){
        loadTabelData("list-data", "{{route('load_rehabilitasi_perkembangan',$rehabilitasi->rehabilitasi_id)}}", ['No', 'Tanggal Perkembangan','IMG','Aksi']);
    }
    $(document).ready(function () {
        load_this_data();
    });
</script>

@endsection