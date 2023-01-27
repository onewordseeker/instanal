@extends('layouts.master')



@section('content')

<div class="row">
							<div class="col-12"> 
                  <!-- Recent Order Table -->
                  <div class="card-table-border-none" id="recent-orders">
                    <div class="d-flex justify-content-between p-4">
                      <h2>Packages Details</h2>
                      <a href="{{url('package/create')}}" class="btn btn--primary">Create Package</a>
                      
                      <!-- <div class="date-range-report ">
                        <span></span>
                      </div> -->
                    </div>
                    <div class="card-body pt-0 pb-5">
                      <table class="table card-table table-responsive table-responsive-large" style="width:100%">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>TITLE</th>
                            <th class="d-none d-md-table-cell">STAKING TIME</th>
                            <th class="d-none d-md-table-cell">PROFIT %</th>
                            <th class="d-none d-md-table-cell">APR %</th>
                            <th class="d-none d-md-table-cell">STATUS</th>
                            <th class="d-none d-md-table-cell">CREATED AT</th>
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                           
                            @foreach($packages as $package)
                           
                          <tr>
                            <td >{{$package->id}}</td>
                            <td class="d-none d-md-table-cell">{{$package->title}}
                            </td>
                            <td class="d-none d-md-table-cell">{{$package->stacking_time}}</td>
                        
                            <td class="d-none d-md-table-cell">{{$package->profit_percentage}}</td>
                            <td class="d-none d-md-table-cell">{{$package->apr_percentage}}</td>
                            @if($package->is_active == 1)
                            <td class="d-none d-md-table-cell">{{'Active'}}</td>
                            @else
                            <td class="d-none d-md-table-cell">{{'Non Active'}}</td>
                            @endif
                            <td class="d-none d-md-table-cell">{{$package->created_at}}</td>
                            
                            <td class="text-right">
                            <a class="btn btn--warning" href="{{url('packages/edit/'.$package->id)}}" onclick="return confirm('Are You Sure?')">Edit</a>
                            <a class="btn btn--danger" href="{{url('packages/remove/'.$package->id)}}" onclick="return confirm('Are You Sure?')">Remove</a>
                                  
                            </td>
                          </tr>
                          <tr>
                       
                            @endforeach
                        </tbody>
                      </table>
                      {{$packages->links('pagination::bootstrap-4')}}
                    </div>
                  </div>
</div>
						</div>


@endsection