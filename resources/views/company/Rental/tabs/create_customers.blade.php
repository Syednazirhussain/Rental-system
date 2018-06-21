<ul  class="nav nav-tabs m-b-2">
    <li class="active">
        <a  href="#customers" data-toggle="tab">Customers</a>
    </li>
    <li>
        <a href="#contacts" data-toggle="tab">Contacts</a>
    </li>
    <li>
        <a href="#signage" data-toggle="tab">Signage</a>
    </li>
    <li>
        <a href="#invoices" data-toggle="tab">Invoices</a>
    </li>
</ul>

<div class="tab-content clearfix">
    <div class="tab-pane active" id="customers">
        @include('company.Rental.customers.customer_create')
    </div>
    <div class="tab-pane" id="contacts">
        @include('company.Rental.contacts.create')
    </div>
    <div class="tab-pane" id="signage">
        @include('company.Rental.signage.create')
    </div>
    <div class="tab-pane" id="invoices">
        @include('company.Rental.invoices.create')
    </div>
</div>
