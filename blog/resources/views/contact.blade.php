@extends('layouts.master')

@section('title','Contact Us')

@section('css')

<style type="text/css">

	.jumbotron{
		position: relative;
		height: 300px;
		background-image: url('{{ asset('image/contact_us.jpg') }}');
		background-size: cover;
		display: flex;
		align-items: center;
		align-content: center;
		text-align: center;
		background-position: center center;
	}

	.jumbotron .img_cover{
		width: 100%;
		height: 100%;
		position: absolute;
		top: 0;
		background-color: rgba(0, 0, 0, 0.7);
		z-index: 0;
	}

	.jumbotron .container{
		color: #fff;
		z-index: 1;
	}


	.jumbotron .container h1{
		display: inline-block;
		border: 2px solid #fff;
		padding: 10px 15px;
	}

	.jumbotron .container h1{
		display: inline-block;
		border: 2px solid #fff;
		padding: 10px 15px;
	}

	.about_us_block h1{
		display: inline-block;
		border-bottom: 1px solid #87c0cd;
	}

	.about_us_block .user_icon{
		text-align: center;
		display: flex;
		height: 150px;
		width: 150px;
		align-items: center;
		align-content: center;
		margin: auto;
		border: 5px solid #000;
		border-radius: 100%;
	}

	.about_us_block i{
		font-size: 70px;
		width: 100%;
	}

	.about_us_block h3{
		display: inline-block;
		padding: 20px 10px;
		border-left: 10px solid #87c0cd;
		background-color: #343434;
		color: #fff;
	}

	.contact_details{
		text-align: justify;
	}

</style>

@endsection

@section('content')


<div class="jumbotron jumbotron-fluid">
	<div class="img_cover"></div>
	<div class="container">
		<h1>Contact Us</h1>      
	</div>
</div>

<div class="container my-4 about_us_block">
	<div class="row">
		<div class="col-12 text-center mb-4">
			<h1>Contact Details</h1>
			<div class="row contact_details">
				<div class="col-3">
					<div>Contect Person's Name:</div>
					<div>Contect Number:</div>
					<div>Cotact Address:</div>
				</div>
				<div class="col-9">
					<div>Admin</div>
					<div>03-8996 1000</div>
					<div>Jalan Teknologi 5, Taman Teknologi Malaysia, 57000 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur</div>
				</div>
			</div>
		</div>
		<div class="col-12 text-center mb-4">
			<h1>Location</h1>
			<div class="my-4">
				<iframe width="100%" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=Jalan%20Teknologi%205%2C%20Taman%20Teknologi%20Malaysia%2C%2057000%20Kuala%20Lumpur%2C%20Wilayah%20Persekutuan%20Kuala%20Lumpur&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
			</div>
			
		</div>
	</div>
</div>


@endsection

@section('scripts')

<script type="text/javascript">


</script>

@endsection
