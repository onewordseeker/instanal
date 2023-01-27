@extends('layouts.master');


@section('content')
<div class="card card-default">
										<div class="card-header card-header-border-bottom">
											<h2>Admin Wallets</h2>
										</div>
										<div class="card-body">
											<form method="POST" action="{{url('admin_wallets')}}">
                                                @csrf
												<div class="form-group">
													<label for="">ERC20 Address</label>
													<input type="text" class="form-control input-lg" name="erc20Wallet" value="{{ isset($wallets['erc20_wallet']) ? $wallets['erc20_wallet'] : '' }}" placeholder="ERC20 Address">
												</div>
                                                <div class="form-group">
													<label for="">TRC20 Address</label>
													<input type="text" class="form-control input-lg" name="trc20Wallet" value="{{ isset($wallets['trc20_wallet']) ? $wallets['trc20_wallet'] : '' }}" placeholder="TRC20 Address">
												</div>
                                                <button type="submit" class="btn btn-primary">Save</button>

											</form>
										</div>
									</div>
@endsection