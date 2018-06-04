<div class="well bs-component">
    <form method="POST" action="{{ route('company.rinvoice.store') }}" id="invoice_form" accept-charset="UTF-8">
        @include('company.rental.invoices.fields')
    </form>
</div>
