<input name="_token" type="hidden" value="{{ csrf_token() }}">
@if(isset($rfinancial))
    <input name="_method" type="hidden" value="PATCH">
@endif

<legend>Create New Financial</legend>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="acc_1" class="control-label">ACC 1</label>
            <input class="form-control" name="acc_1" type="text" id="acc_1">
        </div>
        <div class="col-md-6 form-group">
            <label for="acc_2" class="control-label">ACC 2</label>
            <input class="form-control" name="acc_2" type="text" id="acc_2">
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="acc_3" class="control-label">ACC 3</label>
            <input class="form-control" name="acc_3" type="text" id="acc_3">
        </div>
        <div class="col-md-6 form-group">
            <label for="acc_4" class="control-label">ACC 4</label>
            <input class="form-control" name="acc_4" type="text" id="acc_4">
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-8 form-group">
            <label for="article_no" class="control-label">Article Number Financial System</label>
            <input class="form-control" name="article_no" type="text" id="article_no">
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="cost_no" class="control-label">Cost Number</label>
            <input class="form-control" name="cost_no" type="text" id="cost_no">
        </div>
        <div class="col-md-6 form-group">
            <label for="project_no" class="control-label">Project Number</label>
            <input class="form-control" name="project_no" type="text" id="project_no">
        </div>
    </div>

    <br>
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-10 text-right">
                <input class="btn btn-primary" type="submit" value="Submit">
                <a href="{{ route('company.rfinancial.index') }}" class="btn btn-default">Back</a>
            </div>
        </div>
    </div>
</div>