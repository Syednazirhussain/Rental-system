<input name="_token" type="hidden" value="{{ csrf_token() }}">
@if(isset($rcustomer))
    <input name="_method" type="hidden" value="PATCH">
@endif

<legend>Create New Building</legend>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-3 form-group">
            <label for="name" class="control-label">Building Name</label>
            <input class="form-control" name="name" type="text" id="name">
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-3 form-group">
            <label for="country" class="control-label">Country</label>
            <input class="form-control" name="country" type="text" id="country">
        </div>
        <div class="col-md-3 form-group">
            <label for="city" class="control-label">City</label>
            <input class="form-control" name="city" type="text" id="city">
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="address" class="control-label">Address</label>
            <input class="form-control" name="address" type="text" id="address">
        </div>
        <div class="col-md-6 form-group">
            <label for="zipcode" class="control-label">Zipcode</label>
            <input class="form-control" name="zipcode" type="text" id="zipcode">
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="id" class="control-label">Building ID</label>
            <input class="form-control" name="id" type="text" id="id">
        </div>
        <div class="col-md-3 form-group">
            <label for="supplier" class="control-label">Supplier</label>
            <input class="form-control" name="supplier" type="text" id="supplier">
        </div>
        <div class="col-md-3 form-group">
            <label for="attach_file" class="control-label">Attach Files</label>
            <input class="form-control" name="attach_file" type="file" id="attach_file">
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-3 form-group">
            <label for="total_sqm" class="control-label">Total SQM</label>
            <input class="form-control" name="total_sqm" type="text" id="total_sqm">
        </div>
        <div class="col-md-3 form-group">
            <label for="rental_sqm" class="control-label">Rental SQM</label>
            <input class="form-control" name="rental_sqm" type="text" id="rental_sqm">
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="other_space" class="control-label">Other Space</label>
            <input class="form-control" name="other_space" type="text" id="other_space">
        </div>
        <div class="col-md-6 form-group">
            <label for="notes" class="control-label">Notes</label>
            <textarea class="form-control" name="notes" type="text" id="notes"></textarea>
        </div>
    </div>

    <div class="col-md-12">
        <div class="col-md-6 form-group">
            <label for="email" class="control-label">Email </label>
            <input class="form-control" name="email" type="text" id="email">
        </div>
        <div class="col-md-6 form-group">
            <label for="attachment" class="control-label">File Attachment </label>
            <input class="form-control" name="attachment" type="file" id="attachment">
        </div>
    </div>

    <br>
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-10 text-right">
                <input class="btn btn-primary" type="submit" value="Submit">
                <a href="{{ route('company.rbuilding.index') }}" class="btn btn-default">Back</a>
            </div>
        </div>
    </div>
</div>