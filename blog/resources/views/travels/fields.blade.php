<!-- Travel Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Travel_Name', 'Travel Name:') !!}
    {!! Form::text('Travel_Name', null, ['class' => 'form-control']) !!}
</div>

<!-- Hotel Name Field (Note: Not going to be saved into the database) -->
<div class="form-group col-sm-6">
    {!! Form::label('Hotel', 'Hotel:') !!}
    <select class="form-control" data-bind="options: hotels, value: selectedHotel, optionsText: 'name'"></select>

</div>

<!-- Roomtype Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('RoomType_ID', 'Type of Room:') !!}
    <select class="form-control" id="RoomType_ID" name="RoomType_ID" data-bind="options: selectedHotel().roomTypes, value: selectedRoomType, optionsText: 'RoomType_Name', optionsValue: 'id'"></select>
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Price', 'Price:') !!}
    {!! Form::text('Price', null, ['class' => 'form-control', 'data-bind' => 'value: price']) !!}
</div>


<!-- Start Date & End Date Field -->
<div class="form-group col-sm-12">
  <label for="RoomType_Name">Travel Dates</label>
  <div class="input-daterange input-group" id="datepicker">
    <input type="text" class="form-control Start_date" name="Start_date" data-bind="value: start_date" required />
    <span class="input-group-addon">TO</span>
    <input type="text" class="form-control End_date" name="End_date" data-bind="value: end_date" required />
  </div>
</div>



<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('travels.index') !!}" class="btn btn-default">Cancel</a>
</div>


@section('scripts')
    <script type="text/javascript">


      $('.input-daterange').datepicker({
        format: "yyyy-mm-dd"
      });

      $('.Start_date').change(function(){
        dateDiff();
      });

      $('.End_date').change(function(){
        dateDiff();
      });

      function dateDiff(){
        var start = $(".Start_date").val();
        var startD = new Date(start);
        var end = $(".End_date").val();
        var endD = new Date(end);
        var diff = parseInt((endD.getTime()-startD.getTime())/(24*3600*1000));

        $("#Price").val();
        console.log(diff);
      }

      $( "#Hotel_ID" ).change(function() {
        var roomTypes = $('#RoomType_ID').find('option');
        $( roomTypes ).each(function( index ) {
          if( $(this).attr('data-hotel') != $( "#Hotel_ID" ).val() ){
            $(this).hide();
          }
          else{
            $(this).show();
          }
        });
        $( roomTypes ).each(function( index ) {
          if($(this).css('display') == 'block'){
            $('#RoomType_ID').val($(this).val());
          }
        });
      });
      $('#Hotel_ID').trigger('change');



      var travels = {!! (isset($travel)) ? json_encode($travel) : "[]" !!};

      var hotels = {!! json_encode($hotels) !!};


      function HotelRoomBlock(id,name,roomTypes){
        var self = this;
        self.id = id;
        self.name = name;
        self.roomTypes = roomTypes;
      }



      function AppViewModel() {
        var self = this;
        self.selectedHotel = ko.observable('');
        self.hotels = ko.observableArray([]);
        self.selectedRoomType = ko.observable('');
        self.start_date = ko.observable('');
        self.end_date = ko.observable('');
        self.roomTypes = ko.observableArray([]);

        $(hotels).each(function(){
          self.hotels.push(new HotelRoomBlock(this.id, this.Hotel_Name, this.room_types));
        });

        $(self.hotels()).each(function(index){
            var hotel = this;
            $(this.roomTypes).each(function(){
              if(this.id == travels.RoomType_ID){
                self.selectedHotel(hotel);
                self.selectedRoomType(travels.RoomType_ID);
              }
            });
        });

        if(travels){
          var start = new Date(travels.Start_date);
          var dd = start.getDate();
          var mm = start.getMonth() + 1;

          var yyyy = start.getFullYear();
          if (dd < 10) {
            dd = '0' + dd;
          } 
          if (mm < 10) {
            mm = '0' + mm;
          } 

          } 
          self.start_date(start.getFullYear() + '-' + mm + '-' + dd);

          var end = new Date(travels.End_date);
          var dd = end.getDate();
          var mm = end.getMonth() + 1; 

          var yyyy = end.getFullYear();
          if (dd < 10) {
            dd = '0' + dd;
          } 
          if (mm < 10) {
            mm = '0' + mm;

          self.end_date(end.getFullYear() + '-' + mm + '-' + dd);
        }
        else{
          self.start_date('');
          self.end_date('');
        }




        self.price = ko.computed(function() {
          var start = self.start_date();
          var startD = new Date(start);
          var end = self.end_date();
          var endD = new Date(end);
          var diff = parseInt((endD.getTime()-startD.getTime())/(24*3600*1000));

          var selectedPrice = ko.utils.arrayFilter(self.selectedHotel().roomTypes, function(bud) {
            if(bud.id == self.selectedRoomType()){
              return true;
            }
          });

          if(selectedPrice.length != 0){
            console.log(selectedPrice);
            return selectedPrice[0].Price * diff;
          }

        });

      }

      ko.applyBindings(new AppViewModel());
  </script>
@endsection
