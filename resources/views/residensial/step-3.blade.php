<div class="form-card text-start">
    <div class="row">
        <div class="col-7">
            <h3 class="mb-4">PPKS:</h3>
        </div>
        <div class="col-5">
            <h2 class="steps">Langkah  3 dari 4</h2>
        </div>
    </div>
    <div class="row" id="step-3-lanjutan">
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label" for="kategori_ppks">kategori PPKS</label>
                <select class="form-select" data-trigger name="kategori_ppks" id="kategori_ppks">
                    <option value="">Pilih Kategori PPKS</option>
                    @foreach($kategori as $kategorix)
                        <option value="{{$kategorix->id}}">{{$kategorix->kategori}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-12 pilihan_lanjutan d-none">
        </div>
        <div class="col-md-12 pilihan_lanjutan_combo d-none">
        </div>
    </div>
</div>