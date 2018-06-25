<form action="{{ route('company.contracts.store') }}" accept-charset="UTF-8" id="contract_termination">
    <input name="_token" type="hidden" value="{{ csrf_token() }}">
    @if (isset($contract))
        <input name="_method" type="hidden" value="PATCH">
    @endif

    <h3>Termination from Lodger</h3>
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-6 form-group">
                <label for="termination_date">Termination Date</label>
                <input type="date" name="termination_date" id="termination_date" class="form-control"
                       value="@if(isset($termination)){{ $termination->termination_date }}@endif" />
                <div class="errorTxt"></div>
            </div>
            <div class="col-sm-6 form-group">
                <label for="termination_issue">Termination Issue</label>
                <input type="text" name="termination_issue" id="termination_issue" class="form-control"
                       value="@if(isset($termination)){{ $termination->termination_issue }}@endif" />
                <div class="errorTxt"></div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="col-sm-6 form-group">
                <label for="contract_end_date">Contract End Date</label>
                <input type="date" name="contract_end_date" id="contract_end_date" class="form-control"
                       value="@if(isset($termination)){{ $termination->contract_end_date }}@endif" />
                <div class="errorTxt"></div>
            </div>
            <div class="col-sm-6 form-group">
                <label for="immigrant_date">Immigrant Date</label>
                <input type="date" name="immigrant_date" id="immigrant_date" class="form-control"
                       value="@if(isset($termination)){{ $termination->immigrant_date }}@endif" />
                <div class="errorTxt"></div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="col-sm-12 form-group">
                <label for="room_can_rented_date">Room Can Be Rented Date</label>
                <input type="date" name="room_can_rented_date" id="room_can_rented_date" class="form-control"
                       value="@if(isset($termination)){{ $termination->room_can_rented_date }}@endif" />
                <div class="errorTxt"></div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="col-sm-12 form-group">
                <label for="note">Note</label>
                <textarea name="note" id="note" class="form-control"
                          rows="5">{{ (isset($termination)) ? $termination->note : '' }}</textarea>
                <div class="errorTxt"></div>
            </div>
        </div>
    </div>

    <h3>Termination from Landlord</h3>
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-6 form-group">
                <label for="termination_date">Termination Date</label>
                <input type="date" name="lord_termination_date" id="termination_date" class="form-control"
                       value="@if(isset($lord_termination)){{ $lord_termination->termination_date }}@endif" />
                <div class="errorTxt"></div>
            </div>
            <div class="col-sm-6 form-group">
                <label for="termination_issue">Termination Issue</label>
                <input type="text" name="lord_termination_issue" id="termination_issue" class="form-control"
                       value="@if(isset($lord_termination)){{ $lord_termination->termination_issue }}@endif" />
                <div class="errorTxt"></div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="col-sm-6 form-group">
                <label for="contract_end_date">Contract End Date</label>
                <input type="date" name="lord_contract_end_date" id="contract_end_date" class="form-control"
                       value="@if(isset($lord_termination)){{ $lord_termination->contract_end_date }}@endif" />
                <div class="errorTxt"></div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="col-sm-12 form-group">
                <label for="note">Note</label>
                <textarea name="lord_note" id="loard_note" class="form-control"
                          rows="5">{{ (isset($lord_termination)) ? $lord_termination->note : '' }}</textarea>
                <div class="errorTxt"></div>
            </div>
        </div>
    </div>

    <div class="panel-wide-block p-x-3 p-t-3 b-t-1 bg-white text-xs-right">
        <!-- <button type="button" class="btn" data-wizard-action="prev"><i class="fa fa-arrow-left m-r-1"></i> BACK</button>&nbsp;&nbsp; -->
        <a href="{!! route('company.contracts.index') !!}" class="btn btn-default"><i
                    class="fa fa-times"></i> CANCEL</a>
        <button type="submit" class="btn btn-primary" id="submit_termination">@if(isset($contract)) Update @else Save @endif</button>
    </div>
</form>