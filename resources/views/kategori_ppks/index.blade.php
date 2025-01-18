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
                    <table id="list-data" class="table">
                        <thead>
                            <tr>
                                <th width="25">No</th>
                                <th>Kategori</th>
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
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="add{{ $activeMenu->access }}Form">
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
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
                <h5 class="modal-title" id="updateModalLabel">Update Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="updateForm">
                    <input type="hidden" id="updateId" name="id">
                    <div class="mb-3">
                        <label for="updateKategori" class="form-label">Kategori</label>
                        <input type="text" class="form-control" id="updateKategori" name="kategori" required>
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
    function loadTabel() {
        $("#list-data").DataTable().clear().destroy();
        $("#list-data").DataTable({
            "ajax": {
                url: "{{route('load_kategorikkps')}}",
                dataSrc: ''
            },
            "dataSrc": "0.Members",
            lengthMenu: [
                [10, 20, 50, -1],
                [10, 20, 50, "Semua"],
            ],
            columns: [{
                    "data": 'No'
                },
                {
                    "data": 'Kategori'
                },
                {
                    "data": 'Aksi'
                }
            ],

            bLengthChange: false
        });
    }
    $(document).ready(function () {
        loadTabel();
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
                    alert(response.message);
                    location.reload(); // Reload halaman setelah sukses
                },
                error: function (xhr) {
                    alert('Terjadi kesalahan. Silakan coba lagi.');
                }
            });
        });

        $('.btn-warning').on('click', function () {
            const row = $(this).closest('tr'); // Dapatkan elemen <tr> terkait
            const id = row.attr('id'); // Ambil ID dari atribut id pada <tr>
            const kategori = row.find('td:eq(1)').text(); // Ambil Kategori dari kolom kedua

            // Isi modal dengan data
            $('#updateId').val(id.trim());
            $('#updateKategori').val(kategori.trim());

            // Tampilkan modal
            $('#update{{ $activeMenu->access }}Modal').modal('show');
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
                        icon: 'success',
                        title: 'Berhasil',
                        text: response.message,
                    });

                    // Tutup modal
                    $('#update{{ $activeMenu->access }}Modal').modal('hide');

                    // Perbarui baris di tabel
                    const id = $('#updateId').val();
                    const updatedKategori = $('#updateKategori').val();

                    // Cari baris berdasarkan ID
                    const row = $(`tr#${id}`);
                    row.find('td:eq(1)').text(updatedKategori); // Perbarui kolom Kategori
                    //window.location.href = window.location.href;
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
</script>

@endsection