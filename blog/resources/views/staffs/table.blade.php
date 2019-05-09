<table class="table table-responsive" id="regions-table">
    <thead>
        <tr>
            <th>Staff Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>IC</th>
            <th>Job Title</th>
            <th>Address</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($staffs as $staff)
        <tr>
            <td>{!! $staff->name !!}</td>
            <td>{!! $staff->email !!}</td>
            <td>{!! $staff->gender !!}</td>
            <td>{!! $staff->ic !!}</td>
            <td>{!! $staff->job_title !!}</td>
            <td>{!! $staff->address !!}</td>
            <td>
                {!! Form::open(['route' => ['staffPage.destroy', $staff->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('staffPage.show', [$staff->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('staffPage.edit', [$staff->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>