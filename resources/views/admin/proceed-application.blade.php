@extends('layouts.master')




@section('content')
    
    <style>
        .card-main1{
            display: flex;
            justify-content: space-between;
            width: 100%;
            margin: auto;
        }
        .card-main2{
            height: 120px;
            background-color: #ffba00;
            width: 220px;
            border-radius: 5px;
            padding: 12px;
  box-shadow: 1px 8px 40px -3px rgba(255,255,255,0.45);
-webkit-box-shadow: 1px 8px 40px -3px rgba(255,255,255,0.45);
-moz-box-shadow: 1px 8px 40px -3px rgba(255,255,255,0.45);
        }
        .card-main2 > h5, p {
            color: black;
        }
        
    </style>
                <div class="content-wrapper">
                        <div class="content">							
                            <div class="row">
								<div class="col-lg-9 m-auto">
									<div class="">
										<div class="text-center pb-5">
											<h2>Approve Application</h2>
										</div>
										<div class="card-main1">
										    <div class="card-main2">
										        <h5>User Balance (MVDG) </h5>
										        <p id="mvdg">{{$balance}}</p>
										    </div>
										    <div class="card-main2">
										        <h5>Requested Amount</h5>
										         <p id="req_amount">{{$amount}}</p>
										    </div>
										    <div class="card-main2">
										        <h5>Interest Rate</h5>
										        <p id="i_rate"></p>
										    </div>
										    <div class="card-main2">
										        <h5>Return Amount</h5>
										        <p id="return_amount"></p>
										    </div>
										</div>
										<br>
										<br>
										<div class="card-body" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; margin-top: 35px; width: 70%; margin: auto">
											<form method="POST" action="{{url('applications/approve')}}">
                                                @csrf
                                                @if(session('Success'))
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                <strong>session('success')</strong>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                                @endif
												<div class="form-row">
													<div class="col-md-12 mb-3">
														<label for="validationServer01">Grant Amount (MVDG)</label>
														<input type="number" class="form-control" id="grant_amount" placeholder="Amount" value="{{$amount}}" name="amount" onchange="change()" required>
														<div class="valid-feedback">
															Looks good!
														</div>
													</div>
													
													<div class="col-md-12 mb-3" id="error_div" style="display: none">
														<h6 style="color: #ffba00">The User Does Not Have 10% Interest Rate Of The Requested Amount!</h6>
													
													</div>
												</div>
												<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModalCenter">
                                                      Submit
                                                    </button>
                                                <input type="hidden" name="id" value="{{$id}}">
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                          <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content" style="background-color: #3b4551">
                                                              <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle" style="color: #ffba00">Confirmation</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                  <span aria-hidden="true">&times;</span>
                                                                </button>
                                                              </div>
                                                              <div class="modal-body">
                                                                Do you want to proceed with the application?
                                                              </div>
                                                              <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="submit" class="btn btn-warning">Proceed</button>
                                                              </div>
                                                            </div>
                                                          </div>
                                                        </div>

											
											</form>
										</div>
									</div>
								</div>
</div>


          


        </div>
        
        <script>

            document.getElementById("i_rate").innerHTML = parseInt(document.getElementById("grant_amount").value) * 0.10;
            document.getElementById("return_amount").innerHTML = parseInt(document.getElementById("grant_amount").value) +  parseInt(document.getElementById("i_rate").innerHTML) ;
            if((parseInt(document.getElementById("mvdg").innerHTML) < parseInt(document.getElementById("i_rate").innerHTML)) || parseInt(document.getElementById("mvdg").innerHTML) == 0){
                document.getElementById("error_div").style.display = "block";
            }
            
            function change(){
                 document.getElementById("i_rate").innerHTML = parseInt(document.getElementById("grant_amount").value) * 0.10;
            document.getElementById("return_amount").innerHTML = parseInt(document.getElementById("grant_amount").value) +  parseInt(document.getElementById("i_rate").innerHTML) ;
            }
        </script>



@endsection