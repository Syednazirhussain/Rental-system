<input type="hidden" id="statistic_data" value="@if(isset($statistic)) {{ $statistic }} @endif">
<div class="row">
    @for($i = 0; $i< $count; $i++)
        <div class="col-md-12 form-group chart_container" >
            <h3 id="header{{ $i }}"></h3>
            <div style="height: 350px !important;">
                <canvas id="statistic{{ $i }}"></canvas>
            </div>
        </div>
    @endfor
</div>
