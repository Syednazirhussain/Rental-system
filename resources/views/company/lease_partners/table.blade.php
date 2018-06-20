<table class="table table-primary" id="leasePartner">
    <thead>
        <tr>
            <th>Parent Company</th>
        <th>Sister Company</th>
        <th>Sales Person</th>
        <th>Delegated</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($leasePartners as $leasePartner)
        <tr>
            <td>{!! ucfirst($leasePartner->parent_company) !!}</td>
            <td>{!! ucfirst($leasePartner->sister_company) !!}</td>
            <td>{!! ucfirst($leasePartner->sales_person) !!}</td>
            <td>
                @if($leasePartner->delegated == 1)
                    <span class="label label-success">Yes</span>
                @else
                    <span class="label label-danger">No</span>
                @endif
            </td>
            <td  width="200px" class="center">
                {!! Form::open(['route' => ['company.leasePartners.destroy', $leasePartner->id], 'method' => 'delete']) !!}
                  <a href="{!! route('company.leasePartners.edit', [$leasePartner->id]) !!}"><i class="fa fa-edit fa-lg text-info"></i></a>
                  {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>