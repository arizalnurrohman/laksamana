@extends('layout.master')
@section('page', 'Permission')
@section('page_description', 'Menampilkan data Role dan Permission')
@section('add-css')

@endsection
@section('content')
<div class="row">
    {{-- <div class="col-sm-3">
        <div class="container-fluid content-inner pb-0" id="page_layout">
            <div class="d-grid gap-3 d-grid-template-1fr-19">
                <div class="card mb-0 group-card mb-0">
                    <div class="top-bg-image">
                        <img src="assets/images/profile-event/01.png" class="img-fluid w-100 rounded-0 rounded-top" alt="group-bg" loading="lazy" />
                    </div>
                    <div class="card-body text-center">
                        <div class="group-icon">
                            <img src="assets/images/group/01.jpg" alt="profile-img" class="rounded-circle img-fluid avatar-120" loading="lazy">
                        </div>
                        <div class="group-info pt-3 pb-3">
                            <h4><a href="group-detail.html">Designer</a></h4>
                            <p>Lorem Ipsum data</p>
                        </div>
                        <div class="group-details d-inline-block pb-3">
                            <ul class="d-flex align-items-center justify-content-between list-inline m-0 p-0 gap-3">
                                <li>
                                    <p class="mb-0">Post</p>
                                    <h6>600</h6>
                                </li>
                                <li>
                                    <p class="mb-0">Member</p>
                                    <h6>320</h6>
                                </li>
                                <li>
                                    <p class="mb-0">Visit</p>
                                    <h6>1.2k</h6>
                                </li>
                            </ul>
                        </div>
                        <div class="group-member mb-3">
                            <div class="iq-media-group">
                                <a href="#" class="iq-media">
                                    <img class="img-fluid avatar-40 rounded-circle" src="assets/images/avatar/01.png" alt="img1" loading="lazy" />
                                </a>
                                <a href="#" class="iq-media">
                                    <img class="img-fluid avatar-40 rounded-circle" src="assets/images/avatar/02.png" alt="img2" loading="lazy" />
                                </a>
                                <a href="#" class="iq-media">
                                    <img class="img-fluid avatar-40 rounded-circle" src="assets/images/avatar/03.png" alt="img3" loading="lazy" />
                                </a>
                                <a href="#" class="iq-media">
                                    <img class="img-fluid avatar-40 rounded-circle" src="assets/images/avatar/04.png" alt="img4" loading="lazy" />
                                </a>
                                <a href="#" class="iq-media">
                                    <img class="img-fluid avatar-40 rounded-circle" src="assets/images/avatar/05.png" alt="img5" loading="lazy" />
                                </a>
                                <a href="#" class="iq-media">
                                    <img class="img-fluid avatar-40 rounded-circle" src="assets/images/avatar/06.png" alt="img6" loading="lazy" />
                                </a>
                            </div>
                        </div>
                        <a href="group-detail.html" class="btn btn-primary d-block w-100">Join</a>
                    </div>
                </div>
                
            </div>
        </div>        
    </div> --}}
    @foreach($role as $roles)
    <div class="col-xl-3 col-lg-6 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                    <h6 class="fw-normal">Total <?php /*{{$roles->total_user}}*/?> users</h6>
                    <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" class="avatar avatar-sm pull-up" aria-label="Vinnie Mostowy" data-bs-original-title="Vinnie Mostowy">
                            <img class="rounded-circle" src="<?php /*{{ Module::asset('ipanel:img/avatars/1.png') }}*/?>" alt="Avatar">
                        </li>
                    </ul>
                </div>
                <div class="d-flex justify-content-between align-items-end">
                    <div class="role-heading w-100">
                        <h4 class="mb-1">{{ strtoupper($roles->name) }}</h4>
                        <?php /*<a href="javascript:;" data-bs-toggle="modal" data-bs-target="#addRoleModal" class="role-edit-modal"><small>Edit Role</small></a>*/?>
                        <br>
                        <div style="text-align:right !important">
                            <form action="{{ route('permission.destroy', $roles->id) }}" method="POST">
                                <a class="btn btn-info" href="{{ route('permission.show', $roles->id) }}">Show</a>
                                {{-- @can('update roles') --}}
                                    <a class="btn btn-primary" href="{{ route('permission.edit', $roles->id) }}">Edit</a>
                                {{-- @endcan --}}

                                @csrf
                                @method('DELETE')
                                {{-- @can('delete roles') --}}
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                {{-- @endcan --}}
                            </form>
                        </div>
                    </div>
                    <?php /*<a href="javascript:void(0);" class="text-muted"><i class="bx bx-copy"></i></a>*/ ?>
                </div>
            </div>
        </div>
    </div>
    @endforeach
 </div>
 
@endsection
@section('add-js')

@endsection