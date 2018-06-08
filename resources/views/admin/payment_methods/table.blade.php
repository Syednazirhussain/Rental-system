
<table class="table table-striped table-bordered" id="userstable">
    <thead>
        <tr>
            <th>Name</th>
            <th>Code</th>
            <th width="200px">Actions</th>
        </tr>
    </thead>
    <tbody>
    @if(isset($paymentMethods))
        @foreach($paymentMethods as $payment)
            <tr>
                <td>{{ $payment->name }}</td>
                <td>{{ $payment->code }}</td>
                <td  width="200px" class="text-center">
                    {!! Form::open(['route' => ['admin.paymentMethods.destroy', $payment->id], 'method' => 'delete']) !!}

                    <a href="{{ route('admin.paymentMethods.edit', [$payment->id]) }}"><i class="fa fa-edit fa-lg text-info"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    @else
        <dir class="container">
            <dir class="well">
                <span class="text-center text-info">No Record Found</span>
            </dir>
        </dir>
    @endif
    </tbody>
</table>