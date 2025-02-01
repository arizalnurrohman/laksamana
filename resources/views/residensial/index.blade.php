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


<div class="modal fade" id="layananModal" tabindex="-1" aria-labelledby="layananModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="layananModalLabel">Tentukan Manajer Kasus</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="POST" id="layananModalForm">
                <div class="modal-body">
                
                    <div class="row">
                        <!-- Kolom Kiri -->
                        <div class="col-xl-9">
                            <div class="row">
                                <input type="hidden" name="layanan_residensial_id" id="layanan_residensial_id">
                                <p><strong>Nama Lengkap:</strong> <span data-field="nama"></span></p>
                                <p><strong>NIK:</strong> <span data-field="nik"></span></p>
                                <p><strong>NO KK:</strong> <span data-field="nokk"></span></p>
                                <p><strong>Tempat Lahir:</strong> <span data-field="tmp_lahir"></span></p>
                                <p><strong>Tanggal Lahir:</strong> <span data-field="tgl_lahir"></span></p>
                                <p><strong>Usia:</strong> <span data-field="usia"></span></p>
                                <p><strong>Provinsi KTP:</strong> <span data-field="provinsi"></span></p>
                                <p><strong>Kab/Kota KTP:</strong> <span data-field="kabupaten"></span></p>
                                <p><strong>Kecamatan KTP:</strong> <span data-field="kecamatan"></span></p>
                                <p><strong>Kelurahan KTP:</strong> <span data-field="kelurahan"></span></p>
                                <p><strong>Alamat KTP:</strong> <span data-field="alamat"></span></p>
                                <p><strong>Alamat Domisili:</strong> <span data-field="domisili"></span></p>
                                <p><strong>Agama:</strong> <span data-field="agama"></span></p>
                                <p><strong>Pendidikan:</strong> <span data-field="pendidikan"></span></p>
                            </div>
                        </div>

                        <!-- Kolom Kanan -->
                        <div class="col-xl-3">
                            <div class="card mb-3">
                                <div class="card-body text-center">
                                    <img id="fotoPasien" src="https://dummyimage.com/200x200/cccccc/ffffff" class="img-fluid rounded" alt="Foto PPKS">
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Tentukan Manajer Kasus</h5>
                                    <select class="form-select" name="layanan_manajer_kasus" id="layanan_manajer_kasus">
                                        <option value="">Pilih Manajer Kasus</option>
                                        @foreach($petugas as $petugasx)
                                            <option value="{{$petugasx->id}}">{{$petugasx->nama}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" form="layananModalForm">Simpan Manajer Kasus</button>
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
        loadTabelData("list-data", "{{route('load_residensial')}}", ['No', 'Nama PPKS','Tgl Penerimaan','Sumber','Petugas','Aksi']);
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

        $('#layananModalForm').on('submit', function (e) {
            e.preventDefault();

            Swal.fire({
                title: "Apakah anda yakin?",
                text: "akan Menyimpan Manajer kasus ini ?!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "ya, Kirim!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route("residensial.store_manajer_kasus") }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            residensial_id: $('#layanan_residensial_id').val(),
                            manajer_kasus: $('#layanan_manajer_kasus').val(),
                        },
                        success: function (response) {
                            Swal.fire({
                                icon    : 'success',
                                title   : 'Berhasil',
                                html    : response.message,
                                showConfirmButton: true,
                                timer   : 1000,
                                customClass: {
                                    container: 'swal-container'
                                }
                            }).then(function() {
                                $('#layananModal').modal('hide');
                                load_this_data();
                            });
                        },
                        error: function (xhr) {
                            // Ambil error dari response JSON dan tampilkan dengan Swal
                            var errorMessage = xhr.responseJSON && xhr.responseJSON.message ? xhr.responseJSON.message : 'Terjadi kesalahan. Silakan coba lagi.';
                            Swal.fire({
                                icon: 'error',
                                title: 'Terjadi Kesalahan',
                                text: errorMessage,
                                confirmButtonColor: "#d33",
                            });
                        }
                    });
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

    function tentukan_layanan(id) {
        $.ajax({
            url: `/residensial/get-residensial/${id}`,
            type: 'GET',
            success: function (data) {
                // Pastikan data berisi informasi pasien yang benar.
                if (data) {
                    // Update elemen biodata pada modal.
                    $('#layananModal').find('[data-field="nama"]').text(`${data.nama_depan} ${data.nama_belakang}`);
                    $('#layananModal').find('[data-field="nik"]').text(data.nik);
                    $('#layananModal').find('[data-field="nokk"]').text(data.nokk);
                    $('#layananModal').find('[data-field="tmp_lahir"]').text(data.tmp_lahir);
                    $('#layananModal').find('[data-field="tgl_lahir"]').text(data.tgl_lahir);
                    $('#layananModal').find('[data-field="usia"]').text(data.usia);
                    $('#layananModal').find('[data-field="provinsi"]').text(data.provinsi);
                    $('#layananModal').find('[data-field="kabupaten"]').text(data.kabupaten_kota);
                    $('#layananModal').find('[data-field="kecamatan"]').text(data.kecamatan);
                    $('#layananModal').find('[data-field="kelurahan"]').text(data.keluarah_id);
                    $('#layananModal').find('[data-field="alamat"]').text(data.alamat);
                    $('#layananModal').find('[data-field="domisili"]').text(data.domisili);
                    $('#layananModal').find('[data-field="agama"]').text(data.agama);
                    $('#layananModal').find('[data-field="pendidikan"]').text(data.pendidikan);
                    $('#layanan_residensial_id').val(data.residensial_id);

                    // Update foto pasien pada modal.
                    if (data.foto_ppks) {
                        $('#layananModal').find('#fotoPasien').attr('src', data.foto_ppks);
                    } else {
                        $('#layananModal').find('#fotoPasien').attr('src', 'https://dummyimage.com/200x200/cccccc/ffffff'); // Placeholder jika foto tidak ada
                    }

                    // Tampilkan modal.
                    var myModal = new bootstrap.Modal(document.getElementById('layananModal'));
                    myModal.show();
                } else {
                    alert('Data tidak ditemukan.');
                }
            },
            error: function (xhr, status, error) {
                console.error(`Error: ${error}`);
                alert('Failed to fetch data. Please try again.');
            }
        });
    }



</script>
@endsection