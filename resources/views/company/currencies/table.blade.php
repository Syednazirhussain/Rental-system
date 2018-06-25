<table class="table table-responsive" id="currencies-table">
    <thead>
        <tr>
        <th>Code</th>
        <th>Name</th>
        <th width="200px">Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($currencies as $currency)
        <tr>
            <td>{!! $currency->code !!}</td>
            <td>{!! ucfirst($currency->name) !!}</td>

            <td  width="200px" class="center">
                {!! Form::open(['route' => ['company.currencies.destroy', $currency->id], 'method' => 'delete']) !!}
                  <a href="{!! route('company.currencies.edit', [$currency->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit fa-lg text-info"></i></a>
                  {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>