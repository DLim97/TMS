<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>@yield('title')</title>

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

	<!-- Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

	<!-- KnockoutJs -->
	<script type='text/javascript' src="https://cdnjs.cloudflare.com/ajax/libs/knockout/3.5.0/knockout-min.js"></script>

	<!-- Datepicker -->
	<link rel="stylesheet" href="{{ asset('/datepicker/css/bootstrap-datepicker.css')}}">


	<!-- Data Tables -->
	<link rel="stylesheet" type="text/css" href="{{ asset('/DataTables/datatables.min.css')}}"/>

	<!-- Data Tables -->
	<script type="text/javascript" src="{{ asset('/DataTables/datatables.min.js')}}"></script>

	<!-- Datepicker -->
	<script type="text/javascript" src="{{ asset('/datepicker/js/bootstrap-datepicker.js')}}"></script>

	<style type="text/css">

	body{
		font-family: 'Nunito';
	}

	.navbar{
		background-color: #41444A;
		position: relative;
	}
	
	.homepage_jumpborton{
		background-image: url("{{ asset('image/Travel.jpeg') }}");
		height: 650px;
		background-size: cover;
		background-repeat: no-repeat;
	}

	.tms_block{
		margin-top: 20px;
		margin-bottom: 20px;
	}


	.tms_block_title{
		margin: 30px 0px;
	}


	.tms_custom_block_bg{
		background-image: url('{{ asset('image/customized.jpg')  }}');
		background-size: 100% auto;
		background-position: center;
		height: 450px;
	}

	.tms_custom_block_cover{
		width: 100%;
		height: inherit;
		position: absolute;
		background-color: rgb(108, 117, 124, 0.8);
		z-index: 0;
	}

	.tms_custom_block_title{
		font-size: 54px;
		color: #ffffff;
		font-weight: 900;
	}

	.tms_custom_block_description{
		font-size: 24px;
		color: #ffffff;
		width: 650px;
		margin: auto;
	}

	.tms_custom_block_button{
		margin: 10px 0px;
		background-color: #87C0CD;
		border-color: #87C0CD;
		color:#F3F9FB;
	}

	.tms_custom_block_button:hover{
		background-color: #226597;
		border-color: #226597;
	}

	/*Travel Block CSS*/

	.travel_block{
		background-size: auto 100%;
		background-position-x: center;
		height: 570px;
		transition: 0.25s;
		position: relative;
		border-top: 10px solid #343434;
		border-radius: 5px;
	}

	.travel_block:hover{
		cursor: pointer;
	}


	.travel_block img{
		width: 100%;
		height: 100%;
		object-fit: cover;
		border-bottom-left-radius: 5px;
		border-bottom-right-radius: 5px;
	}

	.travel_block_cover{
		width: 100%;
		height: 100%;
		background-color: rgba(0,0,0,0);
		transition: 0.25s;
		position: absolute;
		top: 0;
		border-bottom-left-radius: inherit;
		border-bottom-right-radius: inherit;
	}

	.travel_block:hover .travel_block_cover{
		background-color: rgba(0,0,0,0.5);
	}

	.travel_block_product{
		background-color: #ffffff;
		position: absolute;
		bottom: 0;
		border-bottom-left-radius: 5px;
		border-bottom-right-radius: 5px;
	}

	.travel_block_product_description{
		height: 0;
		overflow: hidden;
		transition: 0.25s;
		border-bottom-left-radius: 5px;
		border-bottom-right-radius: 5px;
	}

	.travel_block:hover .travel_block_product_description{
		height: 250px;
	}

	.travel_block_dates span{
		display: inline-block;
		padding: 10px 15px;
		border: 1px solid #87c0cd;
		border-radius: 5px;
		font-weight: 600;
		color: #87c0cd;
	}

	.travel_block_dates i{
		color: #87c0cd;
	}


	/*Product Block Button CSS*/
	.travel_block_button{
		position: absolute;
		top: 50px;
		left: 50%;
		margin-left: -85px;
		border: 2px solid #fff;
		color: #fff;
		font-size: 18px;
		text-align: center;
		text-transform: uppercase;
		font-weight: 700;
		padding: 10px 0;
		width: 172px;
		opacity: 0;
		-webkit-transition: all 200ms ease-out;
		-moz-transition: all 200ms ease-out;
		-o-transition: all 200ms ease-out;
		transition: all 200ms ease-out;
	}

	.travel_block:hover .travel_block_button{
		opacity: initial;
	}

	.travel_block_button:hover{
		background-color: #ffffff;
		color: #87C0CD;
		text-decoration: none;
	}

	/*Product Block Text CSS*/

	.travel_block_product_title .title_name{
		font-size: 22px;
		font-weight: 600;
		color: #41444a;
	}

	.travel_block_product_title .title_country{
		font-size: 16px;
		color: #969699;
	}

	.travel_block_product_price span{
		font-size: 22px;
		font-weight: 600;
		color: #87C0CD;
	}

	.travel_block_product_description .description_title{
		font-size: 22px;
		font-weight: 600;
		color: #41444a;
	}

	.travel_block_product_description .description_text{
		font-size: 14px;
		color: #969699;
	}

	/*Country Card CSS*/


	.country_card{
		height: : auto;
		position: relative;
		border-radius: 5px;
	}

	.country_card img{
		width: 100%;
		border-radius: inherit;
	}

	.country_overlay{
		width: 100%;
		height: 100%;
		position: absolute;
		top: 0;
		display: flex;
		justify-content: center;
		align-items: center;
		background-color: rgba(0,0,0,0);
		transition: 0.3s;
		border-radius: inherit;
	}

	.country_card:hover .country_overlay{
		background-color: rgba(0,0,0,0.3);
		cursor: pointer;
	}

	.country_name{
		border: 2px solid #fff;
		color: #fff;
		font-size: 19px;
		text-align: center;
		text-transform: uppercase;
		font-weight: 700;
		padding: 10px 0;
		width: 172px;
		opacity: 0;
		transition: 0.3s;
	}

	.country_card:hover .country_name{
		opacity: 1;
		cursor: pointer;
	}

	.country_name:hover{
		background-color: #fff;
		text-decoration: none;
		color: #87C0CD;
		transition: 0.3s;
	}


	/*Search Bar CSS*/
	.search_bar{
		border-radius: 0;
		border-top-left-radius: 10px;
		border-bottom-left-radius: 10px;
		height: 45px;
	}

	.search_bar:focus{
		box-shadow: none;
	}


	.btn_tms_1{
		background-color: #87C0CD;
		color: #F7FFF7;
		border: 2px solid #87C0CD;
		height: 100%;
		font-size: 18px;
		transition: 0.3s;
	}

	.btn_tms_1:hover{
		background-color: #343434;
		color: #FFE66D;
		border: 2px solid #343434;
	}

	.btn_search{
		width: 100%;
		height: 100%;
		border-top-right-radius: 10px;
		border-bottom-right-radius: 10px;
	}

	.tms_search_filter_box{
		border-radius: 10px;
		background-color: #343434;

	}

	.custom-control-input:checked~.custom-control-label::before{
		border-color: #FFE66D;
		background-color: #FFE66D;
	}

	.custom-control-label{
		color: #F7FFF7;
	}

	/*Search Product Block Text CSS*/

	.tms_search_product{
		max-height: 210px;
		overflow: hidden;
		min-height: 80px;
	}

	.tms_search_product .title_name{
		font-size: 100%;
		font-weight: 600;
		color: #41444a;
	}

	.tms_search_product .title_country{
		font-size: 16px;
		color: #969699;
	}

	.tms_search_product_price span{
		font-size: 20px;
		font-weight: 600;
		color: #87C0CD;
	}

	.tms_search_product .description_title{
		font-size: 100%;
		font-weight: 600;
		color: #41444a;
	}

	.tms_search_product .description_text{
		font-size: 14px;
		color: #969699;
		text-align: justify;
	}

	.tms_search_product .hotels_price_text{
		color: #87c0cd;
		font-weight: 600;
	}

	.btn_group_search_product{

	}

	.btn_large{
		font-size: 18px;
		font-weight: 600;
		color: #F7FFF7;
		padding: 10px 0px;
		transition: 0.25s;
	}

	.btn_large a{
		text-decoration: none;
		color: #F7FFF7;
	}

	.btn_view_search{
		background-color: #87C0CD;
	}

	.btn_purchase_search{
		background-color: #FFE66D;
	}

	.btn_view_search:hover{
		background-color: #343434;
		cursor: pointer;
	}

	.btn_purchase_search:hover{
		background-color: #343434;
		cursor: pointer;
	}

	.card-img-top{
		height: 170px;
	}

</style>

<!-- Styles -->
@yield('css')

</head>

<!-- Latest compiled JavaScript -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>

<body>
	<nav class="navbar navbar-expand-md navbar-dark">
		<a class="navbar-brand" href="/">B.Adams</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNav">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="myNav">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link" href="/travel">Travels</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/hotel">Hotels</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/about">About Us</a>
				</li>  
				<li class="nav-item">
					<a class="nav-link" href="/contact">Contact Us</a>
				</li>  
			</ul>
			@if(auth()->check())
			<ul class="navbar-nav">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						{!! Auth::user()->name !!}
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" data-toggle="modal" data-target="#exampleModalCenter">Clear History</a>
						<a class="dropdown-item" href="/order">My Purchase</a>
					</div>
				</li>
				<li class="nav-item">
					<a href="{!! url('/logout') !!}" class="nav-link">Logout</a>
				</li>  
			</ul>
			@else
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="/login">Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="/register">Register</a>
				</li>  
			</ul>
			@endif
		</div>  
	</nav>

	@yield('content')

	<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLongTitle">Warning!</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					Are you sure you want to clear your history, all your preference will be reverted back to the original state.
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<a href="/clearHistory"><button type="button" class="btn btn-primary">Save changes</button></a>
				</div>
			</div>
		</div>
	</div>

	@yield('scripts')

</body>
</html>