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
<form action="{{ route('pasien.store') }}" method="POST" enctype="multipart/form-data" id="add{{ $activeMenu->access }}Form">
    <div class="row">
        <!-- Foto & Dokumen Section -->
        <div class="col-xl-3 col-lg-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Foto & Dokumen</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="form-group text-center">
                        <div class="profile-img-edit position-relative">
                            <img src="../../assets/images/avatars/01.png" alt="profile-pic" class="theme-color-default-img profile-pic rounded avatar-100" loading="lazy">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="foto">Upload Foto</label>
                        <div class="custom-dropzone" onclick="document.getElementById('fileInputFoto').click();">
                            <p class="text-secondary">Drag & drop files here or click to select files</p>
                            <input type="file" id="fileInputFoto" name="foto" accept=".jpg,.jpeg,.png,.pdf" onchange="handleFileUpload(event)">
                        </div>
                        <div class="file-list" id="fileListFoto"></div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="kk">Upload KK</label>
                        <div class="custom-dropzone" onclick="document.getElementById('fileInputKK').click();">
                            <p class="text-secondary">Drag & drop files here or click to select files</p>
                            <input type="file" id="fileInputKK" name="kk" accept=".jpg,.jpeg,.png,.pdf" onchange="handleFileUpload(event)">
                        </div>
                        <div class="file-list" id="fileListKK"></div>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="akte_kelahiran">Upload Akte Kelahiran</label>
                        <div class="custom-dropzone" onclick="document.getElementById('fileInputAkte').click();">
                            <p class="text-secondary">Drag & drop files here or click to select files</p>
                            <input type="file" id="fileInputAkte" name="akte_kelahiran" accept=".jpg,.jpeg,.png,.pdf" onchange="handleFileUpload(event)">
                        </div>
                        <div class="file-list" id="fileListAkte"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Data Pasien Section -->
        <div class="col-xl-9 col-lg-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Tambah data {{ $activeMenu->menu }}</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="new-user-info">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label" for="nama_depan">Nama Depan:</label>
                                <input type="text" class="form-control" name="nama_depan" id="nama_depan" placeholder="Nama Depan">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="nama_belakang">Nama Belakang:</label>
                                <input type="text" class="form-control" name="nama_belakang" id="nama_belakang" placeholder="Nama Belakang">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="nik">NIK:</label>
                                <input type="text" class="form-control" name="nik" id="nik" placeholder="NIK">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="nokk">No KK:</label>
                                <input type="text" class="form-control" name="nokk" id="nokk" placeholder="No KK">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="tmp_lahir">Tempat Lahir:</label>
                                <input type="text" class="form-control" name="tmp_lahir" id="tmp_lahir" placeholder="Tempat Lahir">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="tgl_lahir">Tanggal Lahir:</label>
                                <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="Tanggal Lahir">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="agama">Agama:</label>
                                <select class="form-select" name="agama" id="agama">
                                    <option value="">Pilih Agama</option>
                                    @foreach($agama as $agamax)
                                        <option value="{{$agamax->id}}">{{$agamax->agama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="pendidikan_terakhir">Pendidikan Terakhir:</label>
                                <select class="form-select" name="pendidikan_terakhir" id="pendidikan_terakhir">
                                    <option value="">Pilih Pendidikan</option>
                                    @foreach($pendidikan as $pendidikanx)
                                        <option value="{{$pendidikanx->id}}">{{$pendidikanx->pendidikan}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="form-label">Alamat KTP: *</label>
                                <textarea class="form-control" name="alamat_ktp" rows="5"></textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="form-label">Alamat Domisili: *</label>
                                <textarea class="form-control" name="alamat_domisili" rows="5"></textarea>
                                <div class="form-check d-block">
                                    <input class="form-check-input" type="checkbox" value="1" name="check_alamat_domisili" id="checkedcheck">
                                    <label class="form-check-label" for="checkedcheck">
                                        Sama dengan Alamat KTP
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="provinsi">Provinsi:</label>
                                <select class="form-select" name="provinsi" id="provinsi">
                                    <option value="">Pilih Provinsi</option>
                                    @foreach($provinsi as $provinsix)
                                        <option value="{{$provinsix->id}}">{{$provinsix->provinsi}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="kabupaten_kota">Kabupaten / Kota:</label>
                                <select class="form-select" name="kabupaten_kota" id="kabupaten_kota">
                                    <option value="">Pilih Kabupaten</option>
                                    @foreach($kabupaten as $kabupatenx)
                                        <option value="{{$kabupatenx->id}}">{{$kabupatenx->kabupaten_kota}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="kecamatan">Kecamatan:</label>
                                <select class="form-select" name="kecamatan" id="kecamatan">
                                    <option value="">Pilih Kecamatan</option>
                                    @foreach($kecamatan as $kecamatanx)
                                        <option value="{{$kecamatanx->id}}">{{$kecamatanx->kecamatan}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="kelurahan">Kelurahan:</label>
                                <input type="text" class="form-control" name="kelurahan" id="kelurahan" placeholder="Kelurahan">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-submit">Tambah Data @if ($activeMenu) {{ $activeMenu->menu }} @endif</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

 
@endsection
@section('add-js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {
        //add{{ $activeMenu->access }}Form
        $("#add{{ $activeMenu->access }}Form").submit(function(e){
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
                        window.location = "{{ route('pasien') }}";
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
    const fileList = document.getElementById('fileList');

    function handleFileUpload(event) {
        const files = event.target.files;
        fileList.innerHTML = ''; // Clear previous file list

        Array.from(files).forEach((file, index) => {
            const fileItem = document.createElement('div');
            fileItem.className = 'file-list-item';
            fileItem.innerHTML = `
                <span>${file.name}</span>
                <button onclick="removeFile(${index})">&times;</button>
            `;
            fileList.appendChild(fileItem);
        });
    }

    function removeFile(index) {
        const files = Array.from(document.getElementById('fileInput').files);
        files.splice(index, 1);

        // Create a new file list and set it back to the input
        const dataTransfer = new DataTransfer();
        files.forEach(file => dataTransfer.items.add(file));
        document.getElementById('fileInput').files = dataTransfer.files;

        // Refresh the displayed file list
        handleFileUpload({ target: { files: dataTransfer.files } });
    }
</script>
@endsection