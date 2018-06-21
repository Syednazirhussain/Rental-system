<div class="well bs-component">
    <form method="POST" action="{{ route('company.rprice.store') }}" id="price_form" accept-charset="UTF-8">
        @include('company.Rental.prices.fields')
    </form>
</div>
