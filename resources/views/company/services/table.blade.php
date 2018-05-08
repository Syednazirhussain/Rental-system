<table class="table table-striped table-bordered" id="servicesTable">
    <thead>
        <tr>
            <th>No</th>
            <th>Company Name</th>
            <th>Service Name</th>
            <th>Price</th>
            <th width="200px">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($services as $service)
        <tr>
            <td>{!! $loop->index + 1 !!}</td>
            <td>{!! $companies[$service->company_id] !!}</td>
            <td>{!! $service->name !!}</td>
            <td>{!! $service->price !!}</td>
            <td  width="200px" class="text-center">
                {!! Form::open(['route' => ['company.services.destroy', $service->id], 'method' => 'delete']) !!}
                <a href="{!! route('company.services.show', [$service->id]) !!}"><i class="fa fa-eye fa-lg text-info"></i></a>
                @if($owner == $service->company_id)<a href="{!! route('company.services.edit', [$service->id]) !!}"><i class="fa fa-edit fa-lg text-info"></i></a>
                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}@endif
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>