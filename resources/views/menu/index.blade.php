@extends('layout.master')
@section('add-css')

@endsection
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header r d-flex align-items-center justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Data Menu</h4>
                </div>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMenuModal">
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
                    <table id="datatable" class="table table-striped" data-toggle="data-table">
                        <thead>
                            <tr>
                                <th width="20px">No</th>
                                <th>Name</th>
                                <th width="10%">Url</th>
                                <th width="10%">Access</th>
                                <th width="20px">Salary</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($datamenu as $key=>$menu)
                            <tr>
                                <td><input class="form-control form-control-sm" type="text" value="{{$menu->sort}}" maxlength="2" style="width:35px;text-align:center"></td>
                                <td>{{$menu->menu}} @if($menu->child>0) &nbsp;<span class="badge bg-warning">{{$menu->child}}</span> @endif</td>
                                <td>{{$menu->url}}</td>
                                <td>{{$menu->access}}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button class="btn btn-sm btn-icon btn-info">
                                            <span class="btn-inner">
                                                <svg fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-20" width="20" height="20" viewBox="0 0 24 24"><path fill-rule="evenodd" clip-rule="evenodd" d="M7.81 2H16.191C19.28 2 21 3.78 21 6.83V17.16C21 20.26 19.28 22 16.191 22H7.81C4.77 22 3 20.26 3 17.16V6.83C3 3.78 4.77 2 7.81 2ZM8.08 6.66V6.65H11.069C11.5 6.65 11.85 7 11.85 7.429C11.85 7.87 11.5 8.22 11.069 8.22H8.08C7.649 8.22 7.3 7.87 7.3 7.44C7.3 7.01 7.649 6.66 8.08 6.66ZM8.08 12.74H15.92C16.35 12.74 16.7 12.39 16.7 11.96C16.7 11.53 16.35 11.179 15.92 11.179H8.08C7.649 11.179 7.3 11.53 7.3 11.96C7.3 12.39 7.649 12.74 8.08 12.74ZM8.08 17.31H15.92C16.319 17.27 16.62 16.929 16.62 16.53C16.62 16.12 16.319 15.78 15.92 15.74H8.08C7.78 15.71 7.49 15.85 7.33 16.11C7.17 16.36 7.17 16.69 7.33 16.95C7.49 17.2 7.78 17.35 8.08 17.31Z" fill="currentColor"></path></svg>
                                            </span>
                                        </button>
                                        <button class="btn btn-sm btn-icon btn-success">
                                            <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                              </svg>
                                        </button>
                                        <button class="btn btn-sm btn-icon btn-warning">
                                            <span class="btn-inner">
                                                <svg fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-20" width="20" height="20" viewBox="0 0 24 24"><path fill-rule="evenodd" clip-rule="evenodd" d="M9.3764 20.0279L18.1628 8.66544C18.6403 8.0527 18.8101 7.3443 18.6509 6.62299C18.513 5.96726 18.1097 5.34377 17.5049 4.87078L16.0299 3.69906C14.7459 2.67784 13.1541 2.78534 12.2415 3.95706L11.2546 5.23735C11.1273 5.39752 11.1591 5.63401 11.3183 5.76301C11.3183 5.76301 13.812 7.76246 13.8651 7.80546C14.0349 7.96671 14.1622 8.1817 14.1941 8.43969C14.2471 8.94493 13.8969 9.41792 13.377 9.48242C13.1329 9.51467 12.8994 9.43942 12.7297 9.29967L10.1086 7.21422C9.98126 7.11855 9.79025 7.13898 9.68413 7.26797L3.45514 15.3303C3.0519 15.8355 2.91395 16.4912 3.0519 17.1255L3.84777 20.5761C3.89021 20.7589 4.04939 20.8879 4.24039 20.8879L7.74222 20.8449C8.37891 20.8341 8.97316 20.5439 9.3764 20.0279ZM14.2797 18.9533H19.9898C20.5469 18.9533 21 19.4123 21 19.9766C21 20.5421 20.5469 21 19.9898 21H14.2797C13.7226 21 13.2695 20.5421 13.2695 19.9766C13.2695 19.4123 13.7226 18.9533 14.2797 18.9533Z" fill="currentColor"></path></svg>
                                            </span>
                                        </button>
                                        <button class="btn btn-sm btn-icon btn-danger">
                                            <span class="btn-inner">
                                                <svg fill="none" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M20.2871 5.24297C20.6761 5.24297 21 5.56596 21 5.97696V6.35696C21 6.75795 20.6761 7.09095 20.2871 7.09095H3.71385C3.32386 7.09095 3 6.75795 3 6.35696V5.97696C3 5.56596 3.32386 5.24297 3.71385 5.24297H6.62957C7.22185 5.24297 7.7373 4.82197 7.87054 4.22798L8.02323 3.54598C8.26054 2.61699 9.0415 2 9.93527 2H14.0647C14.9488 2 15.7385 2.61699 15.967 3.49699L16.1304 4.22698C16.2627 4.82197 16.7781 5.24297 17.3714 5.24297H20.2871ZM18.8058 19.134C19.1102 16.2971 19.6432 9.55712 19.6432 9.48913C19.6626 9.28313 19.5955 9.08813 19.4623 8.93113C19.3193 8.78413 19.1384 8.69713 18.9391 8.69713H5.06852C4.86818 8.69713 4.67756 8.78413 4.54529 8.93113C4.41108 9.08813 4.34494 9.28313 4.35467 9.48913C4.35646 9.50162 4.37558 9.73903 4.40755 10.1359C4.54958 11.8992 4.94517 16.8102 5.20079 19.134C5.38168 20.846 6.50498 21.922 8.13206 21.961C9.38763 21.99 10.6811 22 12.0038 22C13.2496 22 14.5149 21.99 15.8094 21.961C17.4929 21.932 18.6152 20.875 18.8058 19.134Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        {{-- <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Office</th>
                                <th>Age</th>
                                <th>Start date</th>
                                <th>Salary</th>
                            </tr>
                        </tfoot> --}}
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Data -->
<div class="modal fade" id="addMenuModal" tabindex="-1" aria-labelledby="addMenuLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="addMenuForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="addMenuLabel">Tambah Data Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="menu" class="form-label">Menu Name</label>
                        <input type="text" class="form-control" id="menu" name="menu" required>
                    </div>
                    <div class="mb-3">
                        <label for="parent_id" class="form-label">Parent Menu</label>
                        <select class="form-select" id="parent_id" name="parent_id">
                            <option value="">None</option>
                            @foreach ($datamenu as $parent)
                                <option value="{{ $parent->id }}">{{ $parent->menu }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="icon" class="form-label">Icon</label>
                        <textarea class="form-control" id="icon" name="icon"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="url" class="form-label">URL</label>
                        <input type="text" class="form-control" id="url" name="url" required>
                    </div>
                    <div class="mb-3">
                        <label for="access" class="form-label">Access</label>
                        <input type="text" class="form-control" id="access" name="access">
                    </div>
                    <div class="mb-3">
                        <label for="sort" class="form-label">Sort</label>
                        <input type="number" class="form-control" id="sort" name="sort" value="1" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Menu</button>
                </div>
            </form>
        </div>
    </div>
</div>
 
@endsection
@section('add-js')
<script>
    $(document).ready(function () {
        // Set token CSRF untuk setiap permintaan AJAX
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Submit form dengan AJAX
        $('#addMenuForm').on('submit', function (e) {
            e.preventDefault();

            $.ajax({
                url: "{{ route('menu.store') }}", // Route ke controller
                method: "POST",
                data: $(this).serialize(),
                success: function (response) {
                    if (response.success) {
                        alert(response.message);
                        $('#addMenuModal').modal('hide');
                        location.reload(); // Reload halaman untuk update data
                    } else {
                        alert(response.message);
                    }
                },
                error: function (xhr) {
                    alert('Terjadi kesalahan. Silakan coba lagi.');
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>
@endsection