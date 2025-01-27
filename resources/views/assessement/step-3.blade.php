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
                        <label class="form-label">{{$childx->sub_kategori_assessment}} *</label>
                        {{-- <input type="text" class="form-control" name="fname" placeholder="Nama Lengkap" /> --}}
                        
                        @if(count($childx->option)>0)
                            <select class="form-select" name="assessment[{{$assessement->id}}][{{$childx->id}}]" id="{{$variable}}">
                                <option value="">Pilih {{$childx->sub_kategori_assessment}}</option>
                                @foreach($childx->option as $optionx)
                                    <option value="{{$optionx->id}}">{{$optionx->sub_kategori_assessment}}</option>
                                @endforeach
                            </select>
                        @else
                            @if($childx->type_form=="file")
                            <input type="file" class="form-control" name="assessment[{{$assessement->id}}][{{$childx->id}}]"/>
                            @else
                                <input type="text" class="form-control" name="assessment[{{$assessement->id}}][{{$childx->id}}]" placeholder="{{$childx->sub_kategori_assessment}}"/>
                            @endif
                        @endif
                    </div>
                </div>
            @endforeach
        @endforeach
    </div>
</div>