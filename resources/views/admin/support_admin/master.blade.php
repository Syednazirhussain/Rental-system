<ul class="nav nav-tabs m-b-2" id="main_nav">
    
    <li role="presentation" class="active">
        <a href="{{ route('admin.supports.index') }}">Active Tickets
            <!-- <span class="badge">2</span> -->
        </a>
    </li>
    <li role="presentation">
        <a href="{{ route('admin.supports.completed') }}">Completed Tickets
            <!-- <span class="badge">90</span> -->
        </a>
    </li>
<!--     <li role="presentation">
            <a href="#">Dashboard</a>
    </li> -->
    <li role="presentation" class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            Settings 
        </a>
        <ul class="dropdown-menu" id="dropdown">
            <li role="presentation">
                <a href="{{ route('admin.supportStatuses.index') }}">Statuses</a>
            </li>
            <li role="presentation">
                <a href="{{ route('admin.supportPriorities.index') }}">Priorities</a>
            </li>
            <li role="presentation">
                <a href="{{ route('admin.users.index') }}">Agents</a>
            </li>
            <li role="presentation">
                <a href="{{ route('admin.supportCategories.index') }}">Categories</a>
            </li>
            <li role="presentation">
                <a href="">Configuration</a>
            </li>
<!--             <li role="presentation" class="">
                <a href="">Administrator</a>
            </li> -->
        </ul>
    </li>
</ul>
