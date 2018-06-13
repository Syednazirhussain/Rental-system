<table class="table table-striped table-bordered" id="datatables">
    <thead>
    <tr>
    </tr>
    </thead>
    <tbody>
    @if(isset($signages))
        @foreach($signages as $signage)
            @if($loop->index % 2 == 0) <tr class="odd gradeX"> @endif
                <td>{{ $signage->first_name }}, {{ $signage->second_name }}, {{ $signage->third_name }}
                    , {{ $signage->fourth_name }}</td>
            @if($loop->index % 2 != 0) </tr> @endif
        @endforeach
    @else
        <p>No records</p>
    @endif
    </tbody>
</table>