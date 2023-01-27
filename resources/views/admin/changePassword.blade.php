@extends('layouts.master')






@section('content')
<div class="card card-default">
										<div class="card-header card-header-border-bottom">
											<h2>Change Password</h2>
										</div>
										<div class="card-body">
											<form class="form-pill" method="POST" action="{{url('admin/users/changePass/'.Auth()->user()->id)}}" >
                                                @csrf
												<div class="form-group">
													<label for="exampleFormControlInput3">Old Password</label>
													<input type="password" class="form-control" id="exampleFormControlInput3" name="old_password" placeholder="Old Password">
												</div>
												<div class="form-group">
													<label for="exampleFormControlPassword3">New Password</label>
													<input type="password" class="form-control" id="exampleFormControlPassword3" name="new_password" placeholder="New Password">
												</div>
												<div class="form-group">
													<label for="exampleFormControlPassword3">Confirm Password</label>
													<input type="password" class="form-control" id="exampleFormControlPassword3" name="confirm_password" placeholder="Confirm Password">
												</div>
                                                <button class="btn btn-primary" type="submit">Submit</button>
											</form>
										</div>
									</div>

@endsection
