<input name="_token" type="hidden" value="{{ csrf_token() }}">
@if(isset($financial))
    <input name="_method" type="hidden" value="PATCH">
@endif

<legend>Create New Financial</legend>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="acc_1" class="col-md-5 form-label">ACC 1</label>
            <div class="col-md-7">
                <input class="form-control" name="acc_1" type="text" id="acc_1" value="@if(isset($financial)){{ $financial->acc_1 }}@endif">
            </div>
        </div>
        <div class="col-md-6 form-group">
            <label for="acc_2" class="col-md-5 form-label">ACC 2</label>
            <div class="col-md-7">
                <input class="form-control" name="acc_2" type="text" id="acc_2" value="@if(isset($financial)){{ $financial->acc_2 }}@endif">
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="acc_3" class="col-md-5 form-label">ACC 3</label>
            <div class="col-md-7">
                <input class="form-control" name="acc_3" type="text" id="acc_3" value="@if(isset($financial)){{ $financial->acc_3 }}@endif">
            </div>
        </div>
        <div class="col-md-6 form-group">
            <label for="acc_4" class="col-md-5 form-label">ACC 4</label>
            <div class="col-md-7">
                <input class="form-control" name="acc_4" type="text" id="acc_4" value="@if(isset($financial)){{ $financial->acc_4 }}@endif">
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-8 form-group">
            <label for="article_no" class="col-md-5 form-label">Article Number Financial System</label>
            <div class="col-md-7">
                <input class="form-control" name="article_no" type="number" id="article_no" value="@if(isset($financial)){{ $financial->article_no }}@endif">
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="cost_no" class="col-md-5 form-label">Cost Number</label>
            <div class="col-md-7">
                <input class="form-control" name="cost_no" type="number" id="cost_no" value="@if(isset($financial)){{ $financial->cost_no }}@endif">
            </div>
        </div>
        <div class="col-md-6 form-group">
            <label for="project_no" class="col-md-5 form-label">Project Number</label>
            <div class="col-md-7">
                <input class="form-control" name="project_no" type="number" id="project_no" value="@if(isset($financial)){{ $financial->project_no }}@endif">
            </div>
        </div>
    </div>

    <br>
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-10 text-right">
                <input class="btn btn-primary" type="submit" id="financial_submit" value="Save">
                <a href="{{ route('company.rfinancial.index') }}" class="btn btn-default">Back</a>
            </div>
        </div>
    </div>
</div>