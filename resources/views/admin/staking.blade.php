@extends('layouts.master')



@section('content')

<div class="row">
							<div class="col-12"> 
                  <!-- Recent Order Table -->
                  <div class="card-table-border-none" id="recent-orders">
                    <div class="p-3 d-flex justify-content-between">
                      <h2>Staking Details</h2>
                      <a href="{{url('package/create')}}" class="btn btn--primary">Create Package</a>
                      
                      <!-- <div class="date-range-report ">
                        <span></span>
                      </div> -->
                    </div>
                    <div class="card-body pt-0 pb-5">
                      <table class="table card-table table-responsive table-responsive-large" style="width:100%">
                        <thead>
                          <tr>
                            <th>USER NAME</th>
                            <th>AMOUNT</th>
                            <th>PACKAGE</th>
                            <th class="d-none d-md-table-cell">RETURN AMOUNT</th>
                            <th class="d-none d-md-table-cell">STATUS</th>
                            <th class="d-none d-md-table-cell">STARTED ON</th>
                            
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                            @php($i = 1)
                            @if($type == 'funds')
                            @foreach($stakings as $package)
                            <?php
                            // dd(date('Y-m-d h:i:s', strtotime($package->staked_at. ' + '.($package->stacking_time - 1).' days')));
                            ?>
                                @if((date('Y-m-d h:i:s', strtotime($package->staked_at. ' + '.($package->stacking_time - 1).' days')) <= date('Y-m-d h:i:s')) && ($package->is_expired == 0 ))
                          <tr>
                            <td >{{$package->name}}</td>
                            <td class="d-none d-md-table-cell">
                              {{$package->stacked_amount}}
                            </td>
                            <td class="d-none d-md-table-cell">{{$package->title}}</td>
                            <td class="d-none d-md-table-cell">{{$package->return_amount}}</td>
                            <td class="d-none d-md-table-cell">{{'Funds Transfer Pending'}}</td>
                            <td class="d-none d-md-table-cell">{{$package->created_at}}</td>
                            <td>
                              <form method="POST"  action="{{url('staking/releaseFunds')}}" style="margin-top: 5px;">
                                @csrf
                                <button type="submit" class="btn btn--primary" onclick="return confirm('Are You Sure?')">Release Funds</button>
                                <input type="hidden" value="{{$package->user_id}}" name="id">
                              </form>
                            </td>
                                </tr>
                          <tr>
                              @endif
                             @endforeach
                                @else
                                @foreach($stakings as $package)
                          <tr>
                            <td >{{$package->name}}</td>
                            <td class="d-none d-md-table-cell">
                              {{$package->stacked_amount}}
                            </td>
                            <td class="d-none d-md-table-cell">{{$package->title}}</td>
                            <td class="d-none d-md-table-cell">{{$package->return_amount}}</td>
                            @if($package->is_expired == 0 && $package->is_completed == 0 && (date('Y-m-d h:i:s', strtotime($package->created_at. ' + '.($package->stacking_time - 1).' days')) >= date('Y-m-d h:i:s')))
                            <td class="d-none d-md-table-cell">{{'In Progress'}}</td>
                            @elseif($package->is_expired == 1 && $package->is_completed == 0)
                            <td class="d-none d-md-table-cell">{{'Cancelled'}}</td>
                            @elseif ((date('Y-m-d h:i:s', strtotime($package->created_at. ' + '.($package->stacking_time - 1).' days')) <= date('Y-m-d h:i:s')) && ($package->is_expired == 0 ))
                            <td class="d-none d-md-table-cell">{{'Funds Transfer Pending'}}</td>
                            @elseif($package->is_expired == 1 && $package->is_completed == 1)
                                 <td class="d-none d-md-table-cell">{{'Completed'}}</td>
                            @endif
                          
                            <td class="d-none d-md-table-cell">{{$package->created_at}}</td>
                            <td>
                             
                              @if((date('Y-m-d h:i:s', strtotime($package->created_at. ' + '.($package->stacking_time - 1).' days')) <= date('Y-m-d h:i:s')) && ($package->is_expired == 0 && $package->is_completed == 0))
                              <form method="POST"  action="{{url('staking/releaseFunds')}}" style="margin-top: 5px;">
                                @csrf
                                <button type="submit" class="btn btn--primary" onclick="return confirm('Are You Sure?')">Release Funds</button>
                                <input type="hidden" value="{{$package->user_id}}" name="id">
                              </form>
                              @endif
                            </td>
                                </tr>
                          <tr>
                            @endforeach
                            @endif
                        </tbody>
                      </table>
                      {{$stakings->appends(request()->query())->links('pagination::bootstrap-4')}}
                    </div>
                  </div>
</div>
						</div>


@endsection