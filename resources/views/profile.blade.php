@extends('layouts.master')

@section('content')
    <div class="az-content az-content-dashboard">
        <div class="container">
            <div class="az-content-body">
                <div class="az-dashboard-one-title">
                    <div>
                        <h2 class="az-dashboard-title">Hi, welcome back!</h2>
                        <p class="az-dashboard-text">Your Account Settings</p>
                    </div>

                </div><!-- az-dashboard-one-title -->

                <div class="row row-sm mg-b-20">
                    <!-- col -->
                    <div class="col-lg-12 mg-t-20 mg-lg-t-0">

                        <div style="display: flex; justify-content:center; align-items:center; height: 100vh; ">
                            <div class="col-md-6">
                                <h4>Account Details</h4>
                                <form action="{{url('/profile-update')}}" method="POST">
                                    @csrf
                                    <div class="card mb-5">
                                        <div class="card-body">
                                            <div class="d-flex flex-column">
                                                <div class="form-group">
                                                    <input class="form-control" name="username" type="text" value="{{$user->name}}" readonly/>
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" name="email" type="email" value={{$user->email}} readonly/>
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" name="old_password" type="password" placeholder="Enter your Old password" required/>
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" name="new_password" type="password" placeholder="Enter your New password" required minlength="6"/>
                                                </div>
                                                <button class="btn btn-primary pd-x-20">Change Password</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!--col -->
                </div><!-- row -->

                <!-- row -->
            </div><!-- az-content-body -->
        </div>
    </div><!-- az-content -->
@endsection
