<ul class="nav nav-tabs m-b-2" id="main_nav">
    
    <li role="presentation" class="active">
        <a href="{{ route('company.companySupports.index') }}"><i class="fa fa-ticket"></i>&nbsp;Active Tickets
            <!-- <span class="badge">2</span> -->
        </a>
    </li>
    <li role="presentation">
        <a href="{{ route('company.companySupports.completedTicket') }}"><i class="fa fa-check-circle"></i>&nbsp;Completed Tickets
            <!-- <span class="badge">90</span> -->
        </a>
    </li>
    <li role="presentation" class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0)" role="button" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-cog"></i>&nbsp;Settings 
        </a>
        <ul class="dropdown-menu" id="dropdown">
            <li role="presentation">
                <a href="{{ route('company.supportStatuses.index') }}">Statuses</a>
            </li>
            <li role="presentation">
                <a href="{{ route('company.supportPriorities.index') }}">Priorities</a>
            </li>
            <li role="presentation">
                <a href="javascript:void(0)">Agents</a>
            </li>
            <li role="presentation">
                <a href="{{ route('company.supportCategories.index') }}">Categories</a>
            </li>
            <li role="presentation">
                <a href="javascript:void(0)">Configuration</a>
            </li>
        </ul>
    </li>
</ul>
