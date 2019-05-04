<table class="table table-responsive" id="places-table">
    <thead>
        <tr>
            <th>Place Name</th>
        <th>Country Id</th>
        <th>Description</th>
        <th>Place Image</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($places as $place)
        <tr>
            <td>{!! $place->Place_Name !!}</td>
            <td>{!! $place->country->Country_Name !!}</td>
            <td>{!! $place->Description !!}</td>
            <td>{!! $place->Place_IMG !!}</td>
            <td>
                {!! Form::open(['route' => ['places.destroy', $place->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('places.show', [$place->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('places.edit', [$place->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>