@extends('admin.admin_master')

@section('admin')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">My Profile</h4>
                </div>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active text-info">My Profile</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-lg-5">
                <div class="card"><br><br>
                    <div class="text-center">
                        <img class="rounded-circle avatar-xl" src="{{ (!empty($adminData->profile_image))? url('upload/admin_images/'.$adminData->profile_image):url('upload/no_image.jpg') }}" alt="Card image cap">
                    </div>

                    <div class="card-body">
                        <h4 class="card-title">Name : <span class="text-info"> {{ $adminData->name }}</span> </h4>
                        <hr>
                        <h4 class="card-title">User Email : <span class="text-info"> {{ $adminData->email }}</span> </h4>
                        <hr>
                        <h4 class="card-title">User Name : <span class="text-info">{{ $adminData->username }}</span> </h4>
                        <hr>
                        <div class="text-center">
                            <a href="{{ route('edit.profile') }}" class="btn btn-info btn-rounded waves-effect waves-light" > Edit Profile</a>

                            <a href="{{ route('change.password') }}" class="btn btn-warning btn-rounded waves-effect waves-light" > Change Password</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>

@endsection
