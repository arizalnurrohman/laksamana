<div class="form-card text-start">
    <div class="row">
        <div class="col-7">
            <h3 class="mb-4">Assessement PPKS:</h3>
        </div>
        <div class="col-5">
            <h2 class="steps">Step 3 - 4</h2>
        </div>
    </div>
    <div class="row">
        @foreach($residensial->kondisi_ppks as $kondisi)
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label">{{$kondisi['combo_box']}} *</label>
                {{-- <input type="text" class="form-control" name="fname" placeholder="Nama Lengkap" /> --}}
                <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" value="{{$kondisi['value']}}"/>
            </div>
        </div>
        @endforeach
        
        <h4>asdasd</h4>
    </div>
</div>