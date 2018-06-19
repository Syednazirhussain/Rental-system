<table class="table table-striped table-bordered" id="datatables">
    <thead>
    <tr>
        <th>#</th>
        <th>Module</th>
        <th>Sales Price</th>
        <th>In Price</th>
        <th>Unit</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Vat Fee</th>
        <th width="200px">Action</th>
    </tr>
    </thead>
    <tbody>
    @if(isset($articles))
        @foreach($articles as $article)
            <tr class="odd gradeX">
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $article->module }}</td>
                <td>{{ $article->sales_price }}</td>
                <td>{{ $article->in_price }} $</td>
                <td>{{ $article->unit }} Per Month</td>
                <td>{{ $article->start_date }}</td>
                <td>{{ $article->end_date }}</td>
                <td>{{ $article->vat }} %</td>
                <td width="200px" class="text-center">
                    {!! Form::open(['route' => ['company.rarticle.destroy', $article->id], 'method' => 'delete']) !!}
                    <a href="{!! route('company.rarticle.show', [$article->id]) !!}"><i
                                class="fa fa-eye fa-lg text-info"></i></a>
                    <a href="{!! route('company.rarticle.edit', [$article->id]) !!}"><i
                                class="fa fa-edit fa-lg text-info"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    @else
        <p>No records</p>
    @endif
    </tbody>
</table>