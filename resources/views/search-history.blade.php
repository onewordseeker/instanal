@extends('layouts.master')

@section('content')
    <div class="az-content az-content-dashboard">
        <div class="container">
            <div class="az-content-body">
                <div class="az-dashboard-one-title">
                    <div>
                        <h2 class="az-dashboard-title">Hi, welcome back!</h2>
                        <p class="az-dashboard-text">Please have a look at your search history</p>
                    </div>

                </div><!-- az-dashboard-one-title -->

                <div class="row row-sm mg-b-20">
                    <!-- col -->
                    <div class="col-lg-12 mg-t-20 mg-lg-t-0">

                        <div class="az-content-label mg-b-20 mg-t-20">Profile Search History</div>
                        <div style="display: flex; justify-content:center;  height: 100vh; ">
                            <div class="table-responsive">
                                <table class="table table-bordered mg-b-0">
                                  <thead>
                                    <tr>
                                      <th>Id</th>
                                      <th>Profile Id</th>
                                      <th>Profile Username</th>
                                      <th>Date</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    @if ($search != 'No data')
                                    @foreach ($search as $sc)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$sc->profile_id}}</td>
                                        <td>{{$sc->profile_username}}</td>
                                        <td>{{diff_for_humans($sc->created_at)}}</td>
                                      </tr>
                                    @endforeach

                                    @endif

                                  </tbody>
                                </table>
                              </div>
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
