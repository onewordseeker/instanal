@extends('layouts.master')



@section('content')

<div class="row">
							<div class="col-12"> 
                  <!-- Recent Order Table -->
                  <div class="card-table-border-none" id="recent-orders">
                    <div class="justify-content-between text-center mt-4">
                      <h2>Transaction Details</h2>
                      
                      
                      <!-- <div class="date-range-report ">
                        <span></span>
                      </div> -->
                    </div>
                    <div class="card-body pt-0 pb-5">
                      <table class="table card-table table-responsive table-responsive-large" style="width:100%">
                        <thead>
                          <tr>
                            <th>USER NAME</th>
                            <th>FROM</th>
                            <th class="d-none d-md-table-cell">TO</th>
                            <th class="d-none d-md-table-cell">AMOUNT</th>
                            <th class="d-none d-md-table-cell">CREATED AT</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($trans as $transaction)
                          <tr>
                            <td >{{$transaction->name}}</td>
                            <td class="d-none d-md-table-cell">
                              {{$transaction->from_address}}
                            </td>
                            <td class="d-none d-md-table-cell">{{$transaction->to_address}}</td>
                            <td class="d-none d-md-table-cell">{{$transaction->amount}} MVDG</td>
                            <td class="d-none d-md-table-cell">{{$transaction->created_at}}</td>
                            
                            
                          </tr>
                          <tr>
                            @endforeach
                        </tbody>
                      </table>
                      {{$trans->links('pagination::bootstrap-4')}}
                    </div>
                  </div>
</div>
						</div>


@endsection