<div class="well bs-component">
    <form method="POST" action="{{ route('company.rfinancial.store') }}" id="financial_form" accept-charset="UTF-8">
        @include('company.Rental.financial.fields')
    </form>
</div>
