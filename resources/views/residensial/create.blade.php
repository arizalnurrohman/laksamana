@extends('layout.master')
@section('add-css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
<div class="row">                
    <div class="col-sm-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Simple Wizard</h4>
            </div>
            </div>
            <div class="card-body">
            <form id="form-wizard1" class="mt-3 text-center" action="{{route('residensial.store')}}">
                @csrf
                <ul id="top-tab-list" class="p-0 row list-inline">
                    <li class="mb-2 col-lg-3 col-md-6 text-start active" id="account">
                        <a href="javascript:void(0);">
                            <div class="iq-icon me-3">
                                <svg class="icon-20 svg-icon" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path opacity="0.4" d="M8.23918 8.70907V7.36726C8.24934 5.37044 9.92597 3.73939 11.9989 3.73939C13.5841 3.73939 15.0067 4.72339 15.5249 6.19541C15.6976 6.65262 16.2057 6.89017 16.663 6.73213C16.8865 6.66156 17.0694 6.50253 17.171 6.29381C17.2727 6.08508 17.293 5.84654 17.2117 5.62787C16.4394 3.46208 14.3462 2 11.9786 2C8.95048 2 6.48126 4.41626 6.46094 7.38714V8.91084L8.23918 8.70907Z" fill="currentColor"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.7688 8.71118H16.2312C18.5886 8.71118 20.5 10.5808 20.5 12.8867V17.8246C20.5 20.1305 18.5886 22.0001 16.2312 22.0001H7.7688C5.41136 22.0001 3.5 20.1305 3.5 17.8246V12.8867C3.5 10.5808 5.41136 8.71118 7.7688 8.71118ZM11.9949 17.3286C12.4928 17.3286 12.8891 16.941 12.8891 16.454V14.2474C12.8891 13.7703 12.4928 13.3827 11.9949 13.3827C11.5072 13.3827 11.1109 13.7703 11.1109 14.2474V16.454C11.1109 16.941 11.5072 17.3286 11.9949 17.3286Z" fill="currentColor"></path>
                                </svg>
                            </div>
                            <span class="dark-wizard">Residensial</span>
                        </a>
                    </li>
                    <li id="personal" class="mb-2 col-lg-3 col-md-6 text-start">
                        <a href="javascript:void(0);">
                            <div class="iq-icon me-3">
                                <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.997 15.1746C7.684 15.1746 4 15.8546 4 18.5746C4 21.2956 7.661 21.9996 11.997 21.9996C16.31 21.9996 19.994 21.3206 19.994 18.5996C19.994 15.8786 16.334 15.1746 11.997 15.1746Z" fill="currentColor"></path>
                                    <path opacity="0.4" d="M11.9971 12.5838C14.9351 12.5838 17.2891 10.2288 17.2891 7.29176C17.2891 4.35476 14.9351 1.99976 11.9971 1.99976C9.06008 1.99976 6.70508 4.35476 6.70508 7.29176C6.70508 10.2288 9.06008 12.5838 11.9971 12.5838Z" fill="currentColor"></path>
                                </svg>
                            </div>
                            <span class="dark-wizard">Data Pasien</span>
                        </a>
                    </li>
                    <li id="payment" class="mb-2 col-lg-3 col-md-6 text-start">
                        <a href="javascript:void(0);">
                            <div class="iq-icon me-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon-20" width="20" viewBox="0 0 24 24" fill="none">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.71 10.0721C16.71 10.5716 17.11 10.9711 17.61 10.9711C18.11 10.9711 18.52 10.5716 18.52 10.0721C18.52 9.57269 18.11 9.16315 17.61 9.16315C17.11 9.16315 16.71 9.57269 16.71 10.0721ZM14.77 16.1054C14.06 16.8146 13.08 17.2542 12 17.2542C10.95 17.2542 9.97 16.8446 9.22 16.1054C8.48 15.3563 8.07 14.3774 8.07 13.3285C8.06 12.2897 8.47 11.3108 9.21 10.5616C9.96 9.81243 10.95 9.40288 12 9.40288C13.05 9.40288 14.04 9.81243 14.78 10.5516C15.52 11.3008 15.93 12.2897 15.93 13.3285C15.92 14.4173 15.48 15.3962 14.77 16.1054ZM12 10.9012C11.35 10.9012 10.74 11.1509 10.27 11.6204C9.81 12.0799 9.56 12.6892 9.57 13.3185V13.3285C9.57 13.9778 9.82 14.5871 10.28 15.0466C10.74 15.5061 11.35 15.7558 12 15.7558C13.34 15.7558 14.42 14.667 14.43 13.3285C14.43 12.6792 14.18 12.0699 13.72 11.6104C13.26 11.1509 12.65 10.9012 12 10.9012Z" fill="currentColor"/>
                                    <path opacity="0.4" d="M17.44 6.2364L17.34 6.01665C17.07 5.44728 16.76 4.78801 16.57 4.40844C16.11 3.50943 15.32 3.00999 14.35 3H9.64C8.67 3.00999 7.89 3.50943 7.43 4.40844C7.23 4.80799 6.89 5.52719 6.61 6.11654L6.55 6.2364C6.52 6.31632 6.44 6.35627 6.36 6.35627C3.95 6.35627 2 8.3141 2 10.7114V16.6448C2 19.0422 3.95 21 6.36 21H17.64C20.04 21 22 19.0422 22 16.6448V10.7114C22 8.3141 20.04 6.35627 17.64 6.35627C17.55 6.35627 17.48 6.30633 17.44 6.2364Z" fill="currentColor"/>
                                </svg>
                            </div>
                            <span class="dark-wizard">PPKS</span>
                        </a>
                    </li>
                    <li id="confirm" class="mb-2 col-lg-3 col-md-6 text-start">
                        <a href="javascript:void(0);">
                            <div class="iq-icon me-3">
                                <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <span class="dark-wizard">Finish</span>
                        </a>
                    </li>
                </ul>
                <!-- fieldsets -->
                <fieldset>
                    @include('residensial.step-1')
                    <button type="button" name="next" class="btn btn-primary next action-button float-end" value="Next" >Next</button>
                </fieldset>
                <fieldset>
                    @include('residensial.step-2')
                    <button type="button" name="next" class="btn btn-primary next action-button float-end" value="Next" >Next</button>
                    <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-end me-1" value="Previous" >Previous</button>
                </fieldset>
                <fieldset>
                    @include('residensial.step-3')
                    <button type="submit" name="next" class="btn btn-primary  action-button float-end" value="Submit" >Submit</button>
                    <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-end me-1" value="Previous" >Previous</button>
                </fieldset>
                <fieldset>
                    @include('residensial.step-4')
                </fieldset>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('add-js')
<script src="{{ url('assets/js/plugins/form-wizard.js') }}" defer></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        //add{{ $activeMenu->access }}Form
        $('#pilih-pasien').select2({
            placeholder: "Pilih Pasien",
            allowClear: true
        });
        $("#form-wizard1").submit(function(e){
          e.preventDefault(); 
            var btnx	=$('.btn-submit');
            $(btnx).attr("disabled", true);
            $(btnx).attr({type:'submit',value: 'Loading'});
            $.ajax({
              url:$(this).closest('form').attr('action'),
              type:"post",
              data:new FormData(this), 
              processData:false,
              contentType:false,
              dataType: "json",
              cache:false,
              async:false,
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              },
              success: function(data){
                  if($.isEmptyObject(data.errors)){
                    Swal.fire({
                        icon    : 'success',
                        title   : 'Berhasil',
                        html    : data.message,
                        showConfirmButton:  true ,
                        timer   : 1000,
                        customClass      : {
                            container: 'swal-container'
                        }
                    }).then(function() {
                        window.location = "{{ route('pasien') }}";
                    });
                  }else{
                    $(btnx).removeAttr("disabled");
                    $(btnx).attr({type:'submit',value: 'Simpan'});
                    Swal.fire({
                        icon    : 'error',
                        title   : 'Gagal',
                        html    : data.message,
                        showConfirmButton:  true ,
                        timer   : 1000,
                        customClass      : {
                            container: 'swal-container'
                        }
                    }).then(function() {
                       
                    });
                  }
              },
              error: function(err, exception) {
                $(btnx).removeAttr("disabled");
                $(btnx).attr({type:'submit',value: 'Simpan'});

                Swal.fire({
                        icon    : 'error',
                        title   : 'Gagal',
                        html    : "Sistem Gagal Memproses Data",
                        showConfirmButton:  true ,
                        timer   : 1000,
                        customClass      : {
                            container: 'swal-container'
                        }
                    }).then(function() {
                       
                    });
              },
            });
        });		
    });

    
    $(document).ready(function () {
        $('#pilih-pasien').change(function () {
            // Trigger on selecting a patient
            $('.pilih_pasien').click(function () {
                const pasienId = $('#pilih-pasien').val(); // Get selected pasien ID
                if (pasienId) {
                    $.ajax({
                        url: '/residensial/get-pasien/' + pasienId, // Call the route
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            if (data) {
                                // Fill in the form fields with returned data
                                $('input[name="nik"]').val(data.nik || '');
                                $('input[name="nokk"]').val(data.nokk || '');
                                $('input[name="tmp_lahir"]').val(data.tmp_lahir || '');
                                $('input[name="tgl_lahir"]').val(data.tgl_lahir || '');
                                $('input[name="usia"]').val(data.usia || '');
                                $('input[name="provinsi"]').val(data.provinsi || '');
                                $('input[name="kabupaten"]').val(data.kabupaten || '');
                                $('input[name="kecamatan"]').val(data.kecamatan || '');
                                $('input[name="kelurahan"]').val(data.kelurahan || '');
                                $('textarea[name="alamat"]').val(data.alamat || '');
                                $('textarea[name="domisili"]').val(data.domisili || '');
                                $('input[name="agama"]').val(data.agama || '');
                                $('input[name="pendidikan"]').val(data.pendidikan || '');
                            } else {
                                alert('Data pasien tidak ditemukan.');
                            }
                        },
                        error: function () {
                            alert('Terjadi kesalahan. Silakan coba lagi.');
                        }
                    });
                } else {
                    alert('Pilih pasien terlebih dahulu.');
                }
            });
        });

        $('#kategori_ppks').change(function () {
            const kategoriId = $(this).val(); // Ambil ID dari kategori yang dipilih

            if (kategoriId) {
                $.ajax({
                    url: '/residensial/get-ppks/' + kategoriId, // Endpoint dengan ID kategori
                    type: 'GET',
                    dataType: 'json',
                    success: function (data) {
                        if (data.success) {
                            $('.pilihan_lanjutan').removeClass('d-none');
                            $('.pilihan_lanjutan').empty();
                            data.sub_kategori.forEach(function (item) {
                                var html_sub_kategori ='<div class="form-group">' +
                                                            '<label class="form-label" for="kategori_ppks">'+item.sub_kategori_ppks+'</label>';
                                                            if (item.option && item.option.length > 0) {
                                                                html_sub_kategori+='<select class="form-select" data-trigger name="'+item.variable_form+'" id="'+item.variable_form+'">';
                                                                        html_sub_kategori+='<option value="">Pilih '+item.sub_kategori_ppks+'</option>';
                                                                        item.option.forEach(function (itemx) {
                                                                            html_sub_kategori+='<option value="'+itemx.id+'">'+itemx.sub_kategori_ppks+'</option>';
                                                                        });
                                                                html_sub_kategori+='</select>';
                                                            }else{
                                                                html_sub_kategori+='<input type="text" class="form-control" name="'+item.variable_form+'" placeholder="'+item.sub_kategori_ppks+'" />';
                                                            }

                                                        html_sub_kategori+='</div>';

                                    $('.pilihan_lanjutan').append(html_sub_kategori);
                            });
                        } else {
                            $('.pilihan_lanjutan').addClass('d-none');
                            alert('Data tidak ditemukan.');
                        }
                    },
                    error: function () {
                        alert('Terjadi kesalahan. Silakan coba lagi.');
                    }
                });
            } else {
                // Jika tidak ada kategori yang dipilih, kosongkan dropdown sub kategori
                $('#sub_kategori_ppks').empty();
                $('#sub_kategori_ppks').append('<option value="">Pilih Sub Kategori</option>');
            }
        });

    });



    // (function() {
    //     "use strict";
    //     /*--------------single----------------*/
    //     $(".select2-basic-single").select2({
    //         dropdownParent: $('.modal')
    //     });

    //     /*--------------jomblo----------------*/
    //     $("select#instansi").select2({
    //         dropdownParent: $('#modalCek')
    //     });

    //     /*--------------tags----------------*/
    //     $(".select2-basic-single-tag").select2({
    //         tags: true
    //     });

    //     /*--------------multiple----------------*/
    //     $(".select2-basic-multiple").select2();

    //     /*--------------disble----------------*/
    //     var $disabledResults = $(".select2-disabled ");
    //     $disabledResults.select2();

    //     /*--------------placeholder----------------*/
    //     $('.select2-placeholder').select2({
    //         placeholder: "Select a State",
    //         allowClear: true
    //     });
    //     /*--------------maximum num----------------*/
    //     $(".select2-multiple-limit").select2({
    //         maximumSelectionLength: 3
    //     });

    //     /*--------------theme----------------*/
    //     $(".select2-theme-single").select2({
    //         theme: "classic"
    //     });
    //     /*--------------select 2----------------*/
    //     $(".select2-option-creation").select2({
    //         tags: true
    //     });
    //     /*--------------select 2 automatic----------------*/
    //     $(".select2-automatic-tokenizer").select2({
    //         tags: true,
    //         tokenSeparators: [',', ' ']
    //     })
    // })();
</script>
@endsection