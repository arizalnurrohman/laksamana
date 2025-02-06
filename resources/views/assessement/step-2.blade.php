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
                <input type="text" class="form-control" name="pengampu_nama" placeholder="Nama Lengkap" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">NIK: *</label>
                <input type="text" class="form-control" name="pengampu_nik" placeholder="NIK" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">NO KK: *</label>
                <input type="text" class="form-control" name="pengampu_nokk" placeholder="NO KK." />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Tempat Lahir: *</label>
                <input type="text" class="form-control" name="pengampu_tmp_lahir" placeholder="Tempat Lahir." />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Tanggal Lahir: *</label>
                <input type="text" class="form-control" name="pengampu_tgl_lahir" placeholder="Tanggal Lahir." />
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label">No HP: *</label>
                <input type="text" class="form-control" name="pengampu_nohp" placeholder="No HP." />
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label" for="agama">Agama:</label>
                <select class="form-select" name="pengampu_agama" id="agama">
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
                <select class="form-select" name="pengampu_pendidikan_terakhir" id="pendidikan_terakhir">
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
                <select class="form-select" name="pengampu_hubungan_dengan_ppks" id="pengampu_hubungan_dengan_ppks">
                    <option value="">Pilih Hubungan dengan PPKS</option>
                    <option value="Ayah">Ayah</option>
                    <option value="Ibu">Ibu</option>
                    <option value="Kakek">Kakek</option>
                    <option value="Nenek">Nenek</option>
                    <option value="Saudara Kandung">Saudara Kandung</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Apakah sudah masuk DTKS: *</label>
                <select class="form-select" name="pengampu_apakah_sudah_masuk_dtks" id="pengampu_apakah_sudah_masuk_dtks">
                    <option value="">Pilih Apakah sudah masuk DTKS</option>
                    <option value="Belum">Belum</option>
                    <option value="Sudah">Sudah</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Bantuan yang sudah diterima saat ini: *</label>
                <select class="form-select" name="pengampu_bantuan_yang_sudah_diterima" id="pengampu_bantuan_yang_sudah_diterima">
                    <option value="">Pilih Bantuan yang sudah diterima</option>
                    @foreach($bantuan as $bantuanx)
                        <option value="{{$bantuanx->id}}">{{$bantuanx->jenis_bantuan}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Status Kawin: *</label>
                <select class="form-select" name="pengampu_status_kawin" id="pengampu_status_kawin">
                    <option value="">Pilih Status Kawin</option>
                    <option value="Belum Kawin">Belum Kawin</option>
                    <option value="Kawin">Kawin</option>
                    <option value="Cerai Hidup">Cerai Hidup</option>
                    <option value="Cerai Mati">Cerai Mati</option>
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label">Pekerjaan: *</label>
                <input type="text" class="form-control" name="pengampu_pekerjaan" placeholder="Pekerjaan." />
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label">Pengeluaran per Bulan: *</label>
                <input type="text" class="form-control" name="pengampu_pengeluaran_per_bulan" placeholder="Pengeluaran per Bulan." />
            </div>
        </div>
        
    </div>
</div>