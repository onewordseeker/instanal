@extends('layouts.master')



@section('content')

<div class="row">
							<div class="col-12"> 
                  <!-- Recent Order Table -->
                  <div class="card-table-border-none" id="recent-orders">
                    <div class="mt-4 text-center justify-content-between">
                      <h2>Wallet Details</h2>
                      
                      
                      <!-- <div class="date-range-report ">
                        <span></span>
                      </div> -->
                      
                    </div>
                    <div class="card-body pt-0 pb-5">
                      <table class="table card-table table-responsive table-responsive-large" style="width:100%">
                        <thead>
                          <tr>
                            <th>USER NAME</th>
                            <th>PUBLIC KEY</th>
                            <th class="d-none d-md-table-cell">CURRENT BALANCE (MVDG)</th>
                            <th class="d-none d-md-table-cell">TOKEN BALANCE (MVDG)</th>
                            <th class="d-none d-md-table-cell">USDT BALANCE</th>
                            <th class="d-none d-md-table-cell">WALLET TYPE</th>
                           
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($wallet as $user_wallet)
                          <tr>
                            <td >{{$user_wallet->name}}</td>
                            
                            <td class="d-none d-md-table-cell">{{$user_wallet->public_key}}</td>
                            <td class="d-none d-md-table-cell">{{$user_wallet->current_balance}}</td>
                            <td class="d-none d-md-table-cell">{{$user_wallet->token_balance}}</td>
                            <td class="d-none d-md-table-cell">{{$user_wallet->usdt_balance}}</td>
                            <td class="d-none d-md-table-cell">{{$user_wallet->wallet_type}}</td>
                            <td class="text-right">
                            <a class="btn btn--danger" href="">Copy Wallet Address</a>
                            <form method="POST" action="{{url('wallets/transfer/')}}" style="margin-top: 5px;">
                            @csrf
                            <button type="button" class="btn btn--primary" data-toggle="modal" data-target="#exampleModalCenter" onclick="return confirm('Are You Sure?')">
                                Transfer Funds
                              </button>

                              <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content" style="background-color: rgb(54, 55, 63);">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLongTitle">Transfer</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      <div style="text-align:center;">
                                        <p>Amount</p>
                                        <input type="hidden" name="id" value="{{$user_wallet->logged_in_user_id}}">
                                        <input type="text" style="border-style:dashed;background:none;color:white" placeholder="$" value="" name="amount3" required>
                                        
                                      </div>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn--warning" data-dismiss="modal">Close</button>
                                      <button type="Submit" class="btn btn--primary">Send</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                          </form>
                            
                                  
                            </td>
                          
                            
                            
                          </tr>
                          <tr>
                            @endforeach
                        </tbody>
                      </table>
                      {{$wallet->links('pagination::bootstrap-4')}}
                    </div>
                  </div>
</div>
						</div>
            <!-- <script>
                
                  document.querySelector(".transfer").addEventListener("click", (e) => {
                    e.preventDefault()
                    const div1 = document.querySelector(".field");
                    if(div1.style.display == "none"){
                      div1.style.display = "block";
                    }
                    else {
                      div1.style.display = "none"
                    }
                  })
                
            </script> -->


@endsection