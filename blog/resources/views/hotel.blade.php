@extends('layouts.master')

@section('title','Hotel Page')

@section('css')

<style type="text/css">

.hotel_page_card{
	height: 100%;
}

.tms_search_product_price{
	text-align: center;
}

.tms_search_product{
	min-height: 
}

.card-img-top{
	height: 250px;
}

.tms_search_product .title_name{
	font-size: 110%;
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
				<div data-bind="foreach: regions">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" data-bind="value: id, checked: $root.selectedItem, click:$root.filterAction, attr: { id: 'customCheck' + $index() }">
						<label class="custom-control-label" data-bind="text: name, attr: { for: 'customCheck' + $index() }"></label>
					</div>	
				</div>
				<div>
					<input type="number" class="form-control" data-bind="textInput: budget"/>
				</div>
			</form>
		</div>
		<div class="col-9">
			<div class="row"  data-bind="foreach: {data: filtered_hotels, beforeRemove: removeHotel, afterAdd: addHotel}">
				<div class="col-6">
					<div class="card shadow hotel_page_card">
						<img class="card-img-top" data-bind="attr:{src: image}"  alt="Card image" style="width:100%">
						<div class="card-body p-0">
							<div class="col-12">
								<div class="row py-3">
									<div class="col-12 tms_search_product">
										<div class="title_name" data-bind="text:name"></div>
										<div class="title_country"><span data-bind="text:place"></span>, <span data-bind="text:country"></span></div>
									</div>
								</div>
								<div class="row">
									<div class="col-12 tms_search_product">
										<div class="description_title">Available Rooms</div>
										<div data-bind="foreach: roomTypes">
											<div class="row">
												<div class="col-6 description_text">
													<span data-bind="text: RoomType_Name"></span> ( <span data-bind="text: pax"></span> pax )
												</div>
												<div class="col-6 description_text hotels_price_text" style="text-align: right">
													RM <span data-bind="text: Price"></span>/pax
												</div>
											</div>
										</div>
									</div> 
								</div>
								<div class="row">
									<div class="col-12 tms_search_product">
										<div class="description_title">Facilities</div>
										<div data-bind="foreach: facilities">
											<a data-toggle="tooltip" data-placement="top" data-bind="attr:{title: Facility_Name}">
												<img data-bind="attr:{src: Facility_IMG}">
											</a>
										</div>
									</div> 
								</div>
								<div class="row">
									<div class="col-12 p-0 mt-3 btn_group_search_product text-center">
										<div class="col-12 btn_large btn_view_search">
											<div>View</div>
										</div>
										<div class="col-12 btn_large btn_purchase_search">
											<div>Customize</div>
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

	var hotels = {!! json_encode($hotel_array) !!};

	var regions = {!! json_encode($region_array) !!};

	function TravelBlock(name,place,country,region,roomTypes,image,facilities){
		var self = this;
		self.name = name;
		self.place = place;
		self.country = country;
		self.region = region;
		self.roomTypes = roomTypes;
		self.image = image;
		self.facilities = facilities;
	}

	function RegionBlock(id, name){
		var self = this;
		self.id = id;
		self.name = name;
	}

	function AppViewModel() {
		var self = this;
		this.budget = ko.observable('');
		self.hotels = ko.observableArray([]);
		self.regions = ko.observableArray([]);
		self.selectedItem = ko.observableArray([]);
		var pax = 0;

		$(hotels).each(function(index){
			$(this.RoomTypes).each(function(index){
				switch(this.Bed_Size){
					case "1": pax = 2;break;
					case "2": pax = 2;break;
					case "3": pax = 1;break;
					case "4": pax = 1;break;
				}
				this.pax = pax * this.NBeds;
			});



			self.hotels.push(new TravelBlock(this.Hotel_Name, this.Place, this.Country, this.Region,this.RoomTypes, this.Hotel_Image, this.Facilities));
		});


		$(regions).each(function(index){
			self.regions.push(new RegionBlock(this.id, this.Region_Name));
		});

		console.log(self.hotels());

		self.filtered_hotels = ko.computed(function(){
			var filtered = ko.utils.arrayFilter(self.hotels(), function(trav) {
				if(self.selectedItem().length > 0){
					for (var i = 0; i < self.selectedItem().length; i++) {
						if (trav.region == self.selectedItem()[i]){
							return true;
						}
					}
					return false;
				}
				else{
					return self.hotels();
				}
			});

			var budget = self.budget();

			filtered = ko.utils.arrayFilter(filtered, function(bud) {
				if(self.budget().length > 0){
					var checkBud = false;
					$(bud.roomTypes).each(function(index){
						if(this.Price <= budget){
							checkBud =  true;
							return;
						}
						else{
							checkBud = false;
						}
					});
					return checkBud;
				}
				else{
					return bud;
				}
			});



			return filtered;
		});

		self.search = function() { 
			var input = $('.search_bar').val();
			var keywords = $.trim(input);

			if(keywords.length > 0){
				$.ajax({
					method: "GET",
					url: "/getHotel/" + keywords,
				}).done(function(data) {
					console.log(data);
					self.hotels.removeAll();
					$(data).each(function(index){
						$(this.RoomTypes).each(function(index){
							switch(this.Bed_Size){
								case "1": pax = 2;break;
								case "2": pax = 2;break;
								case "3": pax = 1;break;
								case "4": pax = 1;break;
							}
							this.pax = pax * this.NBeds;
						});
						self.hotels.push(new TravelBlock(this.Hotel_Name, this.Place_Name, this.Country_Name, this.Region_ID,this.RoomTypes, this.Hotel_IMG, this.Facilities));

						$('[data-toggle="tooltip"]').tooltip();
					});
				});
			}
		}

		self.filterAction = function(filter) {
			return true;
		}

		self.removeHotel = function(element){
			$(element).slideUp( 400 , function() {
				$(element).remove();
			});
		}

		self.addHotel = function(element){
			$(element).hide().slideDown();
		}

	}

	ko.applyBindings(new AppViewModel());

	$('[data-toggle="tooltip"]').tooltip();



</script>

@endsection