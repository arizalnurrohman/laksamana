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
                <label class="form-label"><strong>{{$kondisi['combo_box']}}</strong> *</label>
                {{-- <input type="text" class="form-control" name="fname" placeholder="Nama Lengkap" /> --}}
                <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" value="{{$kondisi['value']}}"/>
            </div>
        </div>
        @endforeach
        
        @php
        use Illuminate\Support\Str;
        @endphp
        @foreach($assessement_form as $assessement)
        <h4>{{$assessement->assessment}}</h4>
            @foreach($assessement->child as $childx)
                    @php
                    $variable = str_replace("-","_",Str::slug($childx->sub_kategori_assessment));
                @endphp
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-label"><strong>{{$childx->sub_kategori_assessment}}</strong> *</label>
                        {{-- <input type="text" class="form-control" name="fname" placeholder="Nama Lengkap" /> --}}
                        
                        @if(count($childx->option)>0)
                            @if($childx->type_form =="checkbox")
                                @foreach($childx->option as $optionx)
                                <br>
                                <div class="form-check form-switch form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="assessment[{{$assessement->id}}][{{$childx->id}}][]" value="{{$optionx->id}}" checked="">
                                    <label class="pl-2 form-check-label" for="switch2">{{$optionx->sub_kategori_assessment}}</label>
                                </div>
                            @endforeach
                            @else
                                <select class="form-select" name="assessment[{{$assessement->id}}][{{$childx->id}}]" id="{{$variable}}">
                                    <option value="">Pilih {{$childx->sub_kategori_assessment}}</option>
                                    @foreach($childx->option as $optionx)
                                        <option value="{{$optionx->id}}">{{$optionx->sub_kategori_assessment}}</option>
                                    @endforeach
                                </select>
                            @endif
                        @else
                            @if($childx->type_form=="file")
                            <input type="file" class="form-control" name="assessment[{{$assessement->id}}][{{$childx->id}}]"/>
                            @elseif($childx->type_form=="textarea")
                                <textarea class="form-control" name="assessment[{{$assessement->id}}][{{$childx->id}}]" rows="5"></textarea>
                            @else
                                <input type="text" class="form-control" name="assessment[{{$assessement->id}}][{{$childx->id}}]" placeholder="{{$childx->sub_kategori_assessment}}"/>
                            @endif
                        @endif
                    </div>
                </div>
            @endforeach
        @endforeach


        <div class="col-md-12">
            <div class="form-group">
                <label class="form-label"><strong>Komponen Layanan yang dibutuhkan</strong> *</label>
                @foreach($komponen_intervensi as $komponen_intervensix)
                    <br>    
                    <div class="form-check form-switch">
                        <input class="form-check-input checkbox-layanan" type="checkbox" name="komponen_intervensi[pilihan][value]" value="{{$komponen_intervensix->id}}">
                        <label class="pl-2 form-check-label" for="switch2">{{$komponen_intervensix->nama_komponen}}</label>
                        <textarea class="textarea-{{$komponen_intervensix->id}}" rows="5" name="komponen_intervensi[pilihan][rincian]" style="display: none; width: 100%; margin-top: 5px;" placeholder="Tambahkan keterangan {{$komponen_intervensix->nama_komponen}}..."></textarea>
                    </div>
                    
                @endforeach
            </div>
        </div>
        


        
        {{-- <div class="col-md-12">
            <div class="form-group">
                <label class="form-label">Uraian Komponen Layanan: *</label>
                <textarea class="form-control" name="uraian_komponen_layanan" rows="5"></textarea>
            </div>
        </div> --}}

    </div>
</div>