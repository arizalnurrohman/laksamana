@extends('layout.master')
@section('add-css')
<style type="text/css">
    .swal2-container {
        z-index: 10000;
    }
</style>
@endsection
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Data @if ($activeMenu) {{ $activeMenu->menu }} @endif</h4>
                </div>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add{{ $activeMenu->access }}Modal">
                    <span class="btn-inner">
                        <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                    </span>
                    Data @if ($activeMenu) {{ $activeMenu->menu }} @endif
                </button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="list-data" class="table">
                        <thead>
                            <tr>
                                <th width="25">No</th>
                                <th>Assessement</th>
                                <th width="40">Aksi</th>
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

<!-- Modal -->
<div class="modal fade" id="add{{ $activeMenu->access }}Modal" tabindex="-1" aria-labelledby="add{{ $activeMenu->access }}ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Data {{ $activeMenu->menu }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="add{{ $activeMenu->access }}Form">
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Assessement</label>
                        <input type="text" class="form-control" id="kategori" name="kategori" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Update Modal -->
<div class="modal fade" id="update{{ $activeMenu->access }}Modal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Data {{ $activeMenu->menu }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="updateForm">
                    <input type="hidden" id="updateId" name="id">
                    <div class="mb-3">
                        <label for="updateAssessement" class="form-label">Assessement</label>
                        <input type="text" class="form-control" id="updateAssessement" name="kategori" required>
                    </div>
                    <div class="mb-3">
                        <label for="updateUrutan" class="form-label">Urutan</label>
                        <input type="text" class="form-control" id="updateUrutan" name="urutan" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- offcanvas --}}
<div class="offcanvas offcanvas-end" style="z-index: 10000; width: 40%" tabindex="-1" id="offcanvasWithBackdrop" aria-labelledby="offcanvasWithBackdropLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasWithBackdropLabel">Pilihan - Sub Assessement</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="bd-example">
            <form method="POST" id="SubAssessementPPKSCanvas">
                <div class="mb-3">
                    <label for="pilihanSub" class="form-label">Pilihan Sub</label>
                    <input type="hidden" id="sub_id_canvas" name="sub_id">
                    <input type="hidden" id="parent_id_canvas" name="parent_id">
                    <input type="hidden" id="kategori_id_canvas" name="kategori_id">
                    <input type="text" class="form-control" id="kategori_sub_canvas" aria-describedby="kategori_subHelp" required>
                    <div id="kategori_subHelp" class="form-text">Silahkan Isikan Pilihan Optional.</div>
                </div>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
            </form>
        </div>
        <hr>
        <div class="table-responsive">
            <table id="list-data-pilihan" class="table">
                <thead>
                    <tr>
                        <th width="25">No</th>
                        <th>Pilihan</th>
                        <th width="40">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="subPPKSModal" tabindex="-1" aria-labelledby="subPPKSModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between">
                <h5 class="modal-title" id="subPPKSModalLabel">Detail Data</h5>
                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}

                <!-- Tombol di sebelah kanan -->
                <input type="hidden" id="idAssessementPPKS">
                <button class="btn btn-primary ms-auto" onclick="displayAddSubModal($('#idAssessementPPKS').val())">
                    <span class="btn-inner">
                        <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                    </span>
                    Data Sub @if ($activeMenu) {{ $activeMenu->menu }} @endif
                </button>
            </div>
            <div class="modal-body" id="modal-content">
                <div class="mb-3">
                    <label for="kategorippks" class="form-label">Assessement PPKS</label>
                    <input type="email" class="form-control" id="kategorippks" aria-describedby="emailHelp" readonly>
                </div>
                <div class="table-responsive">
                    <table id="list-data-sub" class="table">
                        <thead>
                            <tr>
                                <th style="width: 25px !important">No</th>
                                <th>Sub Assessement</th>
                                <th style="width: 30px  !important">Aksi</th>
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


{{-- sub --}}
<!-- Modal -->
<div class="modal fade bg-dark bg-opacity-50" id="addsub{{ $activeMenu->access }}Modal" tabindex="-1" aria-labelledby="add{{ $activeMenu->access }}ModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Data Sub {{ $activeMenu->menu }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addsub{{ $activeMenu->access }}Form">
                    <input type="hidden" id="addsub_kategoriId" name="id">
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Assessement</label>
                        <input type="text" class="form-control" id="addsub_kategori" name="kategori" required>
                    </div>
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Sub Assessement</label>
                        <input type="text" class="form-control" id="addsub_kategorisub" name="subkategori" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Update Modal -->
<div class="modal fade" id="updatesub{{ $activeMenu->access }}Modal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel">Update Data Sub {{ $activeMenu->menu }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="updatesub{{ $activeMenu->access }}Form">
                    <input type="hidden" id="update_AssessementId" name="id">
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Assessement</label>
                        <input type="text" class="form-control" id="update_kategoriid" name="kategori" required>
                    </div>
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Sub Assessement</label>
                        <input type="text" class="form-control" id="update_kategorisub" name="subkategori" required>
                    </div>
                    <div class="mb-3">
                        <label for="updateUrutan" class="form-label">Urutan</label>
                        <input type="text" class="form-control" id="update_urutan" name="urutan" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>



 
@endsection
@section('add-js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function load_this_data(){
        loadTabelData("list-data", "{{route('load_formassessement')}}", ['No', 'Assessment', 'Aksi']);
    }
    $(document).ready(function () {
        load_this_data();
        $('#add{{ $activeMenu->access }}Form').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route("formassessement.store") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    kategori: $('#kategori').val(),
                },
                success: function (response) {
                    Swal.fire({
                        icon    : 'success',
                        title   : 'Berhasil',
                        html    : response.message,
                        showConfirmButton:  true ,
                        timer   : 1000,
                        customClass      : {
                            container: 'swal-container'
                        }
                    }).then(function() {
                        $('#add{{ $activeMenu->access }}Modal').modal('hide');
                        load_this_data();
                    });
                },
                error: function (xhr) {
                    alert('Terjadi kesalahan. Silakan coba lagi.');
                }
            });
        });

        // Submit update form via AJAX
        $('#updateForm').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route("formassessement.update") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: $('#updateId').val(),
                    kategori: $('#updateAssessement').val(),
                },
                success: function (response) {
                    Swal.fire({
                        icon    : 'success',
                        title   : 'Berhasil',
                        html    : response.message,
                        showConfirmButton:  true ,
                        timer   : 1000,
                        customClass      : {
                            container: 'swal-container'
                        }
                    }).then(function() {
                        $('#update{{ $activeMenu->access }}Modal').modal('hide');
                        load_this_data();
                    });
                },error: function (xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal',
                        text: 'Terjadi kesalahan saat mengupdate data.',
                    });
                }
            });
        });
    });

    function update_form(id) {
        $.ajax({
            url: `/form-assessement/edit/${id}`,
            type: 'GET',
            success: function (data) {
                $('#updateId').val(data.id);
                $('#updateAssessement').val(data.kategori);
                $('#updateUrutan').val(data.sort);

                $('#update{{ $activeMenu->access }}Modal').modal('show');
            },
            error: function (xhr, status, error) {
                console.error(`Error: ${error}`);
                alert('Failed to fetch data. Please try again.');
            }
        });
    }

    function delete_form(id) {
        Swal.fire({
            title: "Apakah anda yakin?",
            text: "akan menghapus data ini ?!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "ya, Hapus!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/form-assessement/delete/${id}`,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        Swal.fire({
                            icon    : 'success',
                            title   : 'Terhapus',
                            html    : "Data telah dihapus.",
                            showConfirmButton:  true ,
                            timer   : 1000,
                            customClass      : {
                                container: 'swal-container'
                            }
                        }).then(function() {
                            load_this_data();
                        });
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            title: "Error!",
                            text: "Failed to delete the file. Please try again.",
                            icon: "error"
                        });
                    }
                });
            }
        });
    }

    function modalDetail(id) {
        const url = `/form-assessement/list-sub/${id}`;

        $.get(url, function(data) {
            // 'data' adalah array, ambil elemen pertama
            if (data.length > 0) {
                displayModal(data[0].id, data[0].kategori);
            } else {
                console.error('Data not found');
            }
        }).fail(function(error) {
            console.error('There has been a problem with your AJAX request:', error);
        });
    }

    function displayModal(idx,kategori) {
        const modal = new bootstrap.Modal(document.getElementById('subPPKSModal'));
        modal.show();

        const baseUrl = "{{ url('form-assessement/load-form-assessement') }}";
        const url = `${baseUrl}/${idx}`;

        loadTabelData("list-data-sub", url, ['No', 'Sub Assessement', 'Aksi']);
        $('#kategorippks').val(kategori);
        $('#idAssessementPPKS').val(idx);
        
    }

    function displayAddSubModal(id) {
        const url = `/form-assessement/edit/${id}`;

        $.get(url, function(data) {
            // 'data' adalah array, ambil elemen pertama
            if (data) {
                console.log(data);
                // displayModal(data[0].id, data[0].kategori);
                let myModal = new
                bootstrap.Modal(document.getElementById('addsub{{ $activeMenu->access }}Modal'), {});
                myModal.show();

                $("#addsub_kategoriId").val(data.id);
                $("#addsub_kategori").val(data.assessment);
                
            } else {
                console.error('Data not found');
            }
        }).fail(function(error) {
            console.error('There has been a problem with your AJAX request:', error);
        });
    }

    $('#addsub{{ $activeMenu->access }}Form').on('submit', function (e) {
        e.preventDefault();

        $.ajax({
            url: '{{ route("sub_formassessement.store") }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                form_assessment_id: $('#addsub_kategoriId').val(),
                kategori_sub: $('#addsub_kategorisub').val(),
            },
            success: function (response) {
                Swal.fire({
                    icon    : 'success',
                    title   : 'Berhasil',
                    html    : response.message,
                    showConfirmButton:  true ,
                    timer   : 1000,
                    customClass      : {
                        container: 'swal-container'
                    }
                }).then(function() {
                    $('#addsub{{ $activeMenu->access }}Modal').modal('hide');
                    var idx = $('#addsub_kategoriId').val();
                    const baseUrl = "{{ url('form-assessement/load-form-assessement') }}";
                    const url = `${baseUrl}/${idx}`;

                    loadTabelData("list-data-sub", url, ['No', 'Sub Assessement', 'Aksi']);
                });
            },
            error: function (xhr) {
                alert('Terjadi kesalahan. Silakan coba lagi.');
            }
        });
    });

    function optionalOffCanvas(id) {
        const url = `/form-assessement/list-sub/child/${id}`;

        $.get(url, function(data) {
            if (data) {
                console.log(data);
                const offcanvasElement = document.getElementById('offcanvasWithBackdrop');
                const offcanvas = new bootstrap.Offcanvas(offcanvasElement);
                offcanvas.show();

                $(".offcanvas-title").html("Pilihan - Sub Assessement - " + data[0].sub_kategori_assessment);
                $("#parent_id_canvas").val(data[0].id);
                $("#kategori_id_canvas").val(data[0].form_assessment_id);
                // $("#addsub_kategori").val(data.kategori);
                const baseUrl = "{{ url('form-assessement/list-sub/child/load_list') }}";
                const url_pilihan = `${baseUrl}/${data[0].id}`;
                loadTabelData("list-data-pilihan", url_pilihan, ['No', 'Pilihan', 'Aksi']);
                
            } else {
                console.error('Data not found');
            }
        }).fail(function(error) {
            console.error('There has been a problem with your AJAX request:', error);
        });
    }

    $('#SubAssessementPPKSCanvas').on('submit', function (e) {
        e.preventDefault();
        const sub_id = $('#sub_id_canvas').val();
        $.ajax({
            url: '{{ route("sub_formassessement.store") }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                sub_id: $('#sub_id_canvas').val(),
                form_assessment_id: $('#kategori_id_canvas').val(),
                kategori_sub: $('#kategori_sub_canvas').val(),
                parent_id: $('#parent_id_canvas').val(),
            },
            success: function (response) {
                Swal.fire({
                    icon    : 'success',
                    title   : 'Berhasil',
                    html    : response.message,
                    showConfirmButton:  true ,
                    timer   : 1000,
                    customClass      : {
                        container: 'swal-container'
                    }
                }).then(function() {
                    const baseUrl = "{{ url('form-assessement/list-sub/child/load_list') }}";
                    const parent_id = $('#parent_id_canvas').val();
                    const url_pilihan = `${baseUrl}/${parent_id}`;
                    loadTabelData("list-data-pilihan", url_pilihan, ['No', 'Pilihan', 'Aksi']);
                    $('#kategori_sub_canvas').val("");

                    if(sub_id){
                        $('#SubAssessementPPKSCanvas button[type="submit"]').text('Tambah Data');
                        $('#sub_id_canvas').val("");
                    }
                    
                });
            },
            error: function (xhr) {
                alert('Terjadi kesalahan. Silakan coba lagi.');
            }
        });
    });

    function updatechild_canvas(id){
        const url = `/form-assessement/list-sub/child/${id}`;

        $.get(url, function(data) {
            if (data) {
                $("#kategori_sub_canvas").val(data[0].sub_kategori_assessment);
                $('#SubAssessementPPKSCanvas button[type="submit"]').text('Update Data');
                $("#sub_id_canvas").val(data[0].id);
                // const baseUrl = "{{ url('form-assessement/list-sub/child/load_list') }}";
                // const url_pilihan = `${baseUrl}/${data[0].parent_id}`;
                // loadTabelData("list-data-pilihan", url_pilihan, ['No', 'Pilihan', 'Aksi']);


                
            } else {
                console.error('Data not found');
            }
        }).fail(function(error) {
            console.error('There has been a problem with your AJAX request:', error);
        });
    } 

    function deletechild_canvas(id){
        Swal.fire({
            title: "Apakah anda yakin?",
            text: "akan menghapus data ini ?!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "ya, Hapus!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `form-assessement/list-sub/child/delete/${id}`,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        Swal.fire({
                            icon    : 'success',
                            title   : 'Terhapus',
                            html    : "Data telah dihapus.",
                            showConfirmButton:  true ,
                            timer   : 1000,
                            customClass      : {
                                container: 'swal-container'
                            }
                        }).then(function() {
                            const baseUrl = "{{ url('form-assessement/list-sub/child/load_list') }}";
                            const parent_id = $('#parent_id_canvas').val();
                            const url_pilihan = `${baseUrl}/${parent_id}`;
                            loadTabelData("list-data-pilihan", url_pilihan, ['No', 'Pilihan', 'Aksi']);
                        });
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({
                            title: "Error!",
                            text: "Failed to delete the file. Please try again.",
                            icon: "error"
                        });
                    }
                });
            }
        });
    } 

    



</script>

@endsection