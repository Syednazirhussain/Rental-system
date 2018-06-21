
<table class="table table-striped table-bordered" id="datatables">
    <thead>
        <tr>
            <th>Title</th>
            <th width="200px" class="pull-right">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($equipmentCriterias as $equipmentCriteria)
             <tr class="odd gradeX">
                <td>{{$equipmentCriteria->title}}</td>
                <td width="200px" class="pull-right">
                    {!! Form::open(['route' => ['company.conference.equipmentCriterias.destroy', $equipmentCriteria->id], 'method' => 'delete']) !!}
                    
                        <a href="{!! route('company.conference.equipmentCriterias.edit', [$equipmentCriteria->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>