@extends('layout.master')
@section('add-css')
    <style type="text/css">
        label.form-label{
            font-weight: bold;
        }
    </style>
@endsection
@section('content')
<div class="row">                
    <div class="col-sm-12 col-lg-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">@if ($activeMenu) {{ $activeMenu->menu }} @endif Form </h4>
            </div>
            </div>
            <div class="card-body">
            <form id="form-wizard1" class="mt-3 text-center" action="{{route('assessement.store')}}"  method="POST" enctype="multipart/form-data">
                @csrf
                <ul id="top-tab-list" class="p-0 row list-inline">
                    <input type="hidden" name="residensial_id" value="{{$residensial->id}}" id="residensial_id">
                    <li class="mb-2 col-lg-3 col-md-6 text-start active" id="account">
                        <a href="javascript:void(0);">
                            <div class="iq-icon me-3">
                                <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.997 15.1746C7.684 15.1746 4 15.8546 4 18.5746C4 21.2956 7.661 21.9996 11.997 21.9996C16.31 21.9996 19.994 21.3206 19.994 18.5996C19.994 15.8786 16.334 15.1746 11.997 15.1746Z" fill="currentColor"></path>
                                    <path opacity="0.4" d="M11.9971 12.5838C14.9351 12.5838 17.2891 10.2288 17.2891 7.29176C17.2891 4.35476 14.9351 1.99976 11.9971 1.99976C9.06008 1.99976 6.70508 4.35476 6.70508 7.29176C6.70508 10.2288 9.06008 12.5838 11.9971 12.5838Z" fill="currentColor"></path>
                                </svg>
                            </div>
                            <span class="dark-wizard">Data PPKS</span>
                        </a>
                    </li>
                    <li id="personal" class="mb-2 col-lg-3 col-md-6 text-start">
                        <a href="javascript:void(0);">
                            <div class="iq-icon me-3">
                                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11.9488 14.54C8.49884 14.54 5.58789 15.1038 5.58789 17.2795C5.58789 19.4562 8.51765 20.0001 11.9488 20.0001C15.3988 20.0001 18.3098 19.4364 18.3098 17.2606C18.3098 15.084 15.38 14.54 11.9488 14.54Z" fill="currentColor"></path>
                                    <path opacity="0.4" d="M11.949 12.467C14.2851 12.467 16.1583 10.5831 16.1583 8.23351C16.1583 5.88306 14.2851 4 11.949 4C9.61293 4 7.73975 5.88306 7.73975 8.23351C7.73975 10.5831 9.61293 12.467 11.949 12.467Z" fill="currentColor"></path>
                                    <path opacity="0.4" d="M21.0881 9.21923C21.6925 6.84176 19.9205 4.70654 17.664 4.70654C17.4187 4.70654 17.1841 4.73356 16.9549 4.77949C16.9244 4.78669 16.8904 4.802 16.8725 4.82902C16.8519 4.86324 16.8671 4.90917 16.8895 4.93889C17.5673 5.89528 17.9568 7.0597 17.9568 8.30967C17.9568 9.50741 17.5996 10.6241 16.9728 11.5508C16.9083 11.6462 16.9656 11.775 17.0793 11.7948C17.2369 11.8227 17.3981 11.8371 17.5629 11.8416C19.2059 11.8849 20.6807 10.8213 21.0881 9.21923Z" fill="currentColor"></path>
                                    <path d="M22.8094 14.817C22.5086 14.1722 21.7824 13.73 20.6783 13.513C20.1572 13.3851 18.747 13.205 17.4352 13.2293C17.4155 13.232 17.4048 13.2455 17.403 13.2545C17.4003 13.2671 17.4057 13.2887 17.4316 13.3022C18.0378 13.6039 20.3811 14.916 20.0865 17.6834C20.074 17.8032 20.1698 17.9068 20.2888 17.8888C20.8655 17.8059 22.3492 17.4853 22.8094 16.4866C23.0637 15.9589 23.0637 15.3456 22.8094 14.817Z" fill="currentColor"></path>
                                    <path opacity="0.4" d="M7.04459 4.77973C6.81626 4.7329 6.58077 4.70679 6.33543 4.70679C4.07901 4.70679 2.30701 6.84201 2.9123 9.21947C3.31882 10.8216 4.79355 11.8851 6.43661 11.8419C6.60136 11.8374 6.76343 11.8221 6.92013 11.7951C7.03384 11.7753 7.09115 11.6465 7.02668 11.551C6.3999 10.6234 6.04263 9.50765 6.04263 8.30991C6.04263 7.05904 6.43303 5.89462 7.11085 4.93913C7.13234 4.90941 7.14845 4.86348 7.12696 4.82926C7.10906 4.80135 7.07593 4.78694 7.04459 4.77973Z" fill="currentColor"></path>
                                    <path d="M3.32156 13.5127C2.21752 13.7297 1.49225 14.1719 1.19139 14.8167C0.936203 15.3453 0.936203 15.9586 1.19139 16.4872C1.65163 17.4851 3.13531 17.8066 3.71195 17.8885C3.83104 17.9065 3.92595 17.8038 3.91342 17.6832C3.61883 14.9167 5.9621 13.6046 6.56918 13.3029C6.59425 13.2885 6.59962 13.2677 6.59694 13.2542C6.59515 13.2452 6.5853 13.2317 6.5656 13.2299C5.25294 13.2047 3.84358 13.3848 3.32156 13.5127Z" fill="currentColor"></path>
                                </svg>
                            </div>
                            <span class="dark-wizard">Data Pengampu</span>
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
                            <span class="dark-wizard">Assessement</span>
                        </a>
                    </li>
                    <li id="confirm" class="mb-2 col-lg-3 col-md-6 text-start">
                        <a href="javascript:void(0);">
                            <div class="iq-icon me-3">
                                <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </div>
                            <span class="dark-wizard">Intervensi</span>
                        </a>
                    </li>
                </ul>
                <!-- fieldsets -->
                <fieldset>
                    @include('assessement.step-1')
                    <button type="button" name="next" class="btn btn-primary next action-button float-end" value="Next" >Next</button>
                </fieldset>
                <fieldset>
                    @include('assessement.step-2')
                    <button type="button" name="next" class="btn btn-primary next action-button float-end" value="Next" >Next</button>
                    <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-end me-1" value="Previous" >Previous</button>
                </fieldset>
                <fieldset>
                    @include('assessement.step-3')
                    <button type="button" name="next" class="btn btn-primary next action-button float-end" value="Next" >Next</button>
                    <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-end me-1" value="Previous" >Previous</button>
                </fieldset>
                <fieldset>
                    @include('assessement.step-4')
                    <button type="submit" name="next" class="btn btn-primary action-button float-end" value="Submit" >Submit</button>
                    <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-end me-1" value="Previous" >Previous</button>
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
<script>
    $(document).ready(function () {
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
                        timer   : 5000,
                        customClass      : {
                            container: 'swal-container'
                        }
                    }).then(function() {
                        window.location = "{{ route('assessement') }}";
                    });
                  }else{
                    $(btnx).removeAttr("disabled");
                    $(btnx).attr({type:'submit',value: 'Simpan'});
                    Swal.fire({
                        icon    : 'error',
                        title   : 'Gagal',
                        html    : data.message,
                        showConfirmButton:  true ,
                        timer   : 5000,
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
                        timer   : 5000,
                        customClass      : {
                            container: 'swal-container'
                        }
                    }).then(function() {
                       
                    });
              },
            });
        });
    });
</script>
@endsection-