@extends('layouts.master')



@section('content')

<div class="row">
							<div class="col-12"> 
                  <!-- Recent Order Table -->
                  <div class="card-table-border-none" id="recent-orders">
                    <div class="text-center mt-4 justify-content-between">
                      <h2>Withdrawls Details</h2>
                      
                      
                      <!-- <div class="date-range-report ">
                        <span></span>
                      </div> -->
                    </div>
                    <div class="card-body pt-0 pb-5">
                      <table class="table card-table table-responsive table-responsive-large" style="width:100%">
                        <thead>
                          <tr>
                            <th>USER NAME</th>
                            <th>TO ADDRESS</th>
                            <th class="d-none d-md-table-cell">FROM ADDRESS</th>
                            <th class="d-none d-md-table-cell">AMOUNT</th>
                            <th class="d-none d-md-table-cell">TYPE</th>
                            <th class="d-none d-md-table-cell">CREATED AT</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($Withdrawl as $With)
                          <tr>
                            <td >{{$With->name}}</td>
                            <td class="d-none d-md-table-cell">
                              {{$With->to_address}}
                            </td>
                            <td class="d-none d-md-table-cell">{{$With->from_address}}</td>
                            <td class="d-none d-md-table-cell">{{$With->amount}} MVDG</td>
                            <td class="d-none d-md-table-cell">{{$With->bonus_or_deposit}}</td>
                            <td class="d-none d-md-table-cell">{{$With->created_at}}</td>
                            
                            
                          </tr>
                          <tr>
                            @endforeach
                        </tbody>
                      </table>
                      {{$Withdrawl->links('pagination::bootstrap-4')}}
                    </div>
                  </div>
</div>
						</div>


@endsection