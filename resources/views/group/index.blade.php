@extends('admin.default')

@section('content')
<div class="px-content">
    <div class="page-header">
      <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-ios-keypad"></i>Newsletter / </span>Groups</h1>
    </div>

    <div class="panel">
      <div class="panel-body">

                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Amount of Customers</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($groups as $group)
                        <tr>
                            <th scope="row">{{ $loop->index }}</th>
                            <td><a href="{{ route('admin.customers.index', ['group_id' => $group->id]) }}">{{ $group->name }}</a></td>
                            <td>{{ $group->customers->count() }}</td>
                            <td><a href="{{ route('admin.newsletter.groups.edit', $group->id) }}" class="btn btn-link">Edit</a></td>
                            <td>
                                <form action="{{ route('admin.newsletter.groups.destroy', $group->id) }}" method="post">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="submit" value="Delete" class="btn btn-danger btn-block" onclick="return confirm('Are you sure to delete?')">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection