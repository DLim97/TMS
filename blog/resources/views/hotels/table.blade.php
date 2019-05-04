<table class="table table-responsive" id="hotels-table">
    <thead>
        <tr>
            <th>Hotel Name</th>
        <th>Hotel Img</th>
        <th>Place Id</th>
        <th>Facility Id</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($hotels as $hotel)
        <tr>
            <td>{!! $hotel->Hotel_Name !!}</td>
            <td>{!! $hotel->Hotel_IMG !!}</td>
            <td>{!! $hotel->place->Place_Name !!}</td>
            <td>
                @php
                    $facilities = \App\Models\Facility::findMany($hotel->Facility_ID);
                @endphp
                @foreach($facilities as $facility)
                    <button class="btn btn-default">{!! $facility->Facility_Name !!}</button>
                @endforeach
            </td>
            <td>
                {!! Form::open(['route' => ['hotels.destroy', $hotel->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('hotels.show', [$hotel->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('hotels.edit', [$hotel->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>