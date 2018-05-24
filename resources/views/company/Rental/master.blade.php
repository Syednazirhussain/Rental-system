<ul class="nav nav-tabs m-b-2">
    <li role="presentation"  class="@if($tab == 'customers') active @endif" >
        <a href="{{ route('company.rcustomer.index') }}">Customers
            <span class="badge">2</span>
        </a>
    </li>
    <li role="presentation" class="@if($tab == 'contacts') active @endif">
        <a href="{{ route('company.rcontact.index') }}">Contacts
            <span class="badge">2</span>
        </a>
    </li>
    <li role="presentation" class="@if($tab == 'signage') active @endif">
        <a href="{{ route('company.rsignage.index') }}">Signage
            <span class="badge">2</span>
        </a>
    </li>
</ul>
