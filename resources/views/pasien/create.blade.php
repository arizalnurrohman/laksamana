@extends('layout.master')
@section('add-css')

@endsection
@section('content')
<div class="row">
    <div class="col-xl-3 col-lg-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">Add New User</h4>
                </div>
            </div>
                <div class="card-body">
                <form>
                    <div class="form-group">
                        <div class="profile-img-edit position-relative">
                        <img src="../../assets/images/avatars/01.png" alt="profile-pic" class="theme-color-default-img profile-pic rounded avatar-100" loading="lazy">
                        <img src="../../assets/images/avatars/avtar_1.png" alt="profile-pic" class="theme-color-purple-img profile-pic rounded avatar-100" loading="lazy">
                        <img src="../../assets/images/avatars/avtar_2.png" alt="profile-pic" class="theme-color-blue-img profile-pic rounded avatar-100" loading="lazy">
                        <img src="../../assets/images/avatars/avtar_4.png" alt="profile-pic" class="theme-color-green-img profile-pic rounded avatar-100" loading="lazy">
                        <img src="../../assets/images/avatars/avtar_5.png" alt="profile-pic" class="theme-color-yellow-img profile-pic rounded avatar-100" loading="lazy">
                        <img src="../../assets/images/avatars/avtar_3.png" alt="profile-pic" class="theme-color-pink-img profile-pic rounded avatar-100" loading="lazy">
                        <div class="upload-icone bg-primary">
                            <svg class="upload-button icon-14" width="14" height="14" viewBox="0 0 24 24">
                                <path fill="#ffffff" d="M14.06,9L15,9.94L5.92,19H5V18.08L14.06,9M17.66,3C17.41,3 17.15,3.1 16.96,3.29L15.13,5.12L18.88,8.87L20.71,7.04C21.1,6.65 21.1,6 20.71,5.63L18.37,3.29C18.17,3.09 17.92,3 17.66,3M14.06,6.19L3,17.25V21H6.75L17.81,9.94L14.06,6.19Z" />
                            </svg>
                            <input class="file-upload" type="file" accept="image/*">
                        </div>
                        </div>
                        <div class="img-extension mt-3">
                        <div class="d-inline-block align-items-center">
                            <span>Only</span>
                            <a href="javascript:void(0);">.jpg</a>
                            <a href="javascript:void(0);">.png</a>
                            <a href="javascript:void(0);">.jpeg</a>
                            <span>allowed</span>
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">User Role:</label>
                        <select name="type" class="selectpicker form-control" data-style="py-0">
                        <option>Select</option>
                        <option>Web Designer</option>
                        <option>Web Developer</option>
                        <option>Tester</option>
                        <option>Php Developer</option>
                        <option>Ios Developer </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="furl">Facebook Url:</label>
                        <input type="text" class="form-control" id="furl" placeholder="Facebook Url">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="turl">Twitter Url:</label>
                        <input type="text" class="form-control" id="turl" placeholder="Twitter Url">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="instaurl">Instagram Url:</label>
                        <input type="text" class="form-control" id="instaurl" placeholder="Instagram Url">
                    </div>
                    <div class="form-group mb-0">
                        <label class="form-label" for="lurl">Linkedin Url:</label>
                        <input type="text" class="form-control" id="lurl" placeholder="Linkedin Url">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-xl-9 col-lg-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">New User Information</h4>
                </div>
            </div>
            <div class="card-body">
                <div class="new-user-info">
                    <form>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label class="form-label" for="fname">Nama Depan:</label>
                                <input type="text" class="form-control" id="fname" placeholder="Nama Depan">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="lname">Nama Belakang:</label>
                                <input type="text" class="form-control" id="lname" placeholder="Nama Belakang">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="add1">NIK:</label>
                                <input type="text" class="form-control" id="add1" placeholder="NIK">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="add2">No KK:</label>
                                <input type="text" class="form-control" id="add2" placeholder="No KK">
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="add1">Agama:</label>
                                <select class="form-select" data-trigger name="choices-single-default" id="choices-single-default">
                                    <option value="">Pilih Agama</option>
                                    @foreach($agama as $agamax)
                                        <option value="{{$agamax->id}}">{{$agamax->agama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="add2">Pendidikan Terakhir:</label>
                                <select class="form-select" data-trigger name="choices-single-default" id="choices-single-default">
                                    <option value="">Pilih Pendidikan</option>
                                    @foreach($pendidikan as $pendidikanx)
                                        <option value="{{$pendidikanx->id}}">{{$pendidikanx->pendidikan}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="form-group">
                                    <label class="form-label">Alamat KTP: *</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <label class="form-label">Alamat Domisili: *</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                                <div class="form-check d-block">
                                    <input class="form-check-input" type="checkbox" value="" id="checkedcheck" checked>
                                    <label class="form-check-label" for="checkedcheck">
                                        Sama dengan Alamat KTP
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="add1">Provinsi:</label>
                                <select class="form-select" data-trigger name="choices-single-default" id="choices-single-default">
                                    <option value="">Pilih Provinsi</option>
                                    @foreach($provinsi as $provinsix)
                                        <option value="{{$provinsix->id}}">{{$provinsix->provinsi}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="add2">Kabupaten / Kota:</label>
                                <select class="form-select" data-trigger name="choices-single-default" id="choices-single-default">
                                    <option value="">Pilih Kabupaten</option>
                                    @foreach($kabupaten as $kabupatenx)
                                        <option value="{{$kabupatenx->id}}">{{$kabupatenx->kabupaten_kota}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="add2">Kecamatan:</label>
                                <select class="form-select" data-trigger name="choices-single-default" id="choices-single-default">
                                    <option value="">Pilih Kecamatan</option>
                                    @foreach($kecamatan as $kecamatanx)
                                        <option value="{{$kecamatanx->id}}">{{$kecamatanx->kecamatan}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="form-label" for="add2">Kelurahan:</label>
                                <input type="text" class="form-control" id="add1" placeholder="Street Address 1">
                            </div>
                        </div>
                        
                        <div class="checkbox">
                            <label class="form-label"><input class="form-check-input me-2" type="checkbox" value="" id="flexchexked">Enable Two-Factor-Authentication</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Add New User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
 
@endsection
@section('add-js')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function () {
        		
        // $('#add{{ $activeMenu->access }}Form').on('submit', function (e) {
        //     e.preventDefault();

        //     $.ajax({
        //         url: '{{ route("kategorikkps.store") }}',
        //         method: 'POST',
        //         data: {
        //             _token: '{{ csrf_token() }}',
        //             kategori: $('#kategori').val(),
        //         },
        //         success: function (response) {
        //             alert(response.message);
        //             location.reload(); // Reload halaman setelah sukses
        //         },
        //         error: function (xhr) {
        //             alert('Terjadi kesalahan. Silakan coba lagi.');
        //         }
        //     });
        // });
    });
</script>
@endsection