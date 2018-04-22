
<table class="table table-striped table-bordered" id="datatables">
    <thead>
        <tr>
            <th>Title</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($roomLayouts as $roomLayout)
        <tr>
            <td>{!! $roomLayout->title !!}</td>
            <td>{!! $roomLayout->image !!}</td>
            <td>
                {!! Form::open(['route' => ['company.conference.roomLayouts.destroy', $roomLayout->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('company.conference.roomLayouts.edit', [$roomLayout->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

<!-- <table class="table table-striped table-bordered" id="datatables">
            <thead>
              <tr>
                <th>Rendering engine</th>
                <th>Browser</th>
                <th>Platform(s)</th>
                <th>Engine version</th>
                <th>CSS grade</th>
              </tr>
            </thead>
            <tbody>
              <tr class="odd gradeX">
                <td>Trident</td>
                <td>Internet
                   Explorer 4.0</td>
                <td>Win 95+</td>
                <td class="center"> 4</td>
                <td class="center">X</td>
              </tr>
              <tr class="even gradeC">
                <td>Trident</td>
                <td>Internet
                   Explorer 5.0</td>
                <td>Win 95+</td>
                <td class="center">5</td>
                <td class="center">C</td>
              </tr>
            </tbody>
          </table> -->