
          <table class="table table-striped table-bordered" id="datatables">
            <thead>
              <tr>
                <th>Code</th>
                <th>Name</th>
                <th width="200px">Actions</th>
              </tr>
            </thead>
            <tbody>

            @foreach($userRoles as $userRole)
              <tr class="odd gradeX">
                <td>{!! $userRole->code !!}</td>
                <td>{!! ucfirst($userRole->name) !!}</td>
                <td  width="200px" class="center">
                    {!! Form::open(['route' => ['admin.userRoles.destroy', $userRole->id], 'method' => 'delete']) !!}
                      <a href="{!! route('admin.userRoles.edit', [$userRole->id]) !!}"><i class="fa fa-edit fa-lg text-info"></i></a>
                      {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    {!! Form::close() !!}
                </td>
              </tr>
            @endforeach

            </tbody>
          </table>








