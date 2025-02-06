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
                <button class="btn btn-info" onclick="generateLaporan('{{$rehabilitasi->rehabilitasi_id}}')">
                    <span class="btn-inner">
                        <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                    </span>
                    Generate Laporan @if ($activeMenu) {{ $activeMenu->menu }} @endif
                </button>
                @if($rehabilitasi->laporan_rehabilitasi)
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPerkembangan{{ $activeMenu->access }}Modal">
                    <span class="btn-inner">
                        <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                    </span>
                    Lihat Laporan
                </button>
                
                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#addPerkembangan{{ $activeMenu->access }}Modal">
                    <span class="btn-inner">
                        <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                    </span>
                    Kirim @if ($activeMenu) {{ $activeMenu->menu }} @endif
                </button>
                @endif
                <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#intervensi{{ $activeMenu->access }}Modal">
                    <span class="btn-inner">
                        <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                    </span>
                    Intervensi @if ($activeMenu) {{ $activeMenu->menu }} @endif
                </button>
                <div class="table-responsive">
                    <table id="list-data" class="table"><?php /*<table id="datatable" class="table table-striped" data-toggle="data-table">*/ ?>
                        <thead>
                            <tr>
                                <th width="25">No</th>
                                <th>Tanggal Perkembangan</th>
                                {{-- <th width="40">IMG</th> --}}
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

{{-- intervensi --}}
<div class="modal fade" id="intervensi{{ $activeMenu->access }}Modal" tabindex="-1" aria-labelledby="layananModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="layananModalLabel">Intervensi Rehabilitasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('rehabilitasi.store_intervensi') }}" method="POST" id="intervensi{{ $activeMenu->access }}ModalForm">
                <div class="modal-body">
                    <div class="row">
                        <div class="row">
                            <input type="hidden" name="assessment_id" value="{{$assessment->id}}">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Komponen yang diberikan: *</label>
                                    <select class="form-select" name="intervensi_komponen" id="hubungan_dengan_ppks">
                                        <option value="">Pilih Komponen yang diberikan</option>
                                        @foreach($komponen_layanan_yang_diberikan as $klybd)
                                            <option value="{{$klybd->id}}" @if($assessment->intervensi_komponen_yang_diberikan==$klybd->id) selected="Selected" @endif>{{$klybd->sub_kategori_assessment}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Uraian Komponen Layanan: *</label>
                                    <textarea class="form-control" name="intervensi_uraian_komponen" rows="5">{{$assessment->intervensi_uraian_komponen_layanan}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Waktu Pemberian Layanan: *</label>
                                    <input type="date" class="form-control" name="intervensi_waktu_pemberian" placeholder="Waktu Pemberian Layanan." value="{{$assessment->intervensi_waktu_pemebrian_layanan}}" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Pihak yang terlibat Intervensi: *</label>
                                    <input type="text" class="form-control" name="intervensi_pihak_yang_terlibat" placeholder="Pihak yang terlibat Intervensi." value="{{$assessment->intervensi_pihak_yang_terlibat}}" />
                                </div>
                            </div>
                            
                            <h4>Rencana Intervensi Lanjutan (Komplementasi)</h4>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Bentuk Layanan: *</label><br>
                            
                                    <div class="form-check form-switch form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="bentuk_layanan[]" value="Bentuk Kewirausahaan" 
                                            {{ in_array("Bentuk Kewirausahaan", json_decode($assessment->rencana_intervensi_lanjutan)) ? 'checked' : '' }}>
                                        <label class="pl-2 form-check-label">Bentuk Kewirausahaan</label>
                                    </div>
                                    <br>
                            
                                    <div class="form-check form-switch form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="bentuk_layanan[]" value="Program Perbaikan Rumah melalui Rumah Usaha Sederhana" 
                                            {{ in_array("Program Perbaikan Rumah melalui Rumah Usaha Sederhana", json_decode($assessment->rencana_intervensi_lanjutan)) ? 'checked' : '' }}>
                                        <label class="pl-2 form-check-label">Program Perbaikan Rumah melalui Rumah Usaha Sederhana</label>
                                    </div>
                                    <br>
                            
                                    <div class="form-check form-switch form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="bentuk_layanan[]" value="Program Keluarga Harapan" 
                                            {{ in_array("Program Keluarga Harapan", json_decode($assessment->rencana_intervensi_lanjutan)) ? 'checked' : '' }}>
                                        <label class="pl-2 form-check-label">Program Keluarga Harapan</label>
                                    </div>
                                    <br>
                            
                                    <div class="form-check form-switch form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="bentuk_layanan[]" value="Bantuan dari Dana Hibah" 
                                            {{ in_array("Bantuan dari Dana Hibah", json_decode($assessment->rencana_intervensi_lanjutan)) ? 'checked' : '' }}>
                                        <label class="pl-2 form-check-label">Bantuan dari Dana Hibah</label>
                                    </div>
                                    <br>
                            
                                    <div class="form-check form-switch form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="bentuk_layanan[]" value="Pemberian Alat Bantu" 
                                            {{ in_array("Pemberian Alat Bantu", json_decode($assessment->rencana_intervensi_lanjutan)) ? 'checked' : '' }}>
                                        <label class="pl-2 form-check-label">Pemberian Alat Bantu</label>
                                    </div>
                                    <br>
                            
                                    <div class="form-check form-switch form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="bentuk_layanan[]" value="Pelatihan Keterampilan Kerja" 
                                            {{ in_array("Pelatihan Keterampilan Kerja", json_decode($assessment->rencana_intervensi_lanjutan)) ? 'checked' : '' }}>
                                        <label class="pl-2 form-check-label">Pelatihan Keterampilan Kerja</label>
                                    </div>
                                    <br>
                            
                                    <div class="form-check form-switch form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="bentuk_layanan[]" value="Lainnya" 
                                            {{ in_array("Lainnya", json_decode($assessment->rencana_intervensi_lanjutan)) ? 'checked' : '' }}>
                                        <label class="pl-2 form-check-label">Lainnya</label>
                                    </div>
                                </div>
                            </div>
                    
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Rekomendasi catatan Petugas: *</label>
                                    <textarea class="form-control" name="rekomendasi_catatan" rows="5">{{$assessment->rekomendasi_catatan}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan Intervensi</button>
                </div>
            </form>
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
            <form action="{{ route('rehabilitasi.store_perkembangan') }}" method="POST" id="addPerkembangan{{ $activeMenu->access }}ModalForm">
                <div class="modal-body">
                    <div class="row">
                        <!-- Kolom Kiri -->
                        <div class="col-xl-9">
                            <div class="card">
                                <div class="row">
                                    <input type="hidden" name="perkembangan_rehabilitasi_id" id="perkembangan_rehabilitasi_id" value="{{$rehabilitasi->id}}">
                                    <div class="table-responsive">
                                        <table id="list-data" class="table table-bordered table-striped table-sm">
                                            <thead style="background-color: #343a40; color: #f8f9fa;">
                                                <tr>
                                                    <th width="25" rowspan="2" class="text-center align-middle p-1">No</th>
                                                    <th rowspan="2" class="text-center align-middle p-1">Komponen</th>
                                                    @foreach($aspek as $asp)
                                                        <th width="40" colspan="3" class="text-center p-1">{!! $asp->aspek !!}</th>
                                                    @endforeach
                                                </tr>
                                                <tr>
                                                    @foreach($aspek as $asp)
                                                        <th width="20" class="text-center p-1">Kurang</th>
                                                        <th width="20" class="text-center p-1">Cukup</th>
                                                        <th width="20" class="text-center p-1">Baik</th>
                                                    @endforeach
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($komponen as $komponenx)
                                                    <tr>
                                                        <td class="text-center p-1">{{ $no++ }}</td>
                                                        <td class="p-1">{{ $komponenx->komponen }}</td>
                                                        @foreach($aspek as $aspekx)
                                                            <td width="20" class="text-center p-1">
                                                                <div class="form-check form-check-inline">
                                                                    <input type="radio" class="form-check-input" value="1" name="perkembangan[{{ $komponenx->id }}][{{ $aspekx->id }}]">
                                                                </div>
                                                            </td>
                                                            <td width="20" class="text-center p-1">
                                                                <div class="form-check form-check-inline">
                                                                    <input type="radio" class="form-check-input" value="2" name="perkembangan[{{ $komponenx->id }}][{{ $aspekx->id }}]">
                                                                </div>
                                                            </td>
                                                            <td width="20" class="text-center p-1">
                                                                <div class="form-check form-check-inline">
                                                                    <input type="radio" class="form-check-input" value="3" name="perkembangan[{{ $komponenx->id }}][{{ $aspekx->id }}]">
                                                                </div>
                                                            </td>
                                                        @endforeach
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                                                                                          
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label class="form-label">Catatan Perkembangan: *</label>
                                        <textarea class="form-control" name="perkembangan_catatan" rows="5"></textarea>
                                    </div>
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
                                        <label class="form-label" for="kategori_ppks">Upload File</label>
                                        <div class="custom-dropzone" onclick="document.getElementById('fileInput').click();">
                                            <p class="text-secondary">Drag & drop files here or click to select files</p>
                                            <input type="file" id="fileInput" name="file" multiple accept=".jpg,.jpeg,.png,.pdf" onchange="handleFileUpload(event, 'file')">
                                        </div>
                                        <div class="file-list" id="fileListFile"></div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan Perkembangan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal edit --}}
<div class="modal fade" id="editPerkembangan{{ $activeMenu->access }}Modal" tabindex="-1" aria-labelledby="layananModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="layananModalLabel">Edit Perkembangan Rehabilitasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('rehabilitasi.store_perkembangan_update') }}" method="POST" id="editPerkembangan{{ $activeMenu->access }}ModalForm">
                <div class="modal-body">
                    <div class="row">
                        <!-- Kolom Kiri -->
                        <div class="col-xl-9">
                            <div class="card">
                                <div class="row">
                                    <input type="hidden" name="perkembangan_rehabilitasi_id" id="edit_perkembangan_rehabilitasi_id">
                                    <div class="table-responsive">
                                        <table id="list-data" class="table table-bordered table-striped table-sm">
                                            <thead style="background-color: #343a40; color: #f8f9fa;">
                                                <tr>
                                                    <th width="25" rowspan="2" class="text-center align-middle p-1">No</th>
                                                    <th rowspan="2" class="text-center align-middle p-1">Komponen</th>
                                                    @foreach($aspek as $asp)
                                                        <th width="40" colspan="3" class="text-center p-1">{!! $asp->aspek !!}</th>
                                                    @endforeach
                                                </tr>
                                                <tr>
                                                    @foreach($aspek as $asp)
                                                        <th width="20" class="text-center p-1">Kurang</th>
                                                        <th width="20" class="text-center p-1">Cukup</th>
                                                        <th width="20" class="text-center p-1">Baik</th>
                                                    @endforeach
                                                </tr>
                                            </thead>
                                            <tbody id="html_append_edit">
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                                                                                          
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label class="form-label">Catatan Perkembangan: *</label>
                                        <textarea class="form-control" name="perkembangan_catatan" id="edit_perkembangan_catatan" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Kolom Kanan -->
                        <div class="col-xl-3">
                            <div class="card mb-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="form-label">Tanggal Perkembangan: *</label>
                                        <input type="date" class="form-control" name="perkembangan_tanggal" placeholder="Tanggal Perkembangan" id="edit_perkembangan_tanggal" />
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="kategori_ppks">Foto Perkembangan</label>
                                        <img src="" id="edit_perkembangan_foto" width="100%">
                                        <div class="custom-dropzone" onclick="document.getElementById('fotoInput').click();">
                                            <p class="text-secondary">Drag & drop files here or click to select files</p>
                                            <input type="file" id="edit_fotoInput" name="foto" multiple accept=".jpg,.jpeg,.png,.pdf" onchange="handleFileUpload(event, 'foto')">
                                        </div>
                                        <div class="file-list" id="edit_fileListFoto"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="kategori_ppks">Upload File</label>
                                        <div class="row edit_perkembangan_file d-none">
                                            <div class="form-group col-md-12">
                                                <label class="form-label" for="kategori_ppks">File Perkembangan</label>
                                                <iframe 
                                                    id="edit_perkembangan_file" 
                                                    src="https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf" 
                                                    class="w-100 border rounded" 
                                                    style="height: 100px;" 
                                                    allowfullscreen 
                                                    title="PDF Viewer">
                                                </iframe>
                                            </div>
                                        </div>
                                        <div class="custom-dropzone" onclick="document.getElementById('fileInput').click();">
                                            <p class="text-secondary">Drag & drop files here or click to select files</p>
                                            <input type="file" id="edit_fileInput" name="file" multiple accept=".jpg,.jpeg,.png,.pdf" onchange="handleFileUpload(event, 'file')">
                                        </div>
                                        <div class="file-list" id="edit_fileListFile"></div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Perkembangan</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal Detail --}}
<div class="modal fade" id="detailPerkembangan{{ $activeMenu->access }}Modal" tabindex="-1" aria-labelledby="layananModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="layananModalLabel">Perkembangan Rehabilitasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Kolom Kiri -->
                    <div class="col-xl-9">
                        <div class="card">
                            <div class="row">
                                <input type="hidden" name="perkembangan_rehabilitasi_id" id="perkembangan_rehabilitasi_id" value="{{$rehabilitasi->id}}">
                                <div class="table-responsive">
                                    <table id="list-data" class="table table-bordered table-striped table-sm">
                                        <thead style="background-color: #343a40; color: #f8f9fa;">
                                            <tr>
                                                <th width="25" rowspan="2" class="text-center align-middle p-1">No</th>
                                                <th rowspan="2" class="text-center align-middle p-1">Komponen</th>
                                                @foreach($aspek as $asp)
                                                    <th width="40" colspan="3" class="text-center p-1">{!! $asp->aspek !!}</th>
                                                @endforeach
                                            </tr>
                                            <tr>
                                                @foreach($aspek as $asp)
                                                    <th width="20" class="text-center p-1">Kurang</th>
                                                    <th width="20" class="text-center p-1">Cukup</th>
                                                    <th width="20" class="text-center p-1">Baik</th>
                                                @endforeach
                                            </tr>
                                        </thead>
                                        <tbody id="html_append">
                                        </tbody>
                                    </table>
                                </div>
                                                                                                        
                            </div>
                            <div class="row">
                                
                            </div>
                            <div class="row detail_perkembangan_file d-none">
                                <div class="form-group col-md-12">
                                    <label class="form-label" for="kategori_ppks">File Perkembangan</label>
                                    <iframe 
                                        id="detail_perkembangan_file" 
                                        src="https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf" 
                                        class="w-100 border rounded" 
                                        style="height: 400px;" 
                                        allowfullscreen 
                                        title="PDF Viewer">
                                    </iframe>
                                </div>
                            </div>
                            
                        </div>
                    </div>

                    <!-- Kolom Kanan -->
                    <div class="col-xl-3">
                        <div class="card mb-3">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Tanggal Perkembangan: *</label>
                                    <input type="date" class="form-control" name="perkembangan_tanggal" placeholder="Tanggal Perkembangan" id="detail_perkembangan_tanggal" />
                                </div>
                                <div class="form-group">
                                    <label class="form-label" for="kategori_ppks">Foto Perkembangan</label>
                                    <img src="" id="detail_perkembangan_foto" width="100%">
                                    {{-- <div class="custom-dropzone" onclick="document.getElementById('fotoInput').click();">
                                        <p class="text-secondary">Drag & drop files here or click to select files</p>
                                        <input type="file" id="fotoInput" name="foto" multiple accept=".jpg,.jpeg,.png,.pdf" onchange="handleFileUpload(event, 'foto')">
                                    </div>
                                    <div class="file-list" id="fileListFoto"></div> --}}
                                </div>
                                <div class="form-group">
                                        <label class="form-label">Catatan Perkembangan: *</label>
                                        <textarea class="form-control" name="perkembangan_catatan" id="detail_perkembangan_catatan" rows="5"></textarea>
                                    {{-- <label class="form-label" for="kategori_ppks">Upload File</label> --}}
                                    {{-- <div class="custom-dropzone" onclick="document.getElementById('fileInput').click();">
                                        <p class="text-secondary">Drag & drop files here or click to select files</p>
                                        <input type="file" id="fileInput" name="file" multiple accept=".jpg,.jpeg,.png,.pdf" onchange="handleFileUpload(event, 'file')">
                                    </div>
                                    <div class="file-list" id="fileListFile"></div> --}}
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan Perkembangan</button>
            </div> --}}
        </div>
    </div>
</div>

<div class="modal fade" id="zoomModal" tabindex="-1" aria-labelledby="zoomModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body text-center foto_perkembangan">
                
            </div>
        </div>
    </div>
</div>
 
@endsection
@section('add-js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function load_this_data(){
        loadTabelData("list-data", "{{route('load_rehabilitasi_perkembangan',$rehabilitasi->rehabilitasi_id)}}", ['No', 'Tanggal Perkembangan','Aksi']);
    }
    $(document).ready(function () {
        load_this_data();

        $("#addPerkembangan{{ $activeMenu->access }}ModalForm").submit(function(e){
          e.preventDefault(); 
            var btnx	=$('.btn-submit');
            $(btnx).attr("disabled", true);
            $(btnx).attr({type:'submit',value: 'Loading'});
            $.ajax({
              url:$(this).closest('form').attr('action'),
              type:"post",
              data:new FormData(this), 
              processData:false,
              contentType:false,
              dataType: "json",
              cache:false,
              async:false,
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              success: function(data){
                  if($.isEmptyObject(data.errors)){
                    Swal.fire({
                        icon    : 'success',
                        title   : 'Berhasil',
                        html    : data.message,
                        showConfirmButton:  true ,
                        timer   : 1000,
                        customClass      : {
                            container: 'swal-container'
                        }
                    }).then(function() {
                        window.location = "{{ route('rehabilitasi.detail',$rehabilitasi->rehabilitasi_id) }}";
                    });
                  }else{
                    $(btnx).removeAttr("disabled");
                    $(btnx).attr({type:'submit',value: 'Simpan'});
                    Swal.fire({
                        icon    : 'error',
                        title   : 'Gagal',
                        html    : data.message,
                        showConfirmButton:  true ,
                        timer   : 1000,
                        customClass      : {
                            container: 'swal-container'
                        }
                    }).then(function() {
                       
                    });
                  }
              },
              error: function(err, exception) {
                $(btnx).removeAttr("disabled");
                $(btnx).attr({type:'submit',value: 'Simpan'});

                Swal.fire({
                        icon    : 'error',
                        title   : 'Gagal',
                        html    : "Sistem Gagal Memproses Data",
                        showConfirmButton:  true ,
                        timer   : 1000,
                        customClass      : {
                            container: 'swal-container'
                        }
                    }).then(function() {
                       
                    });
              },
            });
        });

        $("#intervensi{{ $activeMenu->access }}ModalForm").submit(function(e){
          e.preventDefault(); 
            var btnx	=$('.btn-submit');
            $(btnx).attr("disabled", true);
            $(btnx).attr({type:'submit',value: 'Loading'});
            $.ajax({
              url:$(this).closest('form').attr('action'),
              type:"post",
              data:new FormData(this), 
              processData:false,
              contentType:false,
              dataType: "json",
              cache:false,
              async:false,
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              success: function(data){
                  if($.isEmptyObject(data.errors)){
                    Swal.fire({
                        icon    : 'success',
                        title   : 'Berhasil',
                        html    : data.message,
                        showConfirmButton:  true ,
                        timer   : 1000,
                        customClass      : {
                            container: 'swal-container'
                        }
                    }).then(function() {
                        window.location = "{{ route('rehabilitasi.detail',$rehabilitasi->rehabilitasi_id) }}";
                    });
                  }else{
                    $(btnx).removeAttr("disabled");
                    $(btnx).attr({type:'submit',value: 'Simpan'});
                    Swal.fire({
                        icon    : 'error',
                        title   : 'Gagal',
                        html    : data.message,
                        showConfirmButton:  true ,
                        timer   : 1000,
                        customClass      : {
                            container: 'swal-container'
                        }
                    }).then(function() {
                       
                    });
                  }
              },
              error: function(err, exception) {
                $(btnx).removeAttr("disabled");
                $(btnx).attr({type:'submit',value: 'Simpan'});

                Swal.fire({
                        icon    : 'error',
                        title   : 'Gagal',
                        html    : "Sistem Gagal Memproses Data",
                        showConfirmButton:  true ,
                        timer   : 1000,
                        customClass      : {
                            container: 'swal-container'
                        }
                    }).then(function() {
                       
                    });
              },
            });
        });

        $("#editPerkembangan{{ $activeMenu->access }}ModalForm").submit(function(e){
          e.preventDefault(); 
            var btnx	=$('.btn-submit');
            $(btnx).attr("disabled", true);
            $(btnx).attr({type:'submit',value: 'Loading'});
            $.ajax({
              url:$(this).closest('form').attr('action'),
              type:"post",
              data:new FormData(this), 
              processData:false,
              contentType:false,
              dataType: "json",
              cache:false,
              async:false,
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              success: function(data){
                  if($.isEmptyObject(data.errors)){
                    Swal.fire({
                        icon    : 'success',
                        title   : 'Berhasil',
                        html    : data.message,
                        showConfirmButton:  true ,
                        timer   : 1000,
                        customClass      : {
                            container: 'swal-container'
                        }
                    }).then(function() {
                        window.location = "{{ route('rehabilitasi.detail',$rehabilitasi->rehabilitasi_id) }}";
                    });
                  }else{
                    $(btnx).removeAttr("disabled");
                    $(btnx).attr({type:'submit',value: 'Simpan'});
                    Swal.fire({
                        icon    : 'error',
                        title   : 'Gagal',
                        html    : data.message,
                        showConfirmButton:  true ,
                        timer   : 1000,
                        customClass      : {
                            container: 'swal-container'
                        }
                    }).then(function() {
                       
                    });
                  }
              },
              error: function(err, exception) {
                $(btnx).removeAttr("disabled");
                $(btnx).attr({type:'submit',value: 'Simpan'});

                Swal.fire({
                        icon    : 'error',
                        title   : 'Gagal',
                        html    : "Sistem Gagal Memproses Data",
                        showConfirmButton:  true ,
                        timer   : 1000,
                        customClass      : {
                            container: 'swal-container'
                        }
                    }).then(function() {
                       
                    });
              },
            });
        });
    });

    // DROPZONE
    // Fungsi untuk menangani unggahan file
    function handleFileUpload(event, inputType) {
        const files = event.target.files;
        const fileList = document.getElementById('fileList' + capitalizeFirstLetter(inputType)); // Menentukan file list sesuai dengan input type
        console.log(fileList);
        fileList.innerHTML = ''; // Bersihkan daftar file sebelumnya

        Array.from(files).forEach((file, index) => {
            const fileItem = document.createElement('div');
            fileItem.className = 'file-list-item';
            fileItem.innerHTML = `
                <span>${file.name}</span>
                <button onclick="removeFile(event, '${inputType}', ${index})">&times;</button>
            `;
            fileList.appendChild(fileItem);
        });
    }

    // Fungsi untuk menghapus file
    function removeFile(event, inputType, index) {
        const inputElement = document.getElementById(inputType + 'Input');
        const files = Array.from(inputElement.files);
        files.splice(index, 1);

        // Membuat DataTransfer untuk mengganti file yang telah dihapus
        const dataTransfer = new DataTransfer();
        files.forEach(file => dataTransfer.items.add(file));
        inputElement.files = dataTransfer.files;

        // Refresh daftar file yang ditampilkan
        handleFileUpload({ target: { files: dataTransfer.files } }, inputType);
    }

    // Fungsi untuk kapitalisasi huruf pertama pada string
    function capitalizeFirstLetter(string) {
        return string.charAt(0).toUpperCase() + string.slice(1);
    }

    function detail_form(id){
        $("#html_append").html("");
        $.ajax({
            url: `/rehabilitasi/rehabilitasi-perkembangan/${id}`,
            type: 'GET',
            success: function (data) {
                // $('#updateId').val(data.id);
                // $('#updateKomponenPerkembangan').val(data.komponen);
                // $('#updateUrutan').val(data.sort);
                $('#detailPerkembangan{{ $activeMenu->access }}Modal').modal('show');
                $("#html_append").append(data.html);
                $("#detail_perkembangan_catatan").html(data.catatan);
                $("#detail_perkembangan_tanggal").val(data.tgl);
                $("#detail_perkembangan_foto").attr('src', data.foto);
                $("#detail_perkembangan_file").attr('src', data.file);
                if(data.file){
                    $(".detail_perkembangan_file").removeClass("d-none");
                }else{
                    $(".detail_perkembangan_file").addClass("d-none");
                }
            },
            error: function (xhr, status, error) {
                console.error(`Error: ${error}`);
                alert('Failed to fetch data. Please try again.');
            }
        });
    }
    function edit_form(id){
        $("#html_append").html("");
        $.ajax({
            url: `/rehabilitasi/rehabilitasi-perkembangan/${id}`,
            type: 'GET',
            success: function (data) {
                // $('#updateId').val(data.id);
                // $('#updateKomponenPerkembangan').val(data.komponen);
                // $('#updateUrutan').val(data.sort);
                $('#editPerkembangan{{ $activeMenu->access }}Modal').modal('show');
                $("#html_append_edit").append(data.html);
                $("#edit_perkembangan_catatan").html(data.catatan);
                $("#edit_perkembangan_tanggal").val(data.tgl);
                $("#edit_perkembangan_foto").attr('src', data.foto);
                $("#edit_perkembangan_file").attr('src', data.file);
                $("#edit_perkembangan_rehabilitasi_id").val(data.id);
                if(data.file){
                    $(".edit_perkembangan_file").removeClass("d-none");
                }else{
                    $(".edit_perkembangan_file").addClass("d-none");
                }
            },
            error: function (xhr, status, error) {
                console.error(`Error: ${error}`);
                alert('Failed to fetch data. Please try again.');
            }
        });
    }

    function delete_form(id){
        Swal.fire({
            title: "Apakah anda yakin?",
            text: "akan menghapus data ini ?!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "ya, Hapus!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/rehabilitasi/perkembangan-delete/${id}`,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        Swal.fire({
                            icon    : 'success',
                            title   : 'Terhapus',
                            html    : "Data telah dihapus.",
                            showConfirmButton:  true ,
                            timer   : 1000,
                            customClass      : {
                                container: 'swal-container'
                            }
                        }).then(function() {
                            load_this_data();
                        });
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            title: "Error!",
                            text: "Failed to delete the file. Please try again.",
                            icon: "error"
                        });
                    }
                });
            }
        });
    }

    function generateLaporan(id){
        Swal.fire({
            title: "Apakah anda yakin?",
            text: "akan Mengenerate Laporan rehabilitasi ini  ?!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "ya, Generate!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/rehabilitasi/generate-rehabilitasi/${id}`,
                    type: 'GET',
                    success: function (data) {
                        alert(data);
                    },
                    error: function (xhr, status, error) {
                        console.error(`Error: ${error}`);
                        alert('Failed to fetch data. Please try again.');
                    }
                });
            }
        });
    }
</script>

@endsection