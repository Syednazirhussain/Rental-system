
<table class="table table-striped table-bordered" id="datatables">
    <thead>
        <tr>
            <th width="100px">Image</th>
            <th>Title</th>
            <th width="200px">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($roomLayouts as $roomLayout)
        <tr>
            <td width="100px">
                @if($roomLayout->image != "default.png")
                    <img src="{{ asset('storage/room_layouts_images/'.$roomLayout->image) }}" width="80px" class="border-panel b-a-1">
                @else
                    <img src="{{ asset('/skin-1/assets/images/default.png') }}" width="80px" class="border-panel b-a-1">
                @endif
            </td>
            <td>{!! ucfirst($roomLayout->title) !!}</td>
            <td>
                {!! Form::open(['route' => ['company.conference.roomLayouts.destroy', $roomLayout->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('company.conference.roomLayouts.edit', [$roomLayout->id]) !!}" class='btn btn-default btn-xs'><i class="fa fa-edit fa-lg text-info"></i></a>
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