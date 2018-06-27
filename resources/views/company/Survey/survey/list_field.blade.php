<table class="table table-striped table-bordered" id="datatables">
    <thead>
    <tr>
        <th>#</th>
        <th>Topic</th>
        <th>Answer Type</th>
        <th>Answer</th>
        <th>Feedback By</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    @if(isset($answers))
        @foreach($answers as $answer)
            <tr class="odd gradeX">
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $answer->topic }}</td>
                <td>{{$answer_types[$answer->answer_type] }}</td>
                <td>
                    @if($answer->answer_type == 'optional')
                        {{ $options[$answer->answer] }}
                    @else
                        {{ $answer->answer }}
                    @endif
                </td>
                <td>{{ $answer->name }}</td>
                <td>{{ $answer->status }}</td>
            </tr>
        @endforeach
    @else
        <p>No records</p>
    @endif
    </tbody>
</table>

@section('js')
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <script type="text/javascript">
        // -------------------------------------------------------------------------
        // Initialize DataTables
        $(function () {
            $('#datatables').dataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5', 'excelHtml5', 'pdfHtml5', 'csvHtml5'
                ]
            });
            $('#datatables_wrapper .table-caption').text('Survey Answers');
            $('#datatables_wrapper .dataTables_filter input').attr('style', 'display: none');
        });

        $(function() {
            var data = document.getElementById('statistic_data').value;
            data = JSON.parse(data);

            data.map(function(item, index) {
                if(item.answer_type == 'rating') {
                    $("#header" + index).text(index + 1 + '. ' + item.title);
                    $( "<h1 style='color: red; font-size: 50px;'>" + item.rating +"</h1>" ).insertAfter( "#header" + index);
                }else if(item.answer_type == 'yes_no') {
                    $("#header" + index).text(index + 1 + '. ' + item.title);

                    new Chart(document.getElementById("statistic" + index), {
                        type: 'pie',
                        data: {
                            labels: ["Yes", "No"],
                            datasets: [
                                {
                                    label: "Population (millions)",
                                    backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                                    data: [item.yes, item.no]
                                }
                            ]
                        },
                        options: {
                            legend: { display: false },
                            title: {
                                display: true,
                                text: item.title
                            },
                            maintainAspectRatio: false
                        }
                    });
                }else if(item.answer_type == 'optional') {
                    $("#header" + index).text(index + 1 + '. ' + item.title);
                    var option_data = item.data;
                    var label = [], value = [];
                    option_data.map(function(option) {
                       label.push(option.option);
                       value.push(option.count);
                    });
                    new Chart(document.getElementById("statistic" + index), {
                        type: 'bar',
                        data: {
                            labels: label,
                            datasets: [
                                {
                                    label: item.title,
                                    backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
                                    data: value
                                }
                            ]
                        },
                        options: {
                            legend: { display: false },
                            title: {
                                display: true,
                                text: item.title
                            },
                            maintainAspectRatio: false
                        }
                    });
                }
            })
        });

    </script>
@endsection