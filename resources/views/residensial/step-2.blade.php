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
                {{-- <input type="text" class="form-control" name="fname" placeholder="Nama Lengkap" /> --}}
                <div class="input-group">
                    <select data-placeholder="Pilih Pasien" class="select2-basic-single js-states form-select form-control" tabindex="1" id="pilih-pasien" name="instansi" style="width: 80%;">
                        @foreach($pasien as $id => $pasienx)
                            <option value="{{ $id }}">{{ $pasienx->nama_depan." ".$pasienx->nama_belakang }}</option>
                        @endforeach
                    </select>
                    <div class="input-group-btn"><button type="button" class="btn btn-primary">Pilih Pasien</button></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">NIK: *</label>
                <input type="text" class="form-control" name="nik" placeholder="NIK" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">NO KK: *</label>
                <input type="text" class="form-control" name="nokk" placeholder="NO KK." />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Tempat Lahir: *</label>
                <input type="text" class="form-control" name="tmp_lahir" placeholder="Tempat Lahir." />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Tanggal Lahir: *</label>
                <input type="text" class="form-control" name="tgl_lahir" placeholder="Tanggal Lahir." />
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label">Usia: *</label>
                <input type="text" class="form-control" name="usia" placeholder="Usia." />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Provinsi KTP: *</label>
                <input type="text" class="form-control" name="provinsi" placeholder="Provinsi." />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Kab/Kota KTP: *</label>
                <input type="text" class="form-control" name="kabupaten" placeholder="Kabupaten / Kota." />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Kecamatan KTP: *</label>
                <input type="text" class="form-control" name="kecamatan" placeholder="Kecamatan." />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Kelurahan KTP: *</label>
                <input type="text" class="form-control" name="kelurahan" placeholder="Kelurahan KTP." />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Alamat KTP: *</label>
                <textarea class="form-control" name="alamat" rows="5"></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Alamat Domisili: *</label>
                <textarea class="form-control" name="domisili" rows="5"></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Agama: *</label>
                <input type="text" class="form-control" name="agama" placeholder="Agama." />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Pendidikan: *</label>
                <input type="text" class="form-control" name="pendidikan" placeholder="Pendidikan." />
            </div>
        </div>
        
    </div>
</div>