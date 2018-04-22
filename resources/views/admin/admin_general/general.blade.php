

<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input name="_method" type="hidden" value="PATCH">


<div class="row">
      <!-- Name Field -->

      @if(isset($data['general_setting']))
      <div class="col-sm-12 form-group">
          <label for="grid-input-16">Title:</label>
          <input type="text" name="title" value="{{ $data['general_setting']->title }}" id="grid-input-16" class="form-control">
      </div>
      <div class="col-sm-12 form-group">
          <label for="grid-input-16">Zip Code</label>
          <input type="text" name="zip_code" value="{{ $data['general_setting']->zip_code }}" id="grid-input-16" class="form-control">
      </div>
      <div class="col-sm-12 form-group">
          <label for="grid-input-16">Address</label>
                <input type="text" name="address" value="{{ $data['general_setting']->address }}" id="grid-input-16" class="form-control">
      </div>
      <div class="col-sm-12 form-group">
          <label for="grid-input-16">Phone</label>
                <input type="text" name="phone" value="{{ $data['general_setting']->phone }}" id="grid-input-16" class="form-control">
      </div>
      <div class="col-sm-12 form-group">
        <label for="Country">Country</label>
        <select class="form-control" name="Country" id="Country">
          @forelse($data['country'] as $country)
            <option value="{{ $country->id }}">{{ $country->name }}</option>
          @empty
            <option value="0">empty</option>
          @endforelse
        </select>
      </div>
      <div class="city" id="{{ $data['general_setting']->city_id }}"></div>
      <div class="state" id="{{ $data['general_setting']->state_id }}"></div>
      <div class="col-sm-12 form-group">
        <label for="State">State</label>

        <select class="form-control" name="State" id="State">
          @forelse($data['state'] as $state)
            @if($state->id == $data['state_id'])
              <option value="{{ $state->id }}" selected="selected">{{ $state->name }}</option>
            @else
              <option value="{{ $state->id }}">{{ $state->name }}</option>
            @endif
          @empty
            <option value="0">empty</option>
          @endforelse
        </select>
      </div>

      <div class="col-sm-12 form-group">
        <label for="City">City</label>
        <select class="form-control" name="city_id" id="city_id">
          @forelse($data['city'] as $city)
            @if($city->id == $data['city_id'])
              <option value="{{ $city->id }}" selected="selected">{{ $city->name }}</option>
            @else
              <option value="{{ $city->id }}">{{ $city->name }}</option>
            @endif
          @empty
            <option value="0">empty</option>
          @endforelse
        </select>
      </div>
      @endif
</div>                



