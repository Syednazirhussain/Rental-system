<input name="_token" type="hidden" value="{{ csrf_token() }}">

@if(isset($article))
    <input name="_method" type="hidden" value="PATCH">
@endif

<legend>Create New Article</legend>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="module" class="col-md-5 form-label">Module </label>
            <div class="col-md-7">
                <input class="form-control" name="module" type="text" id="module" value="@if(isset($article)){{ $article->module }}@endif">
            </div>
        </div>
        <div class="col-md-6 form-group">
            <label for="number" class="col-md-5 form-label">No </label>
            <div class="col-md-7">
                <input class="form-control" name="number" type="number" id="number" value="@if(isset($article)){{ $article->number }}@endif">
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="building" class="col-md-5 form-label">Select Building </label>
            <div class="col-md-7">
                <select class="form-control" id="building" name="building">
                    @if(isset($article))
                        <option value="{{ $article->building }}">{{ $building_name }}</option>@endif
                    @foreach ($buildings as $building)
                        <option value="{{ $building->id }}"><span>{{ $building->name }}</span></option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6 form-group">
            <label for="article_name_swedish" class="col-md-5 form-label">Article Name Swedish</label>
            <div class="col-md-7">
                <input class="form-control" name="article_name_swedish" type="text" id="article_name_swedish" value="@if(isset($article)){{ $article->article_name_swedish }}@endif">
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="sales_price" class="col-md-5 form-label">Sales Price</label>
            <div class="col-md-7">
                <input class="form-control" name="sales_price" type="text" id="sales_price" value="@if(isset($article)){{ $article->sales_price }}@endif">
            </div>
        </div>
        <div class="col-md-6 form-group">
            <label for="article_name_english" class="col-md-5 form-label">Article Name English</label>
            <div class="col-md-7">
                <input class="form-control" name="article_name_english" type="text" id="article_name_english" value="@if(isset($article)){{ $article->article_name_english }}@endif">
            </div>
        </div>

    </div>

    <div class="col-md-12">

        <div class="col-md-6 form-group">
            <label for="in_price" class="col-md-5 form-label">In Price</label>
            <div class="col-md-7">
                <input class="form-control" name="in_price" type="text" id="in_price" value="@if(isset($article)){{ $article->in_price }}@endif">
            </div>
        </div>
        <div class="col-md-6 form-group">
            <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" value="@if(isset($article))checked @endif">
                <span class="custom-control-indicator"></span>
                Commission Article
            </label>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="unit" class="col-md-5 form-label">Unit (Price/Month)</label>
            <div class="col-md-7">
                <input class="form-control" name="unit" type="number" id="unit" value="@if(isset($article)){{ $article->unit }}@endif">
            </div>
        </div>
        <div class="col-md-6 form-group">
            <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" value="@if(isset($article))checked @endif">
                <span class="custom-control-indicator"></span>
                Show in Booking
            </label>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="suppliers" class="col-md-5 form-label">Suppliers</label>
            <div class="col-md-7">
                <input class="form-control" name="suppliers" type="text" id="suppliers" value="@if(isset($article)){{ $article->suppliers }}@endif">
            </div>
        </div>
        <div class="col-md-6 form-group">
            <label class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" value="@if(isset($article))checked @endif">
                <span class="custom-control-indicator"></span>
                Show in Cash
            </label>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="start_date" class="col-md-5 form-label">Start Date</label>
            <div class="col-md-7">
                <input class="form-control" name="start_date" type="date" id="start_date" value="@if(isset($article)){{ $article->start_date }}@endif">
            </div>
        </div>
        <div class="col-md-6 form-group">
            <label class="custom-control custom-checkbox">
                <input type="checkbox"class="custom-control-input" value="@if(isset($article))checked @endif">
                <span class="custom-control-indicator"></span>
                Show in Online Booking
            </label>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="end_date" class="col-md-5 form-label">End Date</label>
            <div class="col-md-7">
                <input class="form-control" name="end_date" type="date" id="end_date" value="@if(isset($article)){{ $article->end_date }}@endif">
            </div>
        </div>
        <div class="col-md-6 form-group">
            <label for=""></label>
            <label class="custom-control custom-checkbox" style="display: inline-block;">
                <input type="checkbox" class="custom-control-input" value="1">
                <span class="custom-control-indicator"></span>
                Continues
            </label>&nbsp;&nbsp;
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="category" class="col-md-5 form-label">Category </label>
            <div class="col-md-7">
                <select class="form-control" id="category" name="category">
                    
                    <option <?php if(isset($article) && $article->category == 'general') { echo "selected='selected'"; } ?> value="general">General</option>
                    <option <?php if(isset($article) && $article->category == 'food') { echo "selected='selected'"; } ?>  value="food">Food</option>
                    <option <?php if(isset($article) && $article->category == 'equipment') { echo "selected='selected'"; } ?>  value="equipment">Equipment</option>
                    <option <?php if(isset($article) && $article->category == 'service') { echo "selected='selected'"; } ?>  value="service">Service</option>
                    <option <?php if(isset($article) && $article->category == 'food_package') { echo "selected='selected'"; } ?>  value="food_package">Food Package</option>
                    
                </select>
            </div>
        </div>
        <div class="col-md-6 form-group">
            <label class="custom-control custom-checkbox" style="display: inline-block;">
                <input name="is_multi_units" type="checkbox" class="custom-control-input" value="1" <?php if(isset($article) && $article->is_multi_units == '1') { echo "checked='checked'"; } ?> >
                <span class="custom-control-indicator"></span>
                Is Multi Units
            </label>&nbsp;&nbsp;
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="vat" class="col-md-5 form-label">VAT</label>
            <div class="col-md-7">
                <input class="form-control" name="vat" type="text" id="vat" value="@if(isset($article)){{ $article->vat }}@endif">
            </div>
        </div>
        <div class="col-md-6 form-group">
            <label class="custom-control custom-checkbox" style="display: inline-block;">
                <input type="radio" class="custom-control-input" value="1">
                <span class="custom-control-indicator"></span>
                Bonus Article
            </label>&nbsp;&nbsp;
        </div>
        
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="rank_index" class="col-md-5 form-label">Rank Index</label>
            <div class="col-md-7">
                <input class="form-control" name="rank_index" type="number" id="rank_index" value="@if(isset($article)){{ $article->rank_index }}@endif">
            </div>
        </div>
        <div class="col-md-6 form-group">
            <label for=""></label>
            <label class="custom-control custom-checkbox" style="display: inline-block;">
                <input type="radio" class="custom-control-input" value="1">
                <span class="custom-control-indicator"></span>
                Package Article
            </label>
        </div>
        
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="shortcut" class="col-md-5 form-label">Shortcut</label>
            <div class="col-md-7">
                <input class="form-control" name="shortcut" type="text" id="shortcut" value="@if(isset($article)){{ $article->shortcut }}@endif">
            </div>
        </div>
        <div class="col-md-6 form-group">
            <label for="sort_index" class="col-md-5 form-label">Sort Index</label>
            <div class="col-md-7">
                <input class="form-control" name="sort_index" type="number" id="sort_index" value="@if(isset($article)){{ $article->sort_index }}@endif">
            </div>
        </div>
        
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
  
        </div>
    <div class="col-md-6 form-group">
            <label for="cancellation_condition" class="col-md-5 form-label">Cancellation Condition</label>
            <div class="col-md-7">
                <input class="form-control" name="cancellation_condition" type="text" id="cancellation_condition" value="@if(isset($article)){{ $article->cancellation_condition }}@endif">
            </div>
    </div>
        
    </div>
    

    <br>
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-10 text-right">
                <input class="btn btn-primary" type="submit" id="article_submit" value="@if(isset($article)) Update @else Save @endif">
                <a href="{{ route('company.rarticle.index') }}" class="btn btn-default">Back</a>
            </div>
        </div>
    </div>
</div>