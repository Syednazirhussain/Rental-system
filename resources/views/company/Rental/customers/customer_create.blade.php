<div class="well bs-component">
    <form method="POST" action="{{ route('company.rcustomer.store') }}" id="customer_form" accept-charset="UTF-8">
        @include('company.rental.customers.fields')
    </form>
</div>