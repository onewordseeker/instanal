@extends('layouts.master')




@section('content')

                <div class="content-wrapper">
                        <div class="content">							
                            <div class="row">
								<div class="col-lg-8 m-auto">
									<div class="">
										<div class="text-center card-header-border-bottom mb-4">
											<h2>Edit Package</h2>
										</div>
										<div class="card-body" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
											<form method="POST" action="{{url('packages/edit/'.$package->id)}}">
                                                @csrf
												<div class="form-row">
													<div class="col-md-6 mb-3">
														<label for="validationServer01">Title</label>
														<input type="text" class="form-control" id="validationServer01" placeholder="title" value="{{$package->title}}" name="title" required>
														<div class="valid-feedback">
															Looks good!
														</div>
													</div>
													<div class="col-md-6 mb-3">
														<label for="validationServer02">Staking Time</label>
														<input type="text" class="form-control" id="validationServer02" placeholder="Time" value="{{$package->stacking_time}}" name="time" required>
														<div class="valid-feedback">
															Looks good!
														</div>
													</div>
                                                    
                                                    <div class="col-md-12 mb-3" >
														<label for="validationServer02">PROFIT %</label>
														<input type="text" class="form-control" id="validationServer02" placeholder="%" value="{{$package->profit_percentage}}" name="profit" rows="3" required>
														<div class="valid-feedback">
															Looks good!
														</div>
													</div>
													<div class="col-md-6 mb-3">
														<label for="validationServerUsername">APR %</label>
														<input type="text" class="form-control" id="validationServerUsername" placeholder="%" name="apr" value="{{$package->apr_percentage}}" aria-describedby="inputGroupPrepend3"
														 required>
														<div class="invalid-feedback">
															Please enter Reward.
														</div>
													</div>
												</div>
												<button class="btn btn--primary" type="submit">Submit</button>
											</form>
										</div>
									</div>
								</div>
</div>

          


        </div>



@endsection