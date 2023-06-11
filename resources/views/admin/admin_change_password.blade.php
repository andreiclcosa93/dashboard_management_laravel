@extends('admin.admin_master')

@section('admin')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Change Password Page </h4>
                </div>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.profile') }}">Profile</a></li>
                        <li class="breadcrumb-item active text-info">Change Password Page </li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">

                        @if(count($errors))
                            @foreach ($errors->all() as $error)
                            <p class="alert alert-danger alert-dismissible fade show"> {{ $error}} </p>
                            @endforeach

                        @endif

                        <form method="post" action="{{ route('update.password') }}" >
                            @csrf

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Old Password</label>
                                <div class="col-sm-10">
                                    <input name="oldpassword" class="form-control" type="password"   id="oldpassword">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">New Password</label>
                                <div class="col-sm-10">
                                <input name="newpassword" class="form-control" type="password"  id="newpassword">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-10">
                                    <input name="confirm_password" class="form-control" type="password"   id="confirm_password">
                                </div>
                            </div>

                            <input type="submit" class="btn btn-info waves-effect waves-light" value="Change Password">
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>



@endsection
