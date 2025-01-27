<div class="form-card text-start">
    <div class="row">
        <div class="col-7">
            <h3 class="mb-4">Informasi Pengampu:</h3>
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
                <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" />
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
                <label class="form-label">No HP: *</label>
                <input type="text" class="form-control" name="nohp" placeholder="No HP." />
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label" for="agama">Agama:</label>
                <select class="form-select" name="agama" id="agama">
                    <option value="">Pilih Agama</option>
                    @foreach($agama as $agamax)
                        <option value="{{$agamax->id}}">{{$agamax->agama}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label" for="pendidikan_terakhir">Pendidikan Terakhir:</label>
                <select class="form-select" name="pendidikan_terakhir" id="pendidikan_terakhir">
                    <option value="">Pilih Pendidikan</option>
                    @foreach($pendidikan as $pendidikanx)
                        <option value="{{$pendidikanx->id}}">{{$pendidikanx->pendidikan}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Hubungan dengan PPKS: *</label>
                <select class="form-select" name="hubungan_dengan_ppks" id="hubungan_dengan_ppks">
                    <option value="">Pilih Hubungan dengan PPKS</option>
                    <option value="{{$pendidikanx->id}}">{{$pendidikanx->pendidikan}}</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Apakah sudah masuk DTKS: *</label>
                <select class="form-select" name="hubungan_dengan_ppks" id="hubungan_dengan_ppks">
                    <option value="">Pilih Apakah sudah masuk DTKS</option>
                    <option value="{{$pendidikanx->id}}">{{$pendidikanx->pendidikan}}</option>
                </select>
            </div>
        </div>


        {{--  --}}
        
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
        {{--  --}}

        
        
    </div>
</div>