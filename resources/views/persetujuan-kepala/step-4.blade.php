<div class="form-card  text-start">
    <div class="row">
        <div class="col-7">
            <h3 class="mb-4 text-left">Dokumen:</h3>
        </div>
        <div class="col-5">
            <h2 class="steps">Step 4 - 4</h2>
        </div>
    </div>
    <br><br>

    {{-- <h2 class="text-center text-success"><strong>SUCCESS !</strong></h2> --}}
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label" for="kategori_ppks">Foto</label>
                <br>
                <img id="fotoPasien" src="{{asset('storage/' . $pasien->up_foto)}}" width="200px">
            </div>
            <div class="form-group">
                <label class="form-label" for="kategori_ppks">Akte Kelahiran</label>
                <iframe 
                    id="iframeAkte" 
                    src="{{asset('storage/' . $pasien->up_akte_lahir)}}" 
                    class="w-100 border rounded" 
                    style="height: 400px;" 
                    allowfullscreen 
                    title="PDF Viewer">
                </iframe>
            </div>
            <div class="form-group">
                <label class="form-label" for="kategori_ppks">Kartu Keluarga</label>
                <iframe 
                    id="iframeKk" 
                    src="{{asset('storage/' . $pasien->up_akte_lahir)}}" 
                    class="w-100 border rounded" 
                    style="height: 400px;" 
                    allowfullscreen 
                    title="PDF Viewer">
                </iframe>
            </div>
            
            <div class="form-group">
                <label class="form-label" for="kategori_ppks">Dokumen Rujukan</label>
                <iframe 
                    id="iframeKk" 
                    src="{{asset('storage/' . $residensial->up_dokumen_rujukan)}}" 
                    class="w-100 border rounded" 
                    style="height: 400px;" 
                    allowfullscreen 
                    title="PDF Viewer">
                </iframe>
            </div>
        </div>
        
    </div>    
</div>