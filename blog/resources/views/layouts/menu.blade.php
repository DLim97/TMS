


<li class="{{ Request::is('regions*') ? 'active' : '' }}">
    <a href="{!! route('regions.index') !!}"><i class="fa fa-edit"></i><span>Regions</span></a>
</li>

<li class="{{ Request::is('countries*') ? 'active' : '' }}">
    <a href="{!! route('countries.index') !!}"><i class="fa fa-edit"></i><span>Countries</span></a>
</li>

<li class="{{ Request::is('places*') ? 'active' : '' }}">
    <a href="{!! route('places.index') !!}"><i class="fa fa-edit"></i><span>Places</span></a>
</li>

<li class="{{ Request::is('activities*') ? 'active' : '' }}">
    <a href="{!! route('activities.index') !!}"><i class="fa fa-edit"></i><span>Activities</span></a>
</li>


<li class="{{ Request::is('hotels*') ? 'active' : '' }}">
    <a href="{!! route('hotels.index') !!}"><i class="fa fa-edit"></i><span>Hotels</span></a>
</li>


<li class="{{ Request::is('roomTypes*') ? 'active' : '' }}">
    <a href="{!! route('roomTypes.index') !!}"><i class="fa fa-edit"></i><span>Room Types</span></a>
</li>

<li class="{{ Request::is('travels*') ? 'active' : '' }}">
    <a href="{!! route('travels.index') !!}"><i class="fa fa-edit"></i><span>Travels</span></a>
</li>

<li class="{{ Request::is('facilities*') ? 'active' : '' }}">
    <a href="{!! route('facilities.index') !!}"><i class="fa fa-edit"></i><span>Facilities</span></a>
</li>

