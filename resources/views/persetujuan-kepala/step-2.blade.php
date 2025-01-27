<div class="form-card text-start">
    <div class="row">
        <div class="col-7">
            <h3 class="mb-4">Personal Information:</h3>
        </div>
        <div class="col-5">
            <h2 class="steps">Step 2 - 4</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label">Nama Lengkap: *</label>
                <input type="text" readonly value="{{$pasien->nama_depan." ".$pasien->nama_belakang}}" class="form-control" name="nama" placeholder="Nama Lengkap" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">NIK: *</label>
                <input type="text" readonly value="{{$pasien->nik}}" class="form-control" name="nik" placeholder="NIK" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">NO KK: *</label>
                <input type="text" readonly value="{{$pasien->nokk}}" class="form-control" name="nokk" placeholder="NO KK." />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Tempat Lahir: *</label>
                <input type="text" readonly value="{{$pasien->tmp_lahir}}" class="form-control" name="tmp_lahir" placeholder="Tempat Lahir." />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Tanggal Lahir: *</label>
                <input type="text" readonly value="{{date("d-m-Y",strtotime($pasien->tgl_lahir))}}" class="form-control" name="tgl_lahir" placeholder="Tanggal Lahir." />
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label">Usia: *</label>
                <input type="text" readonly value="{{$pasien->nama_depan}}" class="form-control" name="usia" placeholder="Usia." />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Provinsi KTP: *</label>
                <input type="text" readonly value="{{$pasien->provinsi}}" class="form-control" name="provinsi" placeholder="Provinsi." />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Kab/Kota KTP: *</label>
                <input type="text" readonly value="{{$pasien->kabupaten_kota}}" class="form-control" name="kabupaten" placeholder="Kabupaten / Kota." />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Kecamatan KTP: *</label>
                <input type="text" readonly value="{{$pasien->kecamatan}}" class="form-control" name="kecamatan" placeholder="Kecamatan." />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Kelurahan KTP: *</label>
                <input type="text" readonly value="{{$pasien->keluarah_id}}" class="form-control" name="kelurahan" placeholder="Kelurahan KTP." />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Alamat KTP: *</label>
                <textarea class="form-control" name="alamat" rows="5">{{$pasien->alamat}}</textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Alamat Domisili: *</label>
                <textarea class="form-control" name="domisili" rows="5">{{$pasien->domisili}}</textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Agama: *</label>
                <input type="text" readonly value="{{$pasien->agama}}" class="form-control" name="agama" placeholder="Agama." />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Pendidikan: *</label>
                <input type="text" readonly value="{{$pasien->pendidikan}}" class="form-control" name="pendidikan" placeholder="Pendidikan." />
            </div>
        </div>
    </div>
</div>