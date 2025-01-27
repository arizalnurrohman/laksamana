<div class="form-card text-start">
    <div class="row">
        <div class="col-7">
            <h3 class="mb-4">Intervensi PPKS:</h3>
        </div>
        <div class="col-5">
            <h2 class="steps">Step 1 - 4</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label">Komponen yang diberikan: *</label>
                <select class="form-select" name="intervensi_komponen" id="hubungan_dengan_ppks">
                    <option value="">Pilih Komponen yang diberikan</option>
                    @foreach($komponen_layanan_yang_diberikan as $klybd)
                        <option value="{{$klybd->id}}">{{$klybd->sub_kategori_assessment}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label">Uraian Komponen Layanan: *</label>
                <textarea class="form-control" name="intervensi_uraian_komponen" rows="5"></textarea>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label">Waktu Pemberian Layanan: *</label>
                <input type="date" class="form-control" name="intervensi_waktu_pemberian" placeholder="Waktu Pemberian Layanan." />
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label">Pihak yang terlibat Intervensi: *</label>
                <input type="text" class="form-control" name="intervensi_pihak_yang_terlibat" placeholder="Pihak yang terlibat Intervensi." />
            </div>
        </div>
        
        <h4>Rencana Intervensi Lanjutan (Komplementasi)</h4>
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label">Bentuk Layanan: *</label><br>
                <div class="form-check form-switch form-check-inline">
                    <input class="form-check-input" type="checkbox" name="bentuk_layanan[]" value="Bentuk Kewirausahaan" checked="">
                    <label class="pl-2 form-check-label" for="switch2">Bentuk Kewirausahaan</label>
                </div>
                <br>
                <div class="form-check form-switch form-check-inline">
                    <input class="form-check-input" type="checkbox" name="bentuk_layanan[]" value="Program Perbaikan Rumah melalui Rumah Usaha Sederhana" checked="">
                    <label class="pl-2 form-check-label" for="switch2">Program Perbaikan Rumah melalui Rumah Usaha Sederhana</label>
                </div>
                <br>
                <div class="form-check form-switch form-check-inline">
                    <input class="form-check-input" type="checkbox" name="bentuk_layanan[]" value="Program Keluarga Harapan" checked="">
                    <label class="pl-2 form-check-label" for="switch2">Program Keluarga Harapan</label>
                </div>
                <br>
                <div class="form-check form-switch form-check-inline">
                    <input class="form-check-input" type="checkbox" name="bentuk_layanan[]" value="Bantuan dari Dana Hibah" checked="">
                    <label class="pl-2 form-check-label" for="switch2">Bantuan dari Dana Hibah</label>
                </div>
                <br>
                <div class="form-check form-switch form-check-inline">
                    <input class="form-check-input" type="checkbox" name="bentuk_layanan[]" value="Pemberian Alat Bantu" checked="">
                    <label class="pl-2 form-check-label" for="switch2">Pemberian Alat Bantu</label>
                </div>
                <br>
                <div class="form-check form-switch form-check-inline">
                    <input class="form-check-input" type="checkbox" name="bentuk_layanan[]" value="Pelatihan Keterampilan Kerja" checked="">
                    <label class="pl-2 form-check-label" for="switch2">Pelatihan Keterampilan Kerja</label>
                </div>
                <br>
                <div class="form-check form-switch form-check-inline">
                    <input class="form-check-input" type="checkbox" name="bentuk_layanan[]" value="Lainnya" checked="">
                    <label class="pl-2 form-check-label" for="switch2">Lainnya</label>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label">Rekomendasi catatan Petugas: *</label>
                <textarea class="form-control" name="rekomendasi_catatan" rows="5"></textarea>
            </div>
        </div>

        
    </div>
</div>