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
    <div class="col-xl-3 col-lg-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Add New User</h4>
                </div>
            </div>
                <div class="card-body">
                    <form>
                        <div class="form-group text-center">
                            <div class="profile-img-edit position-relative">
                                <img src="../../assets/images/avatars/01.png" alt="profile-pic" class="theme-color-default-img profile-pic rounded avatar-100" loading="lazy">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="kategori_ppks">Upload Foto</label>
                            <div class="custom-dropzone" onclick="document.getElementById('fileInput').click();">
                                <p class="text-secondary">Drag & drop files here or click to select files</p>
                                <input type="file" id="fileInput" multiple accept=".jpg,.jpeg,.png,.pdf" onchange="handleFileUpload(event)">
                            </div>
                            <div class="file-list" id="fileList"></div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="kategori_ppks">Upload KK</label>
                            <div class="custom-dropzone" onclick="document.getElementById('fileInput').click();">
                                <p class="text-secondary">Drag & drop files here or click to select files</p>
                                <input type="file" id="fileInput" multiple accept=".jpg,.jpeg,.png,.pdf" onchange="handleFileUpload(event)">
                            </div>
                            <div class="file-list" id="fileList"></div>
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="kategori_ppks">Upload Akte Kelahiran</label>
                            <div class="custom-dropzone" onclick="document.getElementById('fileInput').click();">
                                <p class="text-secondary">Drag & drop files here or click to select files</p>
                                <input type="file" id="fileInput" multiple accept=".jpg,.jpeg,.png,.pdf" onchange="handleFileUpload(event)">
                            </div>
                            <div class="file-list" id="fileList"></div>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    <div class="col-xl-9 col-lg-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Update data {{ $activeMenu->menu }}</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="new-user-info">
                    <form action="{{ route('pasien.update',$pasien->id) }}" method="POST" id="update{{ $activeMenu->access }}Form">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label" for="fname">Nama Depan:</label>
                                <input type="text" class="form-control" name="nama_depan" id="nama_depan" placeholder="Nama Depan" value="{{$pasien->nama_depan}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="lname">Nama Belakang:</label>
                                <input type="text" class="form-control" name="nama_belakang" id="nama_belakang" placeholder="Nama Belakang" value="{{$pasien->nama_belakang}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="add1">NIK:</label>
                                <input type="text" class="form-control" name="nik" id="nik" placeholder="NIK" value="{{$pasien->nik}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="add2">No KK:</label>
                                <input type="text" class="form-control" name="nokk" id="nokk" placeholder="No KK" value="{{$pasien->nokk}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="add1">Tempat Lahir:</label>
                                <input type="text" class="form-control" name="tmp_lahir" id="tmp_lahir" placeholder="Tempat Lahir" value="{{$pasien->tmp_lahir}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="add2">Tanggal Lahir:</label>
                                <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="Tanggal Lahir" value="{{$pasien->tgl_lahir}}">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="add1">Agama:</label>
                                <select class="form-select" data-trigger name="agama" id="choices-single-default">
                                    <option value="">Pilih Agama</option>
                                    @foreach($agama as $agamax)
                                        <option value="{{$agamax->id}}" {{$pasien->agama_id == $agamax->id ? 'selected="selected"' : ''}}>{{$agamax->agama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="add2">Pendidikan Terakhir:</label>
                                <select class="form-select" data-trigger name="pendidikan_terakhir" id="choices-single-default">
                                    <option value="">Pilih Pendidikan</option>
                                    @foreach($pendidikan as $pendidikanx)
                                        <option value="{{$pendidikanx->id}}" {{$pasien->pendidikan_id == $pendidikanx->id ? 'selected="selected"' : ''}}>{{$pendidikanx->pendidikan}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Alamat KTP: *</label>
                                    <textarea class="form-control" name="alamat_ktp" rows="5">{{$pasien->alamat}}</textarea>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="form-label">Alamat Domisili: *</label>
                                <textarea class="form-control" name="alamat_domisili" rows="5">{{$pasien->domisili}}</textarea>
                                <div class="form-check d-block">
                                    <input class="form-check-input" type="checkbox" value="1" name="check_alamat_domisili" id="checkedcheck" @if($pasien->domisili_alamat == 1) checked @endif>
                                    <label class="form-check-label" for="checkedcheck">
                                        Sama dengan Alamat KTP
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="add1">Provinsi:</label>
                                <select class="form-select" data-trigger name="provinsi" id="choices-single-default">
                                    <option value="">Pilih Provinsi</option>
                                    @foreach($provinsi as $provinsix)
                                        <option value="{{$provinsix->id}}" {{$pasien->provinsi_id == $provinsix->id ? 'selected="selected"' : ''}}>{{$provinsix->provinsi}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="add2">Kabupaten / Kota:</label>
                                <select class="form-select" data-trigger name="kabupaten_kota" id="choices-single-default">
                                    <option value="">Pilih Kabupaten</option>
                                    @foreach($kabupaten as $kabupatenx)
                                        <option value="{{$kabupatenx->id}}" {{$pasien->kota_id == $kabupatenx->id ? 'selected="selected"' : ''}}>{{$kabupatenx->kabupaten_kota}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="add2">Kecamatan:</label>
                                <select class="form-select" data-trigger name="kecamatan" id="choices-single-default">
                                    <option value="">Pilih Kecamatan</option>
                                    @foreach($kecamatan as $kecamatanx)
                                        <option value="{{$kecamatanx->id}}" {{$pasien->kecamatan_id == $kecamatanx->id ? 'selected="selected"' : ''}}>{{$kecamatanx->kecamatan}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="add2">Kelurahan:</label>
                                <input type="text" class="form-control" id="add1" name="kelurahan" placeholder="Kelurahan" value="{{$pasien->kelurahan_desa_id}}">
                            </div>
                        </div>
                        
                        {{-- <div class="checkbox">
                            <label class="form-label"><input class="form-check-input me-2" type="checkbox" value="" id="flexchexked">Enable Two-Factor-Authentication</label>
                        </div> --}}
                        <button type="submit" class="btn btn-primary btn-submit">Update Data @if ($activeMenu) {{ $activeMenu->menu }} @endif</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 
@endsection
@section('add-js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {
        //add{{ $activeMenu->access }}Form
        $("#update{{ $activeMenu->access }}Form").submit(function(e){
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