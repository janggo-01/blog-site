@extends('admin/Admin-main-template')

@section('isi-content')


<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <br>
                    <br>
                    <center>
                        <img class="rounded-circle avatar-xl" 
                        src="{{ (!empty($profile->profile_image)) ? url('/allimages/admin/'.$profile->profile_image) : url('/allimages/no-image.jpg') }}" 
                        alt="profile image">
                    </center>
                    <div class="card-body">
                        <hr>
                        <h4 class="card-title">Name : {{ $profile->name }}</h4>
                        <hr>
                        <h4 class="card-title">User Email : {{ $profile->email }}</h4>
                        <hr>
                        <h4 class="card-title">Username : {{ $profile->username }}</h4>
                        <hr>
                        <a href="/edit/profile" class="card-link">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection