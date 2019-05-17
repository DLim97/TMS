@extends('layouts.master')

@section('title','My Order')

@section('css')

<style type="text/css">

.todo-list li{
	list-style: none;
}

.todo-list-section .task-text{
	border: none;
	margin: 10px 0px;
	width: 80%;
}

.todo-list-section .completed .task-text{
	color: #808080;
	text-decoration:line-through;
}

.todo-list-section .custom-checkbox{
	display: inline-block;
}

.todo-list-section .btn-remove{
    background-color: #fff;
    color: #dc3545;
    font-size: 14px;
    height: 25px;
    width: 25px;
    padding: 5px 0px;
    border-radius: 5px;
    border: 1px solid #dc3545;
}

.todo-list-section .btn-remove:hover{
	background-color: #dc3545;
	color: #fff;
	cursor: pointer;
}

.todo-list-section .btn-add{
    background-color: #fff;
    color: #007bff;
    font-size: 14px;
    height: 25px;
    width: 25px;
    padding: 5px 0px;
    border-radius: 5px;
    border: 1px solid #007bff;
}

.todo-list-section .btn-add:hover{
	background-color: #007bff;
	color: #fff;
	cursor: pointer;
}

.btn-save{
    background-color: #fff;
    color: #28a745;
    font-size: 14px;
    border-radius: 5px;
    border: 1px solid #28a745;
}

.btn-save:hover{
	background-color: #28a745;
	color: #fff;
	cursor: pointer;
}

.todo-list-section .btn-todo{
	padding-left: 40px;
}

.btn-addList{
    background-color: #fff;
    color: #007bff;
    font-size: 14px;
    border-radius: 5px;
    border: 1px solid #007bff;
}

.btn-addList:hover{
	background-color: #007bff;
	color: #fff;
	cursor: pointer;
}

.toDoListheader{
	border: none;
	background-color: transparent;
	font-size: 24px;
	width: 100%;
}

.btn-light{
	border-radius: 5px;
}

</style>

@endsection

@section('content')
<div class="container">
	<div class="my-4">
		<h1>My Order <i class="fas fa-clipboard-list"></i></h1>
		<table id="orders" class="table table-hover table-dark">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Hotel</th>
					<th scope="col">Room Type</th>
					<th scope="col">Start Date</th>
					<th scope="col">End Date</th>
					<th scope="col">Location</th>
					<th scope="col">Price</th>
					<th scope="col">Package Type</th>
					<th scope="col">Itineraries</th>
				</tr>
			</thead>
			<tbody>
				@foreach($orders as $key => $order)
				<tr>
					<th scope="row">{{ $key + 1 }}</th>
					<td>{{ $order->roomType->hotel->Hotel_Name }}</td>
					<td>{{ $order->roomType->RoomType_Name }}</td>
					<td>{{ $order->Start_date->format('D d M y') }}</td>
					<td>{{ $order->End_date->format('D d M y') }}</td>
					<td>{{ $order->roomType->hotel->place->Place_Name . ', ' . $order->roomType->hotel->place->country->Country_Name}}</td>
					<td>{{ $order->Price }}</td>
					<td>{{ ($order->Travel_ID) ? 'Package' : 'Custom' }}</td>

					<td><a href="itinerary/{{ $order->id }}" class="btn btn-info">View</a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>


@endsection

@section('scripts')

<script type="text/javascript">

	$(document).ready(function() {
		$('#orders').DataTable();
	} );

</script>

@endsection
