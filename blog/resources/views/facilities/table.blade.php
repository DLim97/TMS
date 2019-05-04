<table class="table table-responsive" id="facilities-table">
    <thead>
        <tr>
            <th>Facility Name</th>
        <th>Facility Img</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($facilities as $facility)
        <tr>
            <td>{!! $facility->Facility_Name !!}</td>
            <td>{!! $facility->Facility_IMG !!}</td>
            <td>
                {!! Form::open(['route' => ['facilities.destroy', $facility->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('facilities.show', [$facility->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('facilities.edit', [$facility->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>