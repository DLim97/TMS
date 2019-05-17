@extends('layouts.app')

@section('content')
<section class="content-header">
	<h1>
		Dashboard
		<small>Control panel</small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
		<li class="active">Dashboard</li>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-red">
				<div class="inner">
					<h3>{{ $regions->count() }}</h3>
					<p>Regions</p>
				</div>
				<div class="icon">
					<i class="fa fa-globe"></i>
				</div>
				<a href="/regions" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
					<h3>{{ $countries->count() }}</h3>
					<p>Countries</p>
				</div>
				<div class="icon">
					<i class="fa fa-plane"></i>
				</div>
				<a href="/countries" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-yellow">
				<div class="inner">
					<h3>{{ $places->count() }}</h3>
					<p>Places</p>
				</div>
				<div class="icon">
					<i class="fa fa-binoculars"></i>
				</div>
				<a href="/places" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-aqua">
				<div class="inner">
					<h3>{{ $hotels->count() }}</h3>
					<p>Hotels</p>
				</div>
				<div class="icon">
					<i class="fa fa-building"></i>
				</div>
				<a href="/hotels" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-purple">
				<div class="inner">
					<h3>{{ $travels->count() }}</h3>
					<p>Travel</p>
				</div>
				<div class="icon">
					<i class="ion ion-bag"></i>
				</div>
				<a href="/travels" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-maroon">
				<div class="inner">
					<h3>{{ $activities->count() }}</h3>
					<p>Acitvity</p>
				</div>
				<div class="icon">
					<i class="fa  fa-soccer-ball-o"></i>
				</div>
				<a href="/activities" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6 col-md-6">
			<div class="box box-danger">
				<div class="box-header with-border">
					<h3 class="box-title">Donut Chart</h3>

					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
						</button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
					</div>
				</div>
				<div class="box-body">
					<canvas id="pieChart" style="height: 243px; width: 487px;" width="730" height="375"></canvas>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
		<div class="col-lg-6 col-md-6">
			<div class="box box-success">
				<div class="box-header with-border">
					<h3 class="box-title">Bar Chart</h3>

					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
						</button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
					</div>
				</div>
				<div class="box-body">
					<canvas id="bar-chart"" style="height: 243px; width: 487px;" width="730" height="375"></canvas>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
		<div class="col-lg-12 col-md-12">
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">Line Chart</h3>

					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
						</button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
					</div>
				</div>
				<div class="box-body">
					<div class="chart">
						<canvas id="lineChart" style="height: 243px; width: 487px;" width="730" height="375"></canvas>
					</div>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
	</div>
</section>
@endsection

@section('scripts')
<script type="text/javascript">

	var custom = {!! json_encode($orders->where('Travel_ID', NULL)->count()) !!}
	var package = {!! json_encode($orders->where('Travel_ID', '!=' , NULL)->count()) !!}
	console.log(package);

	var ctxpie = document.getElementById('pieChart').getContext('2d');

	var data = {
		datasets: [{
			data: [custom, package],
			backgroundColor: ['#dd4b39 ', '#f39c12 '],
			hoverBackgroundColor: ['#dd4b39 ', '#f39c12 ']
		}],
		labels: [
		'Custom',
		'Package'
		],
	};

	var myPieChart = new Chart(ctxpie, {
		type: 'pie',
		data: data
	});


	var customSales = {!! json_encode($orders->where('Travel_ID', NULL)->sum('Price')) !!}
	var packageSales = {!! json_encode($orders->where('Travel_ID', '!=' , NULL)->sum('Price')) !!}

	var ctxbar = document.getElementById('bar-chart').getContext('2d');

	var myBarChart = new Chart(ctxbar, {
		type: 'bar',
		data: {
			labels: ["Package", "Custom"],
			datasets: [
			{
				label: "Sales by package type",
				backgroundColor: ["#3e95cd", "#8e5ea2"],
				data: [packageSales,customSales]
			}
			]
		},
		options: {
			legend: { display: false },
			title: {
				display: true,
				text: 'Sales by package type'
			}
		}
	});



	var ctxline = document.getElementById('lineChart').getContext('2d');

	var month_array = {!! json_encode($month_array) !!}

	var myLineChart = new Chart(ctxline, {
		type: 'line',
		data: {
			labels: ['January','February','March','April','June','July','August','September','October','November', 'December'],
			datasets: [{ 
				data: month_array,
				label: "Frequency of travel packages by month",
				borderColor: "#3e95cd",
				fill: false
			}
			]
		},
		options: {
			title: {
				display: true,
				text: 'Months travel packages usually for'
			}
		}
	});
</script>
@endsection
