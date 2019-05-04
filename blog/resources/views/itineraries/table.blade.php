<table class="table table-responsive" id="itineraries-table">
    <thead>
        <tr>
            <th>Order Id</th>
        <th>Description</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($itineraries as $itinerary)
        <tr>
            <td>{!! $itinerary->Order_ID !!}</td>
            <td>{!! $itinerary->Description !!}</td>
            <td>
                {!! Form::open(['route' => ['itineraries.destroy', $itinerary->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('itineraries.show', [$itinerary->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('itineraries.edit', [$itinerary->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>