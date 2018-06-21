<div class="well bs-component">
    <form method="POST" action="{{ route('company.rstock.store') }}" id="stock_form" accept-charset="UTF-8">
        @include('company.Rental.stocks.fields')
    </form>
</div>
