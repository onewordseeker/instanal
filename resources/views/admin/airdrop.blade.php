@extends('layouts.master')



@section('content')

<div class="row">
							<div class="col-12"> 
                  <!-- Recent Order Table -->
                  <div class="card-table-border-none" id="recent-orders">
                    <div class="text-center mt-4 justify-content-between">
                      <h2>AirDrop Details</h2>
                      
                      
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
                            <th class="d-none d-md-table-cell">TO ADDRESS</th>
                            <th class="d-none d-md-table-cell">CREATED AT</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($airdrop as $participant)
                          <tr>
                            <td >{{$participant->name}}</td>
                            <td class="d-none d-md-table-cell">
                             {{$participant->airdrop}}
                            </td>
                            <td class="d-none d-md-table-cell">{{$participant->airdrop_receiving_wallet_address}}</td>
                            
                            <td class="d-none d-md-table-cell">{{$participant->created_at}}</td>
                            
                          </tr>
                          <tr>
                            @endforeach
                        </tbody>
                      </table>
                      {{$airdrop->links('pagination::bootstrap-4')}}
                    </div>
                  </div>
</div>
						</div>


@endsection