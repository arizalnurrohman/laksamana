<div class="form-card text-start">
    <div class="row">
        <div class="col-7">
            <h3 class="mb-4">PPKS:</h3>
        </div>
        <div class="col-5">
            <h2 class="steps">Step 3 - 4</h2>
        </div>
    </div>
    <div class="row" id="step-3-lanjutan">
        @foreach($residensial->kondisi_ppks as $kondisi)
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label">{{$kondisi['combo_box']}} *</label>
                {{-- <input type="text" class="form-control" name="fname" placeholder="Nama Lengkap" /> --}}
                <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" value="{{$kondisi['value']}}"/>
            </div>
        </div>
        @endforeach
        <div class="col-md-12 pilihan_lanjutan d-none">
        </div>
        <div class="col-md-12 pilihan_lanjutan_combo d-none">
        </div>
    </div>
</div>