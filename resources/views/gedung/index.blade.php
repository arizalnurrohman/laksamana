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
                    <table id="list-data" class="table"><?php /*<table id="datatable" class="table table-striped" data-toggle="data-table">*/ ?>
                        <thead>
                            <tr>
                                <th width="25">No</th>
                                <th>Gedung</th>
                                <th width="40">Kamar</th>
                                <th width="40">Terpakai</th>
                                <th width="40">Status</th>
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
                        <label for="gedung" class="form-label">Gedung</label>
                        <input type="text" class="form-control" id="gedung" name="gedung" required>
                    </div>
                    <div class="mb-3">
                        <label for="JumlahKamar" class="form-label">Jumlah Kamar</label>
                        <input type="text" class="form-control" id="JumlahKamar" name="jumlah_kamar" required>
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
                        <label for="updateGedung" class="form-label">Gedung</label>
                        <input type="text" class="form-control" id="updateGedung" name="gedung" required>
                    </div>
                    <div class="mb-3">
                        <label for="updateJumlahKamar" class="form-label">Jumlah Kamar</label>
                        <input type="text" class="form-control" id="updateJumlahKamar" name="jumlah_kamar" required>
                    </div>
                    <div class="mb-3">
                        <label for="updateStatus" class="form-label">Status Gedung</label>
                        <select class="form-control" id="updateStatus" name="status_gedung" required>
                            <option value="Aktif">Aktif</option>
                            <option value="Tidak Aktif">Tidak Aktif</option>
                        </select>
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
        loadTabelData("list-data", "{{route('load_gedung_asrama')}}", ['No', 'Gedung','Kamar','Terpakai','Status','Aksi']);
    }
    $(document).ready(function () {
        load_this_data();

        $('#add{{ $activeMenu->access }}Form').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route("gedung_asrama.store") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    nama_gedung: $('#gedung').val(),
                    jumlah_kamar: $('#JumlahKamar').val(),
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
                url: '{{ route("gedung_asrama.update") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: $('#updateId').val(),
                    nama_gedung: $('#updateGedung').val(),
                    jumlah_kamar: $('#updateJumlahKamar').val(),
                    status_gedung: $('#updateStatus').val(),
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
            url: `/gedung-asrama/edit/${id}`,
            type: 'GET',
            success: function (data) {
                $('#updateId').val(data.id);
                $('#updateGedung').val(data.nama_gedung);
                $('#updateJumlahKamar').val(data.jumlah_kamar);
                
                // Set combobox value for status kamar
                if (data.status_gedung === "Aktif" || data.status_gedung === "Tidak Aktif") {
                    $('#updateStatus').val(data.status_gedung);
                } else {
                    $('#updateStatus').val("Aktif"); // Default value if status is not provided
                }

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
                    url: `/gedung-asrama/delete/${id}`,
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

</script>

@endsection