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
                <button class="btn btn-primary" onclick="window.location.href='{{ route('residensial.create') }}'">
                    <span class="btn-inner">
                        <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                    </span>
                    Data @if ($activeMenu) {{ $activeMenu->menu }} @endif
                </button>
            </div>
            <div class="card-body">
                <p class="mb-3">&nbsp;</p>
                <div class="table-responsive">
                    <table id="list-data" class="table">
                        <thead>
                            <tr>
                                <th width="35px">No</th>
                                <th>Nama Pasien</th>
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

<div class="modal fade" id="layananModal" tabindex="-1" aria-labelledby="layananModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="layananModalLabel">Tentukan Manajer Kasus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Kolom Kiri -->
                    <div class="col-xl-9">
                        <div class="card mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Nama: John Doe</h5>
                                <p class="card-text">Alamat: Jl. Contoh No. 123</p>
                                <p class="card-text">No. Telepon: 08123456789</p>
                                <p class="card-text">Email: john.doe@example.com</p>
                            </div>
                        </div>
                    </div>

                    <!-- Kolom Kanan -->
                    <div class="col-xl-3">
                        <div class="card mb-3">
                            <div class="card-body text-center">
                                <img id="fotoPasien" src="https://dummyimage.com/200x200/cccccc/ffffff" class="img-fluid rounded" alt="Foto Pasien">
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Informasi Layanan</h5>
                                <p class="card-text">Layanan: Layanan A</p>
                                <p class="card-text">Status: Aktif</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Tentukan Manajer Kasus</button>
            </div>
        </div>
    </div>
</div>
 
@endsection
@section('add-js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function load_this_data(){
        loadTabelData("list-data", "{{route('load_residensial')}}", ['No', 'Nama Pasien','Tgl Penerimaan','Sumber','Petugas','Aksi']);
    }
    $(document).ready(function () {
        load_this_data();
        $('#add{{ $activeMenu->access }}Form').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                url: '{{ route("kategorikkps.store") }}',
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
                url: '{{ route("kategorikkps.update") }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: $('#updateId').val(),
                    kategori: $('#updateKategori').val(),
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
            url: `/kategori-kkps/edit/${id}`,
            type: 'GET',
            success: function (data) {
                $('#updateId').val(data.id);
                $('#updateKategori').val(data.kategori);
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
                    url: `/kategori-kkps/delete/${id}`,
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

    function send_form(id) {
        Swal.fire({
            title: "Apakah anda yakin?",
            text: "akan Mengirimkan ke Kepala data ini ?!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "ya, Kirim!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/residensial/kirim-kekepala/${id}`,
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
                            timer: 1000,
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

    function generate_form(id) {
        Swal.fire({
            title: "Apakah anda yakin?",
            text: "akan Membuat Dokumen Berita Acara  ?!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "ya, Buat!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/residensial/generate-berita-acara/${id}`,
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
                            timer: 1000,
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

    function send_accessor(id) {
        Swal.fire({
            title: "Apakah anda yakin?",
            text: "akan Mengirimkan ke Assessor data ini ?!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "ya, Kirim!"
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/residensial/kirim-accessor/${id}`,
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
                            timer: 1000,
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

    function tentukan_layanan(id){
        // Logika untuk mengambil data berdasarkan ID jika diperlukan
        // Contoh: fetch data dari server menggunakan AJAX

        // Tampilkan modal
        var myModal = new bootstrap.Modal(document.getElementById('layananModal'));
        myModal.show();
    }

</script>
@endsection