



<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('admin.users.index') !!}"><i class="fa fa-edit"></i><span>Users</span></a>
</li>

<li class="{{ Request::is('userRoles*') ? 'active' : '' }}">
    <a href="{!! route('admin.userRoles.index') !!}"><i class="fa fa-edit"></i><span>User Roles</span></a>
</li>

<li class="{{ Request::is('userStatuses*') ? 'active' : '' }}">
    <a href="{!! route('admin.userStatuses.index') !!}"><i class="fa fa-edit"></i><span>User Statuses</span></a>
</li>

<li class="{{ Request::is('companies*') ? 'active' : '' }}">
    <a href="{!! route('admin.companies.index') !!}"><i class="fa fa-edit"></i><span>Companies</span></a>
</li>







<li class="{{ Request::is('modules*') ? 'active' : '' }}">
    <a href="{!! route('admin.modules.index') !!}"><i class="fa fa-edit"></i><span>Modules</span></a>
</li>


<li class="{{ Request::is('companyContactPeople*') ? 'active' : '' }}">
    <a href="{!! route('admin.companyContactPeople.index') !!}"><i class="fa fa-edit"></i><span>Company Contact People</span></a>
</li>

<li class="{{ Request::is('companyBuildings*') ? 'active' : '' }}">
    <a href="{!! route('admin.companyBuildings.index') !!}"><i class="fa fa-edit"></i><span>Company Buildings</span></a>
</li>

<li class="{{ Request::is('companyFloorRooms*') ? 'active' : '' }}">
    <a href="{!! route('admin.companyFloorRooms.index') !!}"><i class="fa fa-edit"></i><span>Company Floor Rooms</span></a>
</li>


<li class="{{ Request::is('companyContracts*') ? 'active' : '' }}">
    <a href="{!! route('admin.companyContracts.index') !!}"><i class="fa fa-edit"></i><span>Company Contracts</span></a>
</li>

<li class="{{ Request::is('discountTypes*') ? 'active' : '' }}">
    <a href="{!! route('admin.discountTypes.index') !!}"><i class="fa fa-edit"></i><span>Discount Types</span></a>
</li>


<li class="{{ Request::is('companyModules*') ? 'active' : '' }}">
    <a href="{!! route('admin.companyModules.index') !!}"><i class="fa fa-edit"></i><span>Company Modules</span></a>
</li>

<li class="{{ Request::is('companyUsers*') ? 'active' : '' }}">
    <a href="{!! route('admin.companyUsers.index') !!}"><i class="fa fa-edit"></i><span>Company Users</span></a>
</li>

<li class="{{ Request::is('companyInvoices*') ? 'active' : '' }}">
    <a href="{!! route('admin.companyInvoices.index') !!}"><i class="fa fa-edit"></i><span>Company Invoices</span></a>
</li>

<li class="{{ Request::is('roomLayouts*') ? 'active' : '' }}">
    <a href="{!! route('companyConference.roomLayouts.index') !!}"><i class="fa fa-edit"></i><span>Room Layouts</span></a>
</li>

<li class="{{ Request::is('roomLayouts*') ? 'active' : '' }}">
    <a href="{!! route('company/Conference.roomLayouts.index') !!}"><i class="fa fa-edit"></i><span>Room Layouts</span></a>
</li>

<li class="{{ Request::is('foods*') ? 'active' : '' }}">
    <a href="{!! route('company.conference.foods.index') !!}"><i class="fa fa-edit"></i><span>Foods</span></a>
</li>

