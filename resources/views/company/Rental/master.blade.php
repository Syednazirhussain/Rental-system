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
    <li role="presentation" class="@if($tab == 'articles') active @endif">
        <a href="{{ route('company.rarticle.index') }}">Articles
            <span class="badge">2</span>
        </a>
    </li>
    <li role="presentation" class="@if($tab == 'prices') active @endif">
        <a href="{{ route('company.rprice.index') }}">Prices
            <span class="badge">2</span>
        </a>
    </li>
    <li role="presentation" class="@if($tab == 'stocks') active @endif">
        <a href="{{ route('company.rstock.index') }}">Stocks
            <span class="badge">2</span>
        </a>
    </li>
    <li role="presentation" class="@if($tab == 'financial') active @endif">
        <a href="{{ route('company.rfinancial.index') }}">Financial
            <span class="badge">2</span>
        </a>
    </li>
    <li role="presentation" class="@if($tab == 'buildings') active @endif">
        <a href="{{ route('company.rbuilding.index') }}">Buildings
            <span class="badge">2</span>
        </a>
    </li>
</ul>
