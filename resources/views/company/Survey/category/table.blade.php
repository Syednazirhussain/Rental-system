<table class="table table-striped table-bordered" id="categoryTable">
    <thead>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Code</th>
        </tr>
    </thead>
    <tbody>
    @foreach($categories as $category)
        <tr>
            <td>{!! $loop->index + 1 !!}</td>
            <td>{!! $category->name !!}</td>
            <td>{!! $category->code !!}</td>
        </tr>
    @endforeach
    </tbody>
</table>