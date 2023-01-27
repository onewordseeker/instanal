@extends('layouts.master')



@section('content')
<div class="content-wrapper">
                        <div class="content">
                            <div class="row">
								<div class="col-lg-8">
									<div class="card card-default">
										<div class="card-header card-header-border-bottom">
											<h2>Edit User</h2>
										</div>
										<div class="card-body">
											<form method="POST" action="{{url('admin/users/edit/'.$user->id)}}">
                                                @csrf

												<div class="form-row">
													<div class="col-md-12 mb-3">
														<label for="validationServer01">Name</label>
														<input type="text" class="form-control" id="validationServer01" placeholder="Name" value="{{$user->name}}" name="name" required>
														<div class="valid-feedback">
															Looks good!
														</div>
													</div>
													<div class="col-md-12 mb-3">
														<label for="validationServer02">Email</label>
														<input type="email" class="form-control" id="validationServer02" placeholder="Email" value="{{$user->email}}" name="email" required>
														<div class="valid-feedback">
															Looks good!
														</div>
													</div>
                                                    <div class="col-md-12 mb-3">
														<label for="validationServer02">Phone</label>
														<input type="tel" class="form-control" id="validationServer02" placeholder="phone" value="{{$user->phone}}" name="phone" required>
														<div class="valid-feedback">
															Looks good!
														</div>
													</div>
													<div class="col-md-12 mb-3">
														<label for="validationServerUsername">New Password</label>
														<input type="password" class="form-control" id="validationServerUsername" placeholder="password" name="password" aria-describedby="inputGroupPrepend3"
														 required>
														<div class="invalid-feedback">
															Please enter a password.
														</div>
													</div>
                                                    <div class="col-md-12 mb-3">
														<label for="validationServerUsername">Confirm Password</label>
														<input type="password" class="form-control" id="validationServerUsername" placeholder="password" name="confirm_password" aria-describedby="inputGroupPrepend3"
														 required>
														<div class="invalid-feedback">
															Please confirm password.
														</div>
													</div>

												</div>

												<button class="btn btn-primary" type="submit">Submit</button>
											</form>
										</div>
									</div>
								</div>
</div>




        </div>


@endsection
