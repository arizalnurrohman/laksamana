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
                    <div class="input-group-btn"><button type="submit" class="btn btn-primary">Tambah</button></div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">NIK: *</label>
                <input type="text" class="form-control" name="lname" placeholder="NIK" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">NO KK: *</label>
                <input type="text" class="form-control" name="phno" placeholder="NO KK." />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Tempat Lahir: *</label>
                <input type="text" class="form-control" name="phno_2" placeholder="Tempat Lahir." />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Tanggal Lahir: *</label>
                <input type="text" class="form-control" name="phno_2" placeholder="Tanggal Lahir." />
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label">Usia: *</label>
                <input type="text" class="form-control" name="phno_2" placeholder="Usia." />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Provinsi KTP: *</label>
                <select class="form-select" data-trigger name="choices-single-default" id="choices-single-default">
                    <option value="">Pilih Provinsi</option>
                    @foreach($provinsi as $provinsix)
                        <option value="{{$provinsix->id}}">{{$provinsix->provinsi}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Kab/Kota KTP: *</label>
                <select class="form-select" data-trigger name="choices-single-default" id="choices-single-default">
                    <option value="">Pilih Kabupaten</option>
                    @foreach($kabupaten as $kabupatenx)
                        <option value="{{$kabupatenx->id}}">{{$kabupatenx->kabupaten_kota}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Kecamatan KTP: *</label>
                <select class="form-select" data-trigger name="choices-single-default" id="choices-single-default">
                    <option value="">Pilih Kecamatan</option>
                    @foreach($kecamatan as $kecamatanx)
                        <option value="{{$kecamatanx->id}}">{{$kecamatanx->kecamatan}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Kelurahan KTP: *</label>
                <input type="text" class="form-control" name="phno_2" placeholder="Kelurahan KTP." />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Alamat KTP: *</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Alamat Domisili: *</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                <div class="form-check d-block">
                    <input class="form-check-input" type="checkbox" value="" id="checkedcheck" checked>
                    <label class="form-check-label" for="checkedcheck">
                        Sama dengan Alamat KTP
                    </label>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Agama: *</label>
                <select class="form-select" data-trigger name="choices-single-default" id="choices-single-default">
                    <option value="">Pilih Agama</option>
                    @foreach($agama as $agamax)
                        <option value="{{$agamax->id}}">{{$agamax->agama}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="form-label">Pendidikan: *</label>
                <select class="form-select" data-trigger name="choices-single-default" id="choices-single-default">
                    <option value="">Pilih Pendidikan</option>
                    @foreach($pendidikan as $pendidikanx)
                        <option value="{{$pendidikanx->id}}">{{$pendidikanx->pendidikan}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        
    </div>
</div>