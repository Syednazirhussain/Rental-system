


            <table class="table table-striped">
              <tbody>
                <tr>
                  <th scope="row" width="200px">Id</th>
                  <th>{!! $userRole->id !!}</th>
                </tr>
                <tr>
                  <th scope="row" width="200px">Code</th>
                  <td>{!! $userRole->code !!}</td>
                </tr>
                <tr>
                  <th scope="row" width="200px">Name</th>
                  <td>{!! ucfirst($userRole->name) !!}</td>
                </tr>
                <tr>
                  <th scope="row" width="200px">Created At</th>
                  <td>{{ date('F d, Y', strtotime($userRole->created_at)) }}</td>
              </tbody>
            </table>