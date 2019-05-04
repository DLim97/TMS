<table class="table table-responsive" id="orders-table">
    <thead>
        <tr>
            <th>User Id</th>
        <th>Travel Id</th>
        <th>Roomtype Id</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Price</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
            <td>{!! $order->User_ID !!}</td>
            <td>{!! $order->Travel_ID !!}</td>
            <td>{!! $order->RoomType_ID !!}</td>
            <td>{!! $order->Start_date !!}</td>
            <td>{!! $order->End_date !!}</td>
            <td>{!! $order->Price !!}</td>
            <td>
                {!! Form::open(['route' => ['orders.destroy', $order->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('orders.show', [$order->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('orders.edit', [$order->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>