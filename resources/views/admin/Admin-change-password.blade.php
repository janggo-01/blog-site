@extends('admin/Admin-main-template')

@section('isi-content')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Change Password</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Change Password</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        @if (count($errors))
                            @foreach ($errors->all() as $error )
                            <div class="">
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ $error }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                            @endforeach
                        @endif

                        <div class="row mb-3">
                            <form method="post" action="{{ route('update.password') }}">
                                @csrf
                                {{-- @method('post') --}}
                                <div class="row mb-3">
                                    <label for="OldPassword" class="col-sm-3 col-form-label">Old Password</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="password" name="OldPassword" id="OldPassword" />
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="NewPassword" class="col-sm-3 col-form-label">New Password</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="password" name="NewPassword" id="NewPassword">
                                    </div>
                                </div>
                                <!-- end row -->  
                                <div class="row mb-3">
                                    <label for="NewPasswordConfirmation" class="col-sm-3 col-form-label">New Password Confirmation</label>
                                    <div class="col-sm-6">
                                        <input class="form-control" type="password" name="NewPasswordConfirmation" id="NewPasswordConfirmation">
                                    </div>
                                </div>
                                <!-- end row -->                              
                                <input type="submit" value="Change Password" class="btn btn-info waves-effect waves-light"> 
                            </form>                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection