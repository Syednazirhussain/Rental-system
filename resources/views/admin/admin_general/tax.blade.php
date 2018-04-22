

<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input name="_method" type="hidden" value="PATCH">


<div class="row">
      <!-- Name Field -->
      
      @if(isset($data['general_setting']))
      <div class="col-sm-12 form-group">
          <label for="grid-input-16">Tax</label>
          <input type="text" name="tax" value="{{ $data['companyInvoiceVat'] }}" id="grid-input-16" class="form-control">
      </div>
      <div class="col-sm-12 form-group">
          <label for="grid-input-16">Set Due Days</label>
          <input type="text" name="due_day" value="{{ $data['general_setting']->due_day }}" id="grid-input-16" class="form-control">
      </div>
      <div class="col-sm-12">
        <button type="submit" class="btn btn-primary">@if(!isset($userStatus)) <i class="fa fa-refresh"></i>  Update Settings @else <i class="fa fa-plus"></i>  Add Status @endif</button>
      </div>
      @endif
</div>                


