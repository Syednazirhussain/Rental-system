



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

