<table class="table table-responsive" id="roomTypes-table">
    <thead>
        <tr>
            <th>Roomtype Name</th>
            <th>Hotel Id</th>
            <th>Price</th>
            <th>Description</th>
            <th>Roomtype Img</th>
            <th>Nbeds</th>
            <th>Bed Size</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($roomTypes as $roomType)
        <tr>
            <td>{!! $roomType->RoomType_Name !!}</td>
            <td>{!! $roomType->hotel->Hotel_Name !!}</td>
            <td>{!! $roomType->Price !!}</td>
            <td>{!! $roomType->Description !!}</td>
            <td>{!! $roomType->RoomType_IMG !!}</td>
            <td>{!! $roomType->NBeds !!}</td>
            @php
                $bedsize = [ '1'=> 'King', '2'=>'Queen', '3'=>'Super Single', '4'=>'Single'];
            @endphp
            <td>{!! $bedsize[$roomType->Bed_Size] !!}</td>
            <td>
                {!! Form::open(['route' => ['roomTypes.destroy', $roomType->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('roomTypes.show', [$roomType->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('roomTypes.edit', [$roomType->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>