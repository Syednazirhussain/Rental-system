<input name="_token" type="hidden" value="{{ csrf_token() }}">
@if(isset($rcustomer))
    <input name="_method" type="hidden" value="PATCH">
@endif

<legend>Create New Signage</legend>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for=""></label>
            <label class="custom-control custom-checkbox" style="display: inline-block;">
                <input type="checkbox" name="is_signage" class="custom-control-input">
                <span class="custom-control-indicator"></span>
                Yes
            </label>
            <label class="custom-control custom-checkbox" style="display: inline-block;">
                <input type="checkbox" name="is_signage" class="custom-control-input">
                <span class="custom-control-indicator"></span>
                No
            </label>
            &nbsp;&nbsp;
            <label>Signage</label>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-4 form-group">
            <label for="first_name" class="col-md-5 form-label">First Name </label>
            <div class="col-md-7">
                <input class="form-control" name="first_name" type="text" id="first_name">
            </div>
        </div>
        <div class="col-md-4 form-group">
            <label for="screen_name" class="col-md-5 form-label">Screen Name </label>
            <div class="col-md-7">
                <input class="form-control" name="screen_name" type="text" id="screen_name">
            </div>
        </div>
        <div class="col-md-4  form-group">
            <label for="logo" class="col-md-5 form-label">Attach Logo </label>
            <div class="col-md-7">
                <input class="form-control" name="logo" type="file" id="logo">
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-4 form-group">
            <label for="first_name" class="col-md-5 form-label">First Name </label>
            <div class="col-md-7">
                <input class="form-control" name="first_name" type="text" id="first_name">
            </div>
        </div>
        <div class="col-md-4 form-group">
            <label for="screen_name" class="col-md-5 form-label">Screen Name </label>
            <div class="col-md-7">
                <input class="form-control" name="screen_name" type="text" id="screen_name">
            </div>
        </div>
        <div class="col-md-4  form-group">
            <label for="logo" class="col-md-5 form-label">Attach Logo </label>
            <div class="col-md-7">
                <input class="form-control" name="logo" type="file" id="logo">
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-4 form-group">
            <label for="first_name" class="col-md-5 form-label">First Name </label>
            <div class="col-md-7">
                <input class="form-control" name="first_name" type="text" id="first_name">
            </div>
        </div>
        <div class="col-md-4 form-group">
            <label for="screen_name" class="col-md-5 form-label">Screen Name </label>
            <div class="col-md-7">
                <input class="form-control" name="screen_name" type="text" id="screen_name">
            </div>
        </div>
        <div class="col-md-4  form-group">
            <label for="logo" class="col-md-5 form-label">Attach Logo </label>
            <div class="col-md-7">
                <input class="form-control" name="logo" type="file" id="logo">
            </div>
        </div>
    </div>


    <div class="col-md-12">
        <div class="col-md-4 form-group">
            <label for="first_name" class="col-md-5 form-label">First Name </label>
            <div class="col-md-7">
                <input class="form-control" name="first_name" type="text" id="first_name">
            </div>
        </div>
        <div class="col-md-4 form-group">
            <label for="screen_name" class="col-md-5 form-label">Screen Name </label>
            <div class="col-md-7">
                <input class="form-control" name="screen_name" type="text" id="screen_name">
            </div>
        </div>
        <div class="col-md-4  form-group">
            <label for="logo" class="col-md-5 form-label">Attach Logo </label>
            <div class="col-md-7">
                <input class="form-control" name="logo" type="file" id="logo">
            </div>
        </div>
    </div>


    <br>
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-10 text-right">
                <input class="btn btn-primary" type="submit" value="Save">
                <a href="{{ route('company.rsignage.index') }}" class="btn btn-default">Back</a>
            </div>
        </div>
    </div>
</div>