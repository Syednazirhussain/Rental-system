<ul  class="nav nav-tabs m-b-2">
    <li class="active">
        <a  href="#articles" data-toggle="tab">Articles</a>
    </li>
    <li>
        <a href="#prices" data-toggle="tab">Prices</a>
    </li>
    <li>
        <a href="#stock" data-toggle="tab">Stock</a>
    </li>
    <li>
        <a href="#financial" data-toggle="tab">Financial</a>
    </li>
</ul>

<div class="tab-content clearfix">
    <div class="tab-pane active" id="articles">
        @include('company.Rental.articles.article_create')
    </div>
    <div class="tab-pane" id="prices">
        @include('company.Rental.prices.create')
    </div>
    <div class="tab-pane" id="stock">
        @include('company.Rental.stocks.create')
    </div>
    <div class="tab-pane" id="financial">
        @include('company.Rental.financial.create')
    </div>
</div>
