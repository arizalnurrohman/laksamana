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
                <input type="text" class="form-control" name="pengampu_nama" placeholder="Nama Lengkap" value="{{isset($pengampu->nama_pengampu) ? $pengampu->nama_pengampu : ''}}"/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">NIK: *</label>
                <input type="text" class="form-control" name="pengampu_nik" placeholder="NIK"  value="{{isset($pengampu->nik) ? $pengampu->nik : ''}}" maxlength="18"/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">NO KK: *</label>
                <input type="text" class="form-control" name="pengampu_nokk" placeholder="NO KK."  value="{{isset($pengampu->nokk) ? $pengampu->nokk : ''}}" maxlength="18"/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Tempat Lahir: *</label>
                <input type="text" class="form-control" name="pengampu_tmp_lahir" placeholder="Tempat Lahir."  value="{{isset($pengampu->tmp_lahir) ? $pengampu->tmp_lahir : ''}}"/>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Tanggal Lahir: *</label>
                <input type="date" class="form-control" name="pengampu_tgl_lahir" placeholder="Tanggal Lahir."  value="{{isset($pengampu->tgl_lahir) ? $pengampu->tgl_lahir : ''}}"/> 
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label">No HP: *</label>
                <input type="text" class="form-control" name="pengampu_nohp" placeholder="No HP."  value="{{isset($pengampu->nohp) ? $pengampu->nohp : ''}}"/>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label" for="agama">Agama:</label>
                <select class="form-select" name="pengampu_agama" id="agama">
                    <option value="">Pilih Agama</option>
                    @foreach($agama as $agamax)
                        <option value="{{$agamax->id}}" @if(isset($pengampu->agama_id)) @if($pengampu->agama_id==$agamax->id) selected="Selected" @endif @endif>{{$agamax->agama}}</option>
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
                        <option value="{{$pendidikanx->id}}" @if(isset($pengampu->agama_id)) @if($pengampu->pendidikan_id==$pendidikanx->id) selected="Selected" @endif @endif>{{$pendidikanx->pendidikan}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Hubungan dengan PPKS: *</label>
                <select class="form-select" name="pengampu_hubungan_dengan_ppks" id="pengampu_hubungan_dengan_ppks">
                    <option value="">Pilih Hubungan dengan PPKS</option>
                    <option value="Ayah" @if(isset($pengampu->hubungan_dengan_ppks)) @if($pengampu->hubungan_dengan_ppks=="Ayah") selected="Selected" @endif @endif>Ayah</option>
                    <option value="Ibu" @if(isset($pengampu->hubungan_dengan_ppks)) @if($pengampu->hubungan_dengan_ppks=="Ibu") selected="Selected" @endif @endif>Ibu</option>
                    <option value="Kakek" @if(isset($pengampu->hubungan_dengan_ppks)) @if($pengampu->hubungan_dengan_ppks=="Kakek") selected="Selected" @endif @endif>Kakek</option>
                    <option value="Nenek" @if(isset($pengampu->hubungan_dengan_ppks)) @if($pengampu->hubungan_dengan_ppks=="Nenek") selected="Selected" @endif @endif>Nenek</option>
                    <option value="Saudara Kandung" @if(isset($hubungan_dengan_ppks->agama_id)) @if($pengampu->hubungan_dengan_ppks=="Saudara Kandung") selected="Selected" @endif @endif>Saudara Kandung</option>
                    <option value="Lainnya" @if(isset($pengampu->hubungan_dengan_ppks)) @if($pengampu->hubungan_dengan_ppks=="Lainnya") selected="Selected" @endif @endif>Lainnya</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Apakah sudah masuk DTKS: *</label>
                <select class="form-select" name="pengampu_apakah_sudah_masuk_dtks" id="pengampu_apakah_sudah_masuk_dtks">
                    <option value="">Pilih Apakah sudah masuk DTKS</option>
                    <option value="Belum" @if(isset($pengampu->sudah_ada_dtks)) @if($pengampu->sudah_ada_dtks=="Belum") selected="Selected" @endif @endif>Belum</option>
                    <option value="Sudah" @if(isset($pengampu->sudah_ada_dtks)) @if($pengampu->sudah_ada_dtks=="Sudah") selected="Selected" @endif @endif>Sudah</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Bantuan yang sudah diterima saat ini: *</label>
                <select class="form-select" name="pengampu_bantuan_yang_sudah_diterima" id="pengampu_bantuan_yang_sudah_diterima">
                    <option value="">Pilih Bantuan yang sudah diterima</option>
                    @foreach($bantuan as $bantuanx)
                        <option value="{{$bantuanx->id}}" @if(isset($pengampu->bantuan_saat_ini)) @if($pengampu->bantuan_saat_ini==$bantuanx->id) selected="Selected" @endif @endif>{{$bantuanx->jenis_bantuan}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Status Kawin: *</label>
                <select class="form-select" name="pengampu_status_kawin" id="pengampu_status_kawin">
                    <option value="">Pilih Status Kawin</option>
                    <option value="Belum Kawin" @if(isset($pengampu->sudah_ada_dtks)) @if($pengampu->sudah_ada_dtks=="Belum Kawin") selected="Selected" @endif @endif>Belum Kawin</option>
                    <option value="Kawin" @if(isset($pengampu->sudah_ada_dtks)) @if($pengampu->sudah_ada_dtks=="Kawin") selected="Selected" @endif @endif>Kawin</option>
                    <option value="Cerai Hidup" @if(isset($pengampu->sudah_ada_dtks)) @if($pengampu->sudah_ada_dtks=="Cerai Hidup") selected="Selected" @endif @endif>Cerai Hidup</option>
                    <option value="Cerai Mati" @if(isset($pengampu->sudah_ada_dtks)) @if($pengampu->sudah_ada_dtks=="Cerai Mati") selected="Selected" @endif @endif>Cerai Mati</option>
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label">Pekerjaan: *</label>
                <input type="text" class="form-control" name="pengampu_pekerjaan" placeholder="Pekerjaan."  value="{{isset($pengampu->pekerjaan) ? $pengampu->pekerjaan : ''}}"/>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label">Pengeluaran per Bulan: *</label>
                <input type="text" class="form-control" name="pengampu_pengeluaran_per_bulan" placeholder="Pengeluaran per Bulan."  value="{{isset($pengampu->pengeluaran_perbulan) ? $pengampu->pengeluaran_perbulan : ''}}"/>
            </div>
        </div>
        
    </div>
</div>