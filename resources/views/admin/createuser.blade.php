@extends('layouts.master')




@section('content')

                <div class="content-wrapper">
                        <div class="content">
                            <div class="row">
								<div class="col-lg-8 m-auto">
									<div class="">
										<div class="text-center pb-5">
											<h2>Register User</h2>
										</div>
										<div class="card-body" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
											<form method="POST" action="{{url('admin/users/create')}}">
                                                @csrf
                                                @if(session('Success'))
                                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                <strong>session('success')</strong>
                                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                                </div>
                                                @endif
												<div class="form-row">
													<div class="col-md-12 mb-3">
														<label for="validationServer01">Name</label>
														<input type="text" class="form-control" id="validationServer01" placeholder="Name" value="" name="name" required>
														<div class="valid-feedback">
															Looks good!
														</div>
													</div>
													<div class="col-md-12 mb-3">
														<label for="validationServer02">Email</label>
														<input type="email" class="form-control" id="validationServer02" placeholder="Email" value="" name="email" required>
														<div class="valid-feedback">
															Looks good!
														</div>
													</div>
                                                    <div class="col-md-12 mb-3">
														<label for="validationServer02">Phone</label>
														<input type="tel" class="form-control" id="validationServer02" placeholder="phone" value="" name="phone" required>
														<div class="valid-feedback">
															Looks good!
														</div>
													</div>
													<div class="col-md-12 mb-3">
														<label for="validationServerUsername">Password</label>
														<input type="password" class="form-control" id="validationServerUsername" placeholder="password" name="password" aria-describedby="inputGroupPrepend3"
														 required>
														<div class="invalid-feedback">
															Please enter a password.
														</div>
													</div>
                                                    <div class="col-md-12 mb-3">
														<label for="validationServerUsername">Confirm Password</label>
														<input type="password" class="form-control" id="validationServerUsername" placeholder="password" name="Conpassword" aria-describedby="inputGroupPrepend3"
														 required>
														<div class="invalid-feedback">
															Please confirm password.
														</div>
													</div>
                                                    <div class="col-md-12 mb-3">
														<label for="validationServerUsername">Referral Code</label>
														<input type="password" class="form-control" id="validationServerUsername" placeholder="Optional" name="r_code" aria-describedby="inputGroupPrepend3"
														 required>
														<div class="invalid-feedback">
															Please enter referral code.
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
