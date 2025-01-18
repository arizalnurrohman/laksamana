<div class="form-card text-start">
    <div class="row">
        <div class="col-7">
            <h3 class="mb-4">Image Upload:</h3>
        </div>
        <div class="col-5">
            <h2 class="steps">Step 3 - 4</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label" for="choices-single-default">Petugas Penerimaan</label>
                <select class="form-select" data-trigger name="choices-single-default" id="choices-single-default">
                    <option value="">Pilih Kategori PPKS</option>
                    @foreach($kategori as $kategorix)
                        <option value="{{$kategorix->id}}">{{$kategorix->kategori}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>