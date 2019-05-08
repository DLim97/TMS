@extends('layouts.master')

@section('title','Travel Page')

@section('css')

<style type="text/css">

.travel_page_card{
	height: 100%;
	transition: 0.15s;
}

.travel_page_card:hover{
	cursor: pointer;
	box-shadow: 0 .5rem 1rem rgba(0,0,0,.15);
}

.travel_block_dates{
	text-align: center;
}

.tms_search_person_allowed span{
	font-size: 14px;
	color: #969699;
	font-weight: 400;
}

.filter_label{
    color: #fff;
    font-size: 16px;
    display: inline-block;
    padding: 5px 10px;
    border: 1px solid #ffe66d;
    margin: 10px 0px;
    border-radius: inherit;
}


</style>

@endsection



@section('content')
<div class="container my-4">
	<div class="form-group">
		<div class="row">
			<div class="col-11 pr-0">
				<input type="text" class="form-control search_bar" placeholder="Enter Keywords like Malaysia, Asia, etc." id="search_txt">
			</div>
			<div class="col-1 pl-0">
				<button  class="btn_tms_1 btn_search" type="submit" name="btn_search" data-bind="click: $root.search">
					<i class="fas fa-search"></i>
				</button>
			</div>
		</div>
	</div>
</div>
<div class="container mb-4">
	<div class="row">
		<div class="col-3">
			<form class="tms_search_filter_box shadow p-4">
				<div class="region_label filter_label">Regions</div>
				<div data-bind="foreach: regions">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" data-bind="value: id, checked: $root.selectedItem, click:$root.filterAction, attr: { id: 'customCheck' + $index() }">
						<label class="custom-control-label" data-bind="text: name, attr: { for: 'customCheck' + $index() }"></label>
					</div>	
				</div>
				<div class="budget_label filter_label">Budget</div>
				<div>
					<input type="number" class="form-control" data-bind="textInput: budget" placeholder="Enter budget"/>
				</div>
			</form>
		</div>
		<div class="col-9">
			<div class="row" data-bind="foreach: {data: filtered_travels, beforeRemove: removeTravel, afterAdd: addTravel}">
				<div class="col-4">
					<div class="card travel_page_card">
						<img class="card-img-top" data-bind="attr:{src: image}"  alt="Card image" style="width:100%">
						<div class="card-body p-0">
							<div class="col-12">
								<div class="row py-3">
									<div class="col-7 tms_search_product">
										<div class="title_name" data-bind="text: name"></div>
										<div class="title_country" data-bind="text: country"></div>
									</div>
									<div class="col-5 tms_search_product_price">
										<span>RM</span>
										<span data-bind="text: price"></span>
										<div class="tms_search_person_allowed text-center">
											<span data-bind="text:pax"></span><span> Person</span>
										</div>
									</div>
									<div class="col-12 my-2">
										<div class="travel_block_dates">
											<span data-bind="text: start_date"></span> <i class="fas fa-arrow-right"></i> <span data-bind="text: end_date"></span>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-12 tms_search_product">
										<div class="description_title">Description</div>
										<div class="description_text" data-bind="text: description"></div>
									</div> 
								</div>
								<div class="row">
									<div class="col-12 p-0 mt-3 btn_group_search_product text-center">
										<div class="col-12 btn_large btn_view_search">
											<a data-bind="attr:{href: '/travel_item/' + id}"><div>View</div></a>
										</div>
										<div class="col-12 btn_large btn_purchase_search">
											<a data-bind="attr:{href: '/purchase/1/' + id}"><div>Purchase</div></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection


@section('scripts')
<script type="text/javascript">

	var travels = {!! json_encode($travel_array) !!};

	var regions = {!! json_encode($region_array) !!};

	function TravelBlock(id,name,start_date,end_date,price,country,region,description,image,pax,country_id,place){
		var start = new Date(start_date);
		var modified_start = start.getDate() + "/" + (start.getMonth() + 1) + "/" + start.getYear().toString().substr(-2);
		var end = new Date(end_date);
		var modified_end = end.getDate() + "/" + (end.getMonth() + 1) + "/" + end.getYear().toString().substr(-2);

		var self = this;
		self.id = id;
		self.name = name;
		self.start_date = modified_start;
		self.end_date = modified_end;
		self.price = price;
		self.country = country;
		self.region = region;
		self.description = description;
		self.image = image;
		self.pax = pax;
		self.country_id = country_id;
		self.place = place;
	}

	function RegionBlock(id, name){
		var self = this;
		self.id = id;
		self.name = name;
	}

	function AppViewModel() {
		var self = this;
		self.budget = ko.observable('');
		self.sort = ko.observable('');
		self.travels = ko.observableArray([]);
		self.regions = ko.observableArray([]);
		self.selectedItem = ko.observableArray([]);

		$(travels).each(function(index){
			self.travels.push(new TravelBlock(this.id,this.Travel_Name,this.Start_date.date,this.End_date.date,this.Price,this.Country, this.Region, this.Description,this.Image,this.pax));
		});


		$(regions).each(function(index){
			self.regions.push(new RegionBlock(this.id, this.Region_Name));
		});

		self.filtered_travels = ko.computed(function(){
			var filtered = ko.utils.arrayFilter(self.travels(), function(trav) {
				if(self.selectedItem().length > 0){
					for (var i = 0; i < self.selectedItem().length; i++) {
						if (trav.region == self.selectedItem()[i]){
							return true;
						}
					}
					return false;
				}
				else{
					return self.travels();
				}
			});

			var budget = self.budget();

			filtered = ko.utils.arrayFilter(filtered, function(bud) {
				if(self.budget().length > 0){
					if(bud.price <= budget){
						return true;
					}
					else{
						return false;
					}
				}
				else{
					return bud;
				}
			}).sort(
				function(up, down){
					if(self.sort().length != 0){

						var nop = self.sort()[0];
						var budget = self.sort()[1];
						var location = self.sort()[2];

						if(up.price <= budget && up.place == location.Country_ID){
							return -1;
						}

						if(up.price <= budget && up.place == location.id){
							return -1;
						}

						if(up.pax == nop && up.country_id == location.Country_ID){
							return -1;
						}

						if(up.pax == nop && up.place == location.id){
							return -1;
						}

						if(up.price <= budget && up.pax == nop){
							return -1;
						}

						if(up.price <= budget && up.pax == nop && up.place == location.id){
							return -1;
						}

					}

				}
			);

			

			return filtered;
		});


		self.search = function() {
			var input = $('.search_bar').val();
			var keywords = $.trim(input);

			if(keywords.length > 0){
				$.ajax({
					method: "GET",
					url: "/getTravel/" + keywords,
				}).done(function(data) {
					self.travels.removeAll();
					$(data[0]).each(function(index){
						self.travels.push(new TravelBlock(this.id,this.Travel_Name,this.Start_date.Start_date,this.End_date.End_date,this.Price,this.Country_Name, this.Region_ID, this.Description,this.Place_IMG, this.pax, this.Country_ID, this.Place_ID));
					});
					self.sort(data[1]);
				});
			}
		}

		self.removeTravelBlock = function(travel) { 
			self.travels.remove(travel); 
		}

		self.filterAction = function(filter) {
			return true;
		}

		self.removeTravel = function(element){
			$(element).slideUp( 400 , function() {
				$(element).remove();
			});
		}

		self.addTravel = function(element){
			$(element).hide().slideDown();
		}

	}

	ko.applyBindings(new AppViewModel());


</script>
@endsection