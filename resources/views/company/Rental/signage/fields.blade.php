<input name="_token" type="hidden" value="{{ csrf_token() }}">
@if(isset($signage))
    <input name="_method" type="hidden" value="PATCH">
@endif

<legend>Create New Signage</legend>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for=""></label>
            <label class="custom-control custom-checkbox" style="display: inline-block;">
                <input type="radio" class="custom-control-input">
                <span class="custom-control-indicator"></span>
                Yes
            </label>
            <label class="custom-control custom-checkbox" style="display: inline-block;">
                <input type="radio" class="custom-control-input">
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
                <input class="form-control" name="first_name" type="text" id="first_name" value="@if(isset($signage)){{ $signage->first_name }}@endif">
            </div>
        </div>
        <div class="col-md-4 form-group">
            <label for="screen_name_1" class="col-md-5 form-label">Screen Name </label>
            <div class="col-md-7">
                <input class="form-control" name="screen_name_1" type="text" id="screen_name_1" value="@if(isset($signage)){{ $signage->screen_name_1 }}@endif">
            </div>
        </div>
        <div class="col-md-4  form-group">
            <label for="logo_1" class="col-md-5 form-label">Attach Logo </label>
            <div class="col-md-7">
                <input class="form-control" name="logo_1" type="file" id="logo_1">
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-4 form-group">
            <label for="second_name" class="col-md-5 form-label">Second Name </label>
            <div class="col-md-7">
                <input class="form-control" name="second_name" type="text" id="second_name" value="@if(isset($signage)){{ $signage->second_name }}@endif">
            </div>
        </div>
        <div class="col-md-4 form-group">
            <label for="screen_name_2" class="col-md-5 form-label">Screen Name </label>
            <div class="col-md-7">
                <input class="form-control" name="screen_name_2" type="text" id="screen_name_2" value="@if(isset($signage)){{ $signage->screen_name_2 }}@endif">
            </div>
        </div>
        <div class="col-md-4  form-group">
            <label for="logo_2" class="col-md-5 form-label">Attach Logo </label>
            <div class="col-md-7">
                <input class="form-control" name="logo_2" type="file" id="logo_2">
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-4 form-group">
            <label for="third_name" class="col-md-5 form-label">Third Name </label>
            <div class="col-md-7">
                <input class="form-control" name="third_name" type="text" id="third_name" value="@if(isset($signage)){{ $signage->third_name }}@endif">
            </div>
        </div>
        <div class="col-md-4 form-group">
            <label for="screen_name_3" class="col-md-5 form-label">Screen Name </label>
            <div class="col-md-7">
                <input class="form-control" name="screen_name_3" type="text" id="screen_name_3" value="@if(isset($signage)){{ $signage->screen_name_3 }}@endif">
            </div>
        </div>
        <div class="col-md-4  form-group">
            <label for="logo_3" class="col-md-5 form-label">Attach Logo </label>
            <div class="col-md-7">
                <input class="form-control" name="logo_3" type="file" id="logo_3">
            </div>
        </div>
    </div>


    <div class="col-md-12">
        <div class="col-md-4 form-group">
            <label for="fourth_name" class="col-md-5 form-label">Fourth Name </label>
            <div class="col-md-7">
                <input class="form-control" name="fourth_name" type="text" id="fourth_name" value="@if(isset($signage)){{ $signage->fourth_name }}@endif">
            </div>
        </div>
        <div class="col-md-4 form-group">
            <label for="screen_name_4" class="col-md-5 form-label">Screen Name </label>
            <div class="col-md-7">
                <input class="form-control" name="screen_name_4" type="text" id="screen_name_4" value="@if(isset($signage)){{ $signage->screen_name_4 }}@endif">
            </div>
        </div>
        <div class="col-md-4  form-group">
            <label for="logo_4" class="col-md-5 form-label">Attach Logo </label>
            <div class="col-md-7">
                <input class="form-control" name="logo_4" type="file" id="logo_4">
            </div>
        </div>
    </div>


    <br>
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-11 text-right">
                <input class="btn btn-primary" type="submit" id="signage_submit" value="@if(isset($signage)) Update @else Save @endif">
                <a href="{{ route('company.rcustomer.index') }}" class="btn btn-default">Back</a>
            </div>
        </div>
    </div>
</div>