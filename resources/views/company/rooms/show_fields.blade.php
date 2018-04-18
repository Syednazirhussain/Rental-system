<table class="table table-striped">
    <tbody>
        <tr>
            <th scope="row" width="200px">Id</th>
            <th>{{ $service->id }}</th>
        </tr>
        <tr>
            <th scope="row" width="200px">Company Name</th>
            <th>{{ $company->name }}</th>
        </tr>
        <tr>
            <th scope="row" width="200px">Service Name</th>
            <th>{{ $service->name }}</th>
        </tr>
        <tr>
            <th scope="row" width="200px">Price</th>
            <th>USD {{ $service->price }}</th>
        </tr>
    </tbody>
</table>

