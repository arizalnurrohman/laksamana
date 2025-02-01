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
@endsection
@section('add-js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function load_this_data(){
        loadTabelData("list-data", "{{route('load_assessement')}}", ['No', 'Nama PPKS','Tgl Penerimaan','Sumber','Petugas','Aksi']);
    }
    $(document).ready(function () {
        load_this_data();
    });

    function send_form(id) {
        Swal.fire({
            title: "Apakah anda yakin?",
            text: "akan Mengirimkan ke Koordinator untuk dilanjutkan ke Penentuan Layanan ?!",
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

</script>
@endsection