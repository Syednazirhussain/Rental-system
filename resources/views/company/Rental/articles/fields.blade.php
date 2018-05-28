<input name="_token" type="hidden" value="{{ csrf_token() }}">
@if(isset($rcustomer))
    <input name="_method" type="hidden" value="PATCH">
@endif

<legend>Create New Article</legend>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="module" class="control-label">Module </label>
            <input class="form-control" name="module" type="text" id="module">
        </div>
        <div class="col-md-6 form-group">
            <label for=""></label>
            <label class="custom-control custom-checkbox">
                <input type="checkbox" name="commission_article" class="custom-control-input">
                <span class="custom-control-indicator"></span>
                Commission Article
            </label>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-3 form-group">
            <label for="number" class="control-label">No </label>
            <input class="form-control" name="number" type="text" id="number">
        </div>
        <div class="col-md-3 form-group">
            <label for="building" class="control-label">Building </label>
            <input class="form-control" name="building" type="text" id="building">
        </div>
        <div class="col-md-6 form-group">
            <label for=""></label>
            <label class="custom-control custom-checkbox">
                <input type="checkbox" name="show_in_booking" class="custom-control-input">
                <span class="custom-control-indicator"></span>
                Show in Booking
            </label>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="article_name_swedish" class="control-label">Article Name Swedish</label>
            <input class="form-control" name="article_name_swedish" type="text" id="article_name_swedish">
        </div>
        <div class="col-md-6 form-group">
            <label for=""></label>
            <label class="custom-control custom-checkbox">
                <input type="checkbox" name="show_in_cash" class="custom-control-input">
                <span class="custom-control-indicator"></span>
                Show in Cash
            </label>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="article_name_english" class="control-label">Article Name English</label>
            <input class="form-control" name="article_name_english" type="text" id="article_name_english">
        </div>
        <div class="col-md-6 form-group">
            <label for=""></label>
            <label class="custom-control custom-checkbox">
                <input type="checkbox" name="show_in_online_booking" class="custom-control-input">
                <span class="custom-control-indicator"></span>
                Show in Online Booking
            </label>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-3 form-group">
            <label for="sales_price" class="control-label">Sales Price</label>
            <input class="form-control" name="sales_price" type="text" id="sales_price">
        </div>
        <div class="col-md-3 form-group">
            <label for="in_price" class="control-label">In Price</label>
            <input class="form-control" name="in_price" type="text" id="in_price">
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-3 form-group">
            <label for="unit" class="control-label">Unit (Price/Month)</label>
            <input class="form-control" name="unit" type="text" id="unit">
        </div>
        <div class="col-md-3 form-group">
            <label for="suppliers" class="control-label">Suppliers</label>
            <input class="form-control" name="suppliers" type="text" id="suppliers">
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-3 form-group">
            <label for="start_date" class="control-label">Start Date</label>
            <input class="form-control" name="start_date" type="text" id="start_date">
        </div>
        <div class="col-md-3 form-group">
            <label for="end_date" class="control-label">End Date</label>
            <input class="form-control" name="end_date" type="text" id="end_date">
        </div>
        <div class="col-md-6 form-group">
            <label for=""></label>
            <label class="custom-control custom-checkbox">
                <input type="checkbox" name="continues" class="custom-control-input">
                <span class="custom-control-indicator"></span>
                Continues
            </label>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="category" class="control-label">Category </label>
            <input class="form-control" name="category" type="text" id="category">
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for=""></label>
            <label class="custom-control custom-checkbox">
                <input type="checkbox" name="bonus_article" class="custom-control-input">
                <span class="custom-control-indicator"></span>
                Bonus Article
            </label>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for=""></label>
            <label class="custom-control custom-checkbox">
                <input type="checkbox" name="package_article" class="custom-control-input">
                <span class="custom-control-indicator"></span>
                Package Article
            </label>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-3 form-group">
            <label for="vat" class="control-label">VAT</label>
            <input class="form-control" name="vat" type="text" id="vat">
        </div>
        <div class="col-md-3 form-group">
            <label for="rank_index" class="control-label">Rank Index</label>
            <input class="form-control" name="rank_index" type="text" id="rank_index">
        </div>
        <div class="col-md-3 form-group">
            <label for="sort_index" class="control-label">Sort Index</label>
            <input class="form-control" name="sort_index" type="text" id="sort_index">
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-3 form-group">
            <label for="shortcut" class="control-label">Shortcut</label>
            <input class="form-control" name="shortcut" type="text" id="shortcut">
        </div>
        <div class="col-md-3 form-group">
            <label for="cancellation_condition" class="control-label">Cancellation Condition</label>
            <input class="form-control" name="cancellation_condition" type="text" id="cancellation_condition">
        </div>
    </div>

    <br>
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-10 text-right">
                <input class="btn btn-primary" type="submit" value="Save">
                <a href="{{ route('company.rarticle.index') }}" class="btn btn-default">Back</a>
            </div>
        </div>
    </div>
</div>