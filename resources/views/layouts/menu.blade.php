



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

<li class="{{ Request::is('packages*') ? 'active' : '' }}">
    <a href="{!! route('company.conference.packages.index') !!}"><i class="fa fa-edit"></i><span>Packages</span></a>
</li>

<li class="{{ Request::is('equipmentCriterias*') ? 'active' : '' }}">
    <a href="{!! route('company.conference.equipmentCriterias.index') !!}"><i class="fa fa-edit"></i><span>Equipment Criterias</span></a>
</li>

<li class="{{ Request::is('equipments*') ? 'active' : '' }}">
    <a href="{!! route('company.conference.equipments.index') !!}"><i class="fa fa-edit"></i><span>Equipments</span></a>
</li>

<li class="{{ Request::is('conferenceBookings*') ? 'active' : '' }}">
    <a href="{!! route('company/Conference.conferenceBookings.index') !!}"><i class="fa fa-edit"></i><span>Conference Bookings</span></a>
</li>

<li class="{{ Request::is('conferenceDurations*') ? 'active' : '' }}">
    <a href="{!! route('company/Conference.conferenceDurations.index') !!}"><i class="fa fa-edit"></i><span>Conference Durations</span></a>
</li>

<li class="{{ Request::is('conferenceBookingItems*') ? 'active' : '' }}">
    <a href="{!! route('company/Conference.conferenceBookingItems.index') !!}"><i class="fa fa-edit"></i><span>Conference Booking Items</span></a>
</li>

<li class="{{ Request::is('paymentMethods*') ? 'active' : '' }}">
    <a href="{!! route('admin.paymentMethods.index') !!}"><i class="fa fa-edit"></i><span>Payment Methods</span></a>
</li>

<li class="{{ Request::is('paymentCycles*') ? 'active' : '' }}">
    <a href="{!! route('admin.paymentCycles.index') !!}"><i class="fa fa-edit"></i><span>Payment Cycles</span></a>
</li>

<li class="{{ Request::is('permissions*') ? 'active' : '' }}">
    <a href="{!! route('admin.permissions.index') !!}"><i class="fa fa-edit"></i><span>Permissions</span></a>
</li>

<li class="{{ Request::is('supportStatuses*') ? 'active' : '' }}">
    <a href="{!! route('admin.supportStatuses.index') !!}"><i class="fa fa-edit"></i><span>Support Statuses</span></a>
</li>

<li class="{{ Request::is('supportCategories*') ? 'active' : '' }}">
    <a href="{!! route('admin.supportCategories.index') !!}"><i class="fa fa-edit"></i><span>Support Categories</span></a>
</li>

<li class="{{ Request::is('supportPriorities*') ? 'active' : '' }}">
    <a href="{!! route('admin.supportPriorities.index') !!}"><i class="fa fa-edit"></i><span>Support Priorities</span></a>
</li>

<li class="{{ Request::is('supports*') ? 'active' : '' }}">
    <a href="{!! route('admin.supports.index') !!}"><i class="fa fa-edit"></i><span>Supports</span></a>
</li>


<li class="{{ Request::is('bookingAgencies*') ? 'active' : '' }}">
    <a href="{!! route('company.bookingAgencies.index') !!}"><i class="fa fa-edit"></i><span>Booking Agencies</span></a>

<li class="{{ Request::is('companySupports*') ? 'active' : '' }}">
    <a href="{!! route('company.companySupports.index') !!}"><i class="fa fa-edit"></i><span>Company Supports</span></a>
</li>

<li class="{{ Request::is('companyCustomers*') ? 'active' : '' }}">
    <a href="{!! route('companyCustomers.index') !!}"><i class="fa fa-edit"></i><span>Company Customers</span></a>
</li>

<li class="{{ Request::is('roomSettingArrangments*') ? 'active' : '' }}">
    <a href="{!! route('roomSettingArrangments.index') !!}"><i class="fa fa-edit"></i><span>Room Setting Arrangments</span></a>
</li>

<li class="{{ Request::is('roomSettingArrangments*') ? 'active' : '' }}">
    <a href="{!! route('company.roomSettingArrangments.index') !!}"><i class="fa fa-edit"></i><span>Room Setting Arrangments</span></a>
</li>

<li class="{{ Request::is('roomImages*') ? 'active' : '' }}">
    <a href="{!! route('company.roomImages.index') !!}"><i class="fa fa-edit"></i><span>Room Images</span></a>
</li>

<li class="{{ Request::is('roomEquipments*') ? 'active' : '' }}">
    <a href="{!! route('company.roomEquipments.index') !!}"><i class="fa fa-edit"></i><span>Room Equipments</span></a>
</li>

<li class="{{ Request::is('roomNotes*') ? 'active' : '' }}">
    <a href="{!! route('company.roomNotes.index') !!}"><i class="fa fa-edit"></i><span>Room Notes</span></a>
>>>>>>> c30a99e22451927ebf9362b3c715927935a64c63
</li>

