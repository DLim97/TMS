@extends('layouts.master')

@section('title','My Order')

@section('css')

<style type="text/css">

</style>

@endsection

@section('content')
<div class="container">
	<div class="my-4">
		<h1>My Order <i class="fas fa-clipboard-list"></i></h1>
		<table id="example" class="table table-hover table-dark">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">First</th>
					<th scope="col">Last</th>
					<th scope="col">Handle</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th scope="row">1</th>
					<td>Mark</td>
					<td>Otto</td>
					<td>@mdo</td>
				</tr>
				<tr>
					<th scope="row">2</th>
					<td>Jacob</td>
					<td>Thornton</td>
					<td>@fat</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>


@endsection

@section('scripts')
<script type="text/javascript">

	$(document).ready(function() {
		$('#example').DataTable();
	} );

</script>
@endsection
