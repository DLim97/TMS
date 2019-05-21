@extends('layouts.master')

@section('title','About Us')

@section('css')

<style type="text/css">

	.jumbotron{
		position: relative;
		height: 300px;
		background-image: url('{{ asset('image/about_us.jpg') }}');
		background-size: cover;
		display: flex;
		align-items: center;
		align-content: center;
		text-align: center;
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

</style>

@endsection

@section('content')


<div class="jumbotron jumbotron-fluid">
	<div class="img_cover"></div>
	<div class="container">
		<h1>About Us</h1>      
	</div>
</div>

<div class="container my-4 about_us_block">
	<div class="row">
		<div class="col-12 text-center mb-4">
			<h1>Our Mission</h1>
			<p class="lead">The team wishses to achieve a more convenient way of pruchasing travel packages rather than walking through travel discounts fairs or contact travel agencies. This buying approach has been an old fashion purchasing method. As all the other e-commerce businesses included web technology in it. The team wishes that the travel industry could implement it as well.</p>
		</div>
		<div class="col-12 text-center mb-4">
			<h1>About</h1>
			<p class="lead">The team developed this project for the purpose as the team's final year project. This project is also a platform for the team to test out the knowledge learnt throughout the entire educaiton. It can be used as a demonstration of skills to other people as well.</p>
		</div>
		<div class="col-12 text-center mb-4">
			<h1>Special Thanks to</h1>
			<div class="user_icon my-4">
				<i class="fas fa-user"></i>
			</div>
			<h3>Darrell Lim Yie Khai</h3>
			<h4 class="my-4">Asia Pacific University Student</h4>
		</div>
	</div>
</div>


@endsection

@section('scripts')

<script type="text/javascript">


</script>

@endsection
