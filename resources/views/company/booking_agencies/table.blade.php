
<table  class="table table-responsive table-striped table-hover"  id="datatables">
    <thead>
        <tr>
        <th>Name</th>
        <th>Contact Person</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Fax</th>
            <th width="100px">Action</th>
        </tr>
    </thead>
    <tbody>
     @foreach($bookingAgencies as $bookingAgency)
        <tr>
            <td>{!! ucwords($bookingAgency->name) !!}</td>
            <td>{!! ucwords($bookingAgency->contact_person) !!}</td>
            <td>{!! $bookingAgency->phone !!}</td>
            <td>{!! $bookingAgency->email !!}</td>
            <td>{!! $bookingAgency->fax !!}</td>
            <td  width="100px" class="text-center">
                {!! Form::open(['route' => ['company.bookingAgencies.destroy', $bookingAgency->id], 'method' => 'delete']) !!}
                
                <a href="{!! route('company.bookingAgencies.edit', [$bookingAgency->id]) !!}"><i class="fa fa-edit fa-lg text-info"></i></a>
                {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>