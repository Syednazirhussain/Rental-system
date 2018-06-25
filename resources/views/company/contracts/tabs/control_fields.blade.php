<form action="{{ route('company.contracts.store') }}" accept-charset="UTF-8" id="rental_agreement">

    @if (isset($contract))
        <input name="_method" type="hidden" value="PATCH">
    @endif

    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-6 form-group">
                <label for="number">Control Date</label>
                <input type="date" name="number" id="number" class="form-control">
                <div class="errorTxt"></div>
            </div>
            <div class="col-sm-6 form-group">
                <label for="contract-no">Done By</label>
                <input type="text" name="number" id="number" class="form-control">
                <div class="errorTxt"></div>
            </div>
        </div>

        <div class="col-sm-12">
            <div class="col-sm-12 form-group">
                <label for="note">Note</label>
                <textarea name="note" id="note" class="form-control"
                          rows="5"></textarea>
                <div class="errorTxt"></div>
            </div>
        </div>
    </div>


    <div class="panel-wide-block p-x-3 p-t-3 b-t-1 bg-white text-xs-right">
        <!-- <button type="button" class="btn" data-wizard-action="prev"><i class="fa fa-arrow-left m-r-1"></i> BACK</button>&nbsp;&nbsp; -->
        <a href="{!! route('company.contracts.index') !!}" class="btn btn-default"><i
                    class="fa fa-times"></i> CANCEL</a>
        <button type="submit" class="btn btn-primary" id="submit_contract">Save</button>
    </div>
</form>