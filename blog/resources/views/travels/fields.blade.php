<!-- Travel Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Travel_Name', 'Travel Name:') !!}
    {!! Form::text('Travel_Name', null, ['class' => 'form-control']) !!}
</div>

<!-- Hotel Name Field (Note: Not going to be saved into the database) -->
<div class="form-group col-sm-6">
    {!! Form::label('Hotel', 'Hotel:') !!}
    @php
    $hotels = \App\Models\Hotel::select('id','Hotel_Name','Place_ID')->get();
    @endphp
    <select class="form-control" id="Hotel_ID" name="Hotel_ID">
      @if(!isset($travel))
      @foreach($hotels as $hotel)
      <option value="{{ $hotel->id }}" data-hotel="{{ $hotel->id }}">{{ $hotel->Hotel_Name . " - "  . $hotel->place->Place_Name . ', ' . $hotel->place->country->Country_Name}}</option>
      @endforeach
      @else
      @foreach($hotels as $hotel)
      <option value="{{ $hotel->id }}" data-hotel="{{ $hotel->id }}"  {{ ($travel->roomType->hotel->id == $hotel->id) ? 'selected' : '' }}>{{ $hotel->Hotel_Name . " - "  . $hotel->place->Place_Name . ', ' . $hotel->place->country->Country_Name}}</option>      @endforeach
      @endif
    </select>

</div>

<!-- Roomtype Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('RoomType_ID', 'Type of Room:') !!}
    @php
    $roomTypes = \App\Models\RoomType::select('id','RoomType_Name','Hotel_ID')->get();
    @endphp
    <select class="form-control" id="RoomType_ID" name="RoomType_ID">
        @if(!isset($travel))
        <option value="" disabled selected>Select your option</option>
        @foreach($roomTypes as $roomType)
        <option value="{{ $roomType->id }}" data-hotel="{{ $roomType->hotel->id }}">{{ $roomType->RoomType_Name }}</option>
        @endforeach
        @else
        @foreach($roomTypes as $roomType)
        <option value="{{ $roomType->id }}" data-hotel="{{ $roomType->hotel->id }}" {{ ($travel->RoomType_ID == $roomType->id) ? 'selected' : '' }}>{{ $roomType->RoomType_Name }}</option>
        @endforeach
        @endif

    </select>
</div>


<!-- Start Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Start_date', 'Travel Name:') !!}
    {!! Form::text('Start_date', (isset($travel) ? $travel->Start_date->format('Y-m-d') : 'null'), ['class' => 'form-control', 'date-providers' => 'datepicker']) !!}
</div>

<!-- End Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('End_date', 'Travel Name:') !!}
    {!! Form::text('End_date', (isset($travel) ? $travel->End_date->format('Y-m-d') : 'null'), ['class' => 'form-control', 'date-providers' => 'datepicker']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Price', 'Price:') !!}
    {!! Form::text('Price', null, ['class' => 'form-control']) !!}
</div>


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('travels.index') !!}" class="btn btn-default">Cancel</a>
</div>


@section('scripts')
    <script type="text/javascript">

      $('#Start_date').datepicker({
        format: "yyyy-mm-dd"
      }).on('changeDate', function(e) {
        // update();
      });

      $('#End_date').datepicker({
        format: "yyyy-mm-dd"
      }).on('changeDate', function(e) {
        // update();
      });

      // function update(){
      //   var start = $('#Start_date').datepicker("getDate");
      //   var start_day = new Date(start);
      //   var end = $('#Start_date').datepicker("getDate");
      //   var end_day = new Date(end);

      //   var total_days = end_day - start_day;

      //   console.log(start_day);
      // }

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

      // $('#Start_date').datetimepicker({
      //   format: 'YYYY-MM-DD HH:mm:ss',
      //   useCurrent: false,
      // })

      // console.log('yea');
      // $('#End_date').datetimepicker({
      //   format: 'YYYY-MM-DD HH:mm:ss',
      //   useCurrent: false
      // })

      //   $( "#RoomType_ID" ).change(function() {
      //     var roomTypes = $('#Hotel_ID').find('option');
      //     $( roomTypes ).each(function( index ) {
      //         if( $(this).attr('data-hotel') != $( "#RoomType_ID" ).val() ){
      //           $(this).hide();
      //         }
      //         else{
      //           $(this).show();
      //       }
      //     });
      // });
  </script>
@endsection
