@extends('layouts.master')

@section('title','Payment Page')

@section('css')

<style type="text/css">

.border-top { 
	border-top: 1px solid #e5e5e5; 
}
.border-bottom { 
	border-bottom: 1px solid #e5e5e5; 
}
.border-top-gray { 
	border-top-color: #adb5bd; 
}

.box-shadow { 
	box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05); 
}

.lh-condensed { 
	line-height: 1.25; 
}

.custom-control-label{
	color: #363636;
}

.user_info {
    border: 1px solid #363636;
    border-radius: 5px;
    padding: 10px 10px;
    background-color: #363636;
    color: #fff;
}

.input-group-addon{
	padding: 7.5px 10px;
}

</style>

@endsection

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-12 order-md-1">
			<h4 class="my-4">Customer's Details</h4>
			<form method="POST" action="/purchase/{{ $type }}/ {{ $order->id }}">

				@csrf

				<div class="mb-3">
					<label for="name">Full Name</label>
					<div class="user_info">{{ $user->name }}</div>
				</div>


				<div class="mb-3">
					<label for="email">Email</label>
					<div class="user_info">{{ $user->email }}</div>
				</div>

				<div class="mb-3">
					<label for="address">Address</label>
					<div class="user_info">{{ $user->address }}</div>
				</div>

				<div class="mb-3">
					<label for="gender">Gender</label>
					<div class="user_info">{{ $user->gender }}</div>
				</div>

				<hr class="mb-4">

				<h4 class="mb-3">Order Details</h4>

				<div class="row">
					@if($type == 1)
					<div class="col-12 mb-3">
						<label for="travel_name">Travel Name</label>
						<div class="user_info">{{ $order->Travel_Name }}</div>
					</div>
					<div class="col-12 mb-3">
						<label for="Hotel_Name">Hotel Name</label>
						<div class="user_info">{{ $order->roomType->hotel->Hotel_Name }}</div>
					</div>
					<div class="col-12 mb-3">
						<label for="RoomType_Name)">Travel Name</label>
						<div class="user_info">{{ $order->roomType->RoomType_Name }}</div>
					</div>
					<div class="col-12 mb-3">
						<label for="RoomType_Name)">Total Price</label>
						<div class="user_info">RM {{ $order->Price }}</div>
					</div>
					<div class="col-6 mb-3">
						<label for="RoomType_Name)">Start Date</label>
						<div class="user_info">{{ $order->Start_date->format('D d M Y') }}</div>
					</div>
					<div class="col-6 mb-3">
						<label for="RoomType_Name)">End Date</label>
						<div class="user_info">{{ $order->End_date->format('D d M Y') }}</div>
					</div>
					@else
					<div class="col-12 mb-3">
						<label for="Hotel_Name">Hotel Name</label>
						<div class="user_info">{{ $order->hotel->Hotel_Name }}</div>
					</div>
					<div class="col-12 mb-3">
						<label for="RoomType_Name)">Room Type</label>
						<div class="user_info">{{ $order->RoomType_Name }}</div>
					</div>
					<div class="col-12 mb-3">
						<label for="RoomType_Name)">Price Per Night</label>
						<div class="user_info">RM {{ $order->Price }}</div>
					</div>
					<div class="col-12 mb-3">
						<label for="RoomType_Name)">Travel Dates</label>
						<div class="input-daterange input-group" id="datepicker">
							<input type="text" class="input-sm form-control" name="start_date" required />
							<span class="input-group-addon">TO</span>
							<input type="text" class="input-sm form-control" name="end_date" required />
						</div>
					</div>

					@endif
				</div>

				<hr class="mb-4">

				<h4 class="mb-3">Payment</h4>

				<div class="d-block my-3">
					<div class="custom-control custom-radio">
						<input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
						<label class="custom-control-label" for="credit">Credit card</label>
					</div>
					<div class="custom-control custom-radio">
						<input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
						<label class="custom-control-label" for="debit">Debit card</label>
					</div>
				</div>

				<div class="row">
					<div class="col-md-6 mb-3">
						<label for="cc-name">Name on card</label>
						<input type="text" class="form-control" id="cc-name" placeholder="" required>
						<small class="text-muted">Full name as displayed on card</small>
					</div>
					<div class="col-md-6 mb-3">
						<label for="cc-number">Card number</label>
						<input type="text" class="form-control" id="cc-number" placeholder="" minlength="12" maxlength="16" required onkeypress="return isNumber(event)">
					</div>
				</div>
				<div class="row">
					<div class="col-md-3 mb-3">
						<label for="cc-expiration">Expiration</label>
						<input type="text" class="form-control" id="cc-expiration" placeholder="" required minlength="4" maxlength="4" onkeypress="return isNumber(event)">
					</div>
					<div class="col-md-3 mb-3">
						<label for="cc-expiration">CVV</label>
						<input type="text" class="form-control" id="cc-cvv" placeholder="" required minlength="3" maxlength="3" onkeypress="return isNumber(event)">
					</div>
				</div>
				<hr class="mb-4">
				<button class="btn btn-primary btn-lg btn-block mb-4" type="submit">Continue to checkout</button>
			</form>
		</div>
	</div>
</div>

@endsection

@section('scripts')

<script type="text/javascript">

	$('.input-daterange').datepicker({
		format: "yyyy-mm-dd"
	});
	
	function isNumber(evt) {
		evt = (evt) ? evt : window.event;
		var charCode = (evt.which) ? evt.which : evt.keyCode;
		if (charCode > 31 && (charCode < 48 || charCode > 57)) {
			return false;
		}
		return true;
	}

</script>

@endsection