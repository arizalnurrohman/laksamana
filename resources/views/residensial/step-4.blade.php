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
                <img id="fotoPasien" src="https://dummyimage.com/200x200/cccccc/ffffff" width="200px">
            </div>
            <div class="form-group">
                <label class="form-label" for="kategori_ppks">Akte Kelahiran</label>
                <iframe 
                    id="iframeAkte" 
                    src="https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf" 
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
                    src="https://www.w3.org/WAI/ER/tests/xhtml/testfiles/resources/pdf/dummy.pdf" 
                    class="w-100 border rounded" 
                    style="height: 400px;" 
                    allowfullscreen 
                    title="PDF Viewer">
                </iframe>
            </div>
            
            <div class="form-group">
                <label class="form-label" for="kategori_ppks">Dokumen Rujukan</label>
                <div class="custom-dropzone" onclick="document.getElementById('fileInput').click();">
                    <p class="text-secondary">Drag & drop files here or click to select files</p>
                    <input type="file" id="fileInput" multiple accept=".jpg,.jpeg,.png,.pdf" onchange="handleFileUpload(event)">
                </div>
                <div class="file-list" id="fileList"></div>
            </div>
        </div>
        
    </div>    
</div>