@extends('layouts.master')



@section('content')

<div class="row">
							<div class="col-12">
                  <!-- Recent Order Table -->
                  <div class="card-table-border-none" id="recent-orders">
                    <div class="p-3 d-flex justify-content-between">
                      <h2>Application Forms</h2>


                      <!-- <div class="date-range-report ">
                        <span></span>
                      </div> -->
                    </div>
                    <div class="card-body pt-0 pb-5">
                      <table class="table card-table table-responsive table-responsive-large" style="width:100%">
                        <thead>
                          <tr>


                            <th class="d-none d-md-table-cell">NAME</th>
                            <th>AMOUNT (MVDG)</th>
                            <th class="d-none d-md-table-cell">STATUS</th>
                            <th>ACTIONS</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>

                            @foreach($data as $user)

                          <tr>

                            <td class="d-none d-md-table-cell">
                             {{$user->name}}
                            </td>
                            <td class="d-none d-md-table-cell">
                                {{number_format($user->amount)}}
                                </td>

                            <td class="d-none d-md-table-cell">{{strtoupper($user->status)}}</td>
                            <td class="d-none d-md-table-cell">
                                <div style="display: flex; justify-content: space-around">
                                    <a href="{{'../../user_test/storage/app/public/'.$user->form}}" style="text-decoration: none" download class="btn btn-info">Download</a>
                            <form method="POST" action="{{url('applications/proceed/'.$user->id)}}">
                                @csrf
                                <button class="btn btn-success">Proceed</button>
                            </form>
                            <form method="POST" action="{{ url('applications/reject/'.$user->id)}}">
                                @csrf
                                <button type="submit" class="btn btn-danger">Reject</button>
                            </form>
                                </div>





                            <!--<td class="text-right">-->
                            <!--<a href="{{'../../user_test/storage/app/public/'.$user->form}}" download >{{$user->amount}}</a>-->
                            <!--<a class="btn btn-warning" href="{{url('admin/users/edit/'.$user->id)}}">Edit</a>-->
                            <!--<a class="btn btn-danger" href="{{url('admin/users/remove/'.$user->id)}}">Remove</a>-->

                            </td>
                          </tr>
                          <tr>

                            @endforeach
                        </tbody>
                      </table>
                      {{$data->links('pagination::bootstrap-4')}}
                    </div>
                  </div>
</div>
						</div>


@endsection
