@extends('layout.master')
@section('add-css')

@endsection
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Data @if ($activeMenu) {{ $activeMenu->menu }} @endif</h4>
                </div>
            </div>
            <div class="card-body">
                <p class="mb-3">&nbsp;</p>
                <div class="table-responsive">
                    <table id="list-data" class="table">
                        <thead>
                            <tr>
                                <th width="35px">No</th>
                                <th>Nama PPKS</th>
                                <th width="50">Tgl Penerimaan</th>
                                <th width="50">Sumber</th>
                                <th width="50">Petugas</th>
                                <th width="35px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="reviu{{ $activeMenu->access }}Modal" tabindex="-1" aria-labelledby="layananModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="layananModalLabel">Reviu Perkembangan Assessor</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('assessement.reviu_send_perkembangan') }}" method="POST" id="reviuPerkembangan{{ $activeMenu->access }}Form">
                <input type="hidden" name="residensial_id" id="residensial_id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xl-9">
                            <div class="card">
                                <div class="row">
                                    <div class="form-group">
                                        <iframe 
                                            id="iframeBA" 
                                            src="" 
                                            class="w-100 border rounded" 
                                            style="height: 700px;" 
                                            allowfullscreen 
                                            title="PDF Viewer">
                                        </iframe>
                                    </div>
                                                                                                            
                                </div>
                            </div>
                        </div>

                        <!-- Kolom Kanan -->
                        <div class="col-xl-3">
                            <div class="card mb-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                            <label class="form-label">Catatan Perkembangan: *</label>
                                            <textarea class="form-control" name="perkembangan_catatan" cols="5" id="detail_perkembangan_catatan" rows="20"></textarea>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan Reviu</button>
                </div>
            </form>    
        </div>
    </div>
</div>
@endsection
@section('add-js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function load_this_data(){
        loadTabelData("list-data", "{{route('load_assessement')}}", ['No', 'Nama PPKS','Tgl Penerimaan','Sumber','Petugas','Aksi']);
    }
    $(document).ready(function () {
        load_this_data();

        $("#reviuPerkembangan{{ $activeMenu->access }}Form").submit(function(e){
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

    function send_form(id) {
        Swal.fire({
            title: "Apakah anda yakin?",
            text: "akan Mengirimkan ke Pendamping Sosial untuk dilanjutkan Proses Layanan ?!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "ya, Kirim!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/assessement/kirim-koordinator/${id}`,
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: { id: id }, // Menambahkan id sebagai data yang dikirim
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Terkirim',
                            html: "Data telah Terkirim.",
                            showConfirmButton: true,
                            timer: 5000,
                            customClass: {
                                container: 'swal-container'
                            }
                        }).then(function() {
                            load_this_data();
                        });
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            title: "Error!",
                            text: "Failed to Send the file. Please try again.",
                            icon: "error"
                        });
                    }
                });
            }
        });
    }

    
    function reviu_perkembangan(id){
        $.ajax({
            url: `/assessement/reviu-perkembangan-dokumen/${id}`,
            type: 'GET',
            success: function (data) {
                $('#iframeBA').attr('src', data.dokumen_rehabilitasi);
                $("#residensial_id").val(data.residensial_id);
                $('#reviu{{ $activeMenu->access }}Modal').modal('show');
            },
            error: function (xhr, status, error) {
                console.error(`Error: ${error}`);
                alert('Failed to fetch data. Please try again.');
            }
        });
    }

</script>
@endsection