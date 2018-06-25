@extends('company.default')

@section('content')

    <div class="px-content">

        <div class="page-header">
            <h1><span class="text-muted font-weight-light"><i class="page-header-icon ion-ios-keypad"></i><a href="{{ route('company.rarticle.index') }}">Articles</a></span></h1>
        </div>

        <div class="panel">
            <div class="panel-body">

                @if (session()->has('msg.success'))
                    @include('layouts.success_msg')
                @endif

                @if (session()->has('msg.error'))
                    @include('layouts.error_msg')
                @endif

                <div class="row m-b-2">
                    <div class="col-md-2 text-right">
                        <div style="font-size: 15px; margin-top: 3px;">Articles Search</div>
                    </div>
                    <div class="col-md-4 articles_search_field" >
                        <input type="text" class="form-control" id="search_articles" placeholder="Article ID, Name">
                    </div>
                    <div class="col-md-3 text-right articles_search_field">
                        <div style="font-size: 13px; margin-top: 5px;"><a id="expand_search">Expanded Search</a></div>
                    </div>
                    <div class="col-md-1 advance_search_field" hidden>
                        <label class="custom-control custom-checkbox" style="font-size: 14px; margin-top: 4px;">
                            <input type="checkbox" data-toggle="switch" class="custom-control-input">
                            <span class="custom-control-indicator"></span>
                            &nbsp;&nbsp;Active
                        </label>
                    </div>
                    <div class="col-md-3 advance_search_field" hidden>
                        <label for="building" class="col-md-5 form-label">Select Building </label>
                        <div class="col-md-7">
                            <select class="form-control" id="building" name="building">
                                @if(isset($article))
                                    <option value="{{ $article->building }}">{{ $building_name }}</option>@endif
                                @foreach ($buildings as $building)
                                    <option value="{{ $building->id }}"><span>{{ $building->name }}</span></option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-1 advance_search_field" hidden>
                        <button class="btn btn-primary" id="expand_search_start">Search</button>
                    </div>
                    <div class="col-md-2 text-right advance_search_field" hidden>
                        <div style="font-size: 13px; margin-top: 5px;"><a id="origin_search">Original Search</a></div>
                    </div>
                    <div class="col-md-3 text-right">
                        <a href="{{ route('company.rarticle.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Create Article</a>
                    </div>
                </div>

                <div class="table-primary">
                    @include('company.Rental.articles.table')
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
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
            $('#datatables_wrapper .table-caption').text('Articles');
            $('#datatables_wrapper .dataTables_filter input').attr('style', 'display: none');
        });

        $('#expand_search').on('click', function(){
            $('.articles_search_field').attr('style', 'display: none');
            $('.advance_search_field').attr('style', 'display: block');
        });

        $('#origin_search').on('click', function(){
            $('.articles_search_field').attr('style', 'display: block');
            $('.advance_search_field').attr('style', 'display: none');
        });

        // Find advanced Search
        $('#expand_search_start').on('click', function(){
            var building = document.getElementById('building').value;
            $.ajax({
                url: '{{ route("company.rarticle.advance_search") }}',
                data: {building: building},
                dataType: 'json',
                cache: false,
                type: 'POST', // For jQuery < 1.9
                success: function (data) {
                    if(data.success) {
                        var article_body = '';
                        var articles = data.data.articles;
                        articles.forEach(function(article, index) {
                            article_body += '<tr class="odd gradeX">';
                            article_body += '<td>' + index + '</td>';
                            article_body += '<td>' + article.module + '</td>';
                            article_body += '<td>' + article.sales_price + '</td>';
                            article_body += '<td>' + article.in_price + '</td>';
                            article_body += '<td>' + article.unit + ' Per Month' + '</td>';
                            article_body += '<td>' + article.start_date + '</td>';
                            article_body += '<td>' + article.end_date + '</td>';
                            article_body += '<td>' + article.vat + ' %' + '</td>';
                            article_body += '<td  width="200px" class="text-center">';
                            article_body += '<form method="POST" action="{{ route('company.rarticle.destroy', '%ID%') }}" accept-charset="UTF-8"><input name="_method" type="hidden" value="DELETE">';
                            article_body += '<input name="_token" type="hidden" value="{{ csrf_token() }}">';
                            article_body += '<a href="{{ route('company.rarticle.show', 1)}} "><i class="fa fa-eye fa-lg text-info"></i></a>';
                            article_body += '&nbsp;';
                            article_body += '<a href="{{ route('company.rarticle.edit', '%ID%')}}"><i class="fa fa-edit fa-lg text-info"></i></a>';
                            article_body += '&nbsp;';
                            article_body += '<button type="submit" class="btn btn-danger btn-xs" onclick="return confirm("Are you sure?"><i class="fa fa-trash"></i></button>';
                            article_body += '</form >';
                            article_body += '</td >';
                            article_body += '</tr >';
                            article_body = article_body.replace("%ID%", article.id);
                            article_body = article_body.replace("%ID%", article.id);
                        });
                        $('#article_table_body').html(article_body);
                    }
                },
                error: function (xhr, status, error) {

                }

            });
        });

        $("#search_articles").on('change', function () {
            var data = document.getElementById('search_articles').value;
            $.ajax({
                url: '{{ route("company.rarticle.search") }}',
                data: {data: data},
                dataType: 'json',
                cache: false,
                type: 'POST', // For jQuery < 1.9
                success: function (data) {
                    if(data.success) {
                        var article_body = '';
                        var articles = data.data.articles;
                        articles.forEach(function(article, index) {
                            article_body += '<tr class="odd gradeX">';
                            article_body += '<td>' + index + '</td>';
                            article_body += '<td>' + article.module + '</td>';
                            article_body += '<td>' + article.sales_price + '</td>';
                            article_body += '<td>' + article.in_price + '</td>';
                            article_body += '<td>' + article.unit + ' Per Month' + '</td>';
                            article_body += '<td>' + article.start_date + '</td>';
                            article_body += '<td>' + article.end_date + '</td>';
                            article_body += '<td>' + article.vat + ' %' + '</td>';
                            article_body += '<td  width="200px" class="text-center">';
                            article_body += '<form method="POST" action="{{ route('company.rarticle.destroy', '%ID%') }}" accept-charset="UTF-8"><input name="_method" type="hidden" value="DELETE">';
                            article_body += '<input name="_token" type="hidden" value="{{ csrf_token() }}">';
                            article_body += '<a href="{{ route('company.rarticle.show', 1)}} "><i class="fa fa-eye fa-lg text-info"></i></a>';
                            article_body += '&nbsp;';
                            article_body += '<a href="{{ route('company.rarticle.edit', '%ID%')}}"><i class="fa fa-edit fa-lg text-info"></i></a>';
                            article_body += '&nbsp;';
                            article_body += '<button type="submit" class="btn btn-danger btn-xs" onclick="return confirm("Are you sure?"><i class="fa fa-trash"></i></button>';
                            article_body += '</form >';
                            article_body += '</td >';
                            article_body += '</tr >';
                            article_body = article_body.replace("%ID%", article.id);
                            article_body = article_body.replace("%ID%", article.id);
                        });
                        $('#article_table_body').html(article_body);
                    }
                },
                error: function (xhr, status, error) {

                }
            });
        });
    </script>
@endsection

