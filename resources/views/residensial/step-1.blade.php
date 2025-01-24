<div class="form-card text-start">
    <div class="row">
        <div class="col-7">
            <h3 class="mb-4">Account Information:</h3>
        </div>
        <div class="col-5">
            <h2 class="steps">Step 1 - 4</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label" for="petugas_penerimaan">Petugas Penerimaan</label>
                <select class="form-select" data-trigger name="residense_petugas" id="petugas_penerimaan">
                    <option value="">Pilih Petugas Penerimaan</option>
                    @foreach($petugas as $petugasx)
                        <option value="{{$petugasx->id}}">{{$petugasx->nama}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Tanggal Masuk/Penerimaan: *</label>
                <input type="date" class="form-control" name="residense_tgl_penerimaan" placeholder="UserName" />
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label">Sumber Rujukan: *</label>
                <select class="form-select" data-trigger name="residense_sumber_rujukan" id="residense_sumber_rujukan">
                    <option value="">Pilih Sumber Rujukan</option>
                    @foreach($sumber_rujukan as $sumber_rujukanx)
                        <option value="{{$sumber_rujukanx->id}}">{{$sumber_rujukanx->sumber}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>