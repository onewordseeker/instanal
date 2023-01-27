@extends('layouts.master')



@section('content')

<div class="row">
							<div class="col-12">
                  <!-- Recent Order Table -->
                  <div class="card-table-border-none" id="recent-orders">
                    <div class="p-3 d-flex justify-content-between">
                      <h2>User Details</h2>
                      <a href="{{url('admin/users/create')}}" class="btn btn--primary">Create User</a>

                      <!-- <div class="date-range-report ">
                        <span></span>
                      </div> -->
                    </div>
                    <div class="card-body pt-0 pb-5">
                      <table class="table card-table table-responsive table-responsive-large" style="width:100%">
                        <thead>
                          <tr>

                            <th>EMAIL</th>
                            <th class="d-none d-md-table-cell">NAME</th>
                            <th class="d-none d-md-table-cell">PHONE</th>
                            <th class="d-none d-md-table-cell">DOB</th>
                            <th class="d-none d-md-table-cell">REFERRAL CODE</th>
                            <th class="d-none d-md-table-cell">REFERRED BY</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>

                            @foreach($users as $user)
                            @if($user->is_admin == 0)
                          <tr>

                            <td class="d-none d-md-table-cell">
                             {{$user->email}}
                            </td>
                            <td class="d-none d-md-table-cell">{{$user->name}}</td>
                            @if($user->phone == NULL)
                            <td class="d-none d-md-table-cell">NULL</td>
                            @else
                            <td class="d-none d-md-table-cell">{{$user->phone}}</td>
                            @endif
                            @if($user->dob == NULL)
                            <td class="d-none d-md-table-cell">NULL</td>
                            @else
                            <td class="d-none d-md-table-cell">{{$user->dob}}</td>
                            @endif
                            <td class="d-none d-md-table-cell">{{$user->referral_code}}</td>
                            <td class="d-none d-md-table-cell">{{$user->referred_by}}</td>

                            <td class="text-right">
                            <a class="btn btn-warning" href="{{url('admin/users/edit/'.$user->id)}}">Edit</a>
                            <a class="btn btn-danger" href="{{url('admin/users/remove/'.$user->id)}}">Remove</a>

                            </td>
                          </tr>
                          <tr>
                            @endif
                            @endforeach
                        </tbody>
                      </table>
                      {{$users->links('pagination::bootstrap-4')}}
                    </div>
                  </div>
</div>
						</div>


@endsection
