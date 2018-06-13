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
        @include('company.rental.articles.article_edit')
    </div>
    <div class="tab-pane" id="prices">
        @include('company.rental.prices.edit')
    </div>
    <div class="tab-pane" id="stock">
        @include('company.rental.stocks.edit')
    </div>
    <div class="tab-pane" id="financial">
        @include('company.rental.financial.edit')
    </div>
</div>