@section('css')
    <style>
        * {
            box-sizing: border-box
        }

        body {
            font-family: Verdana, sans-serif;
            margin: 0
        }

        img {
            vertical-align: middle;
        }

        /* Slideshow container */
        .slideshow-container {
            max-width: 1000px;
            position: relative;
            margin: auto;
            padding: 5px 5px 5px 0px;
        }

        /* Fading animation */
        .fade {
            opacity: 100 !important;
            -webkit-animation-name: fade;
            -webkit-animation-duration: 1.5s;
            animation-name: fade;
            animation-duration: 1.5s;
        }

        .resultItem {
            list-style: none;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            cursor: pointer;
        }

        .resultItem-name {
            color: #49c000 !important;
        }

        .resultItem:hover {
            -webkit-box-shadow: 0 3px 14px 0 rgba(0,0,0,.15);
            -moz-box-shadow: 0 3px 14px 0 rgba(0,0,0,.15);
            box-shadow: 0 3px 14px 0 rgba(0,0,0,.15);
        }

        .productLineTabItem.productLineTabItem--active {
            width: 200px;
            border-top: 3px solid #49c000;
            border-right: 2px solid #dedede;
            border-bottom: 0 none;
            border-left: 2px solid #dedede;
            border-radius: 5px 5px 0 0;
        }

        .productLineTabItem {
            vertical-align: top;
            display: table-cell;
            padding: 10px 17px;
            border-bottom: 2px solid #dedede;
            font-family: Raleway;
            font-weight: 400;
        }

        .productLineTabItem i {
            font-size: 40px;
            color: #49c000;
        }

        .productLineTabItem .productLineTabItem-icon {
            float: left;
            margin: 0 10px 0 0;
        }

        .productLineTabItem .productLineTabItem-icon .productLineTabItem-iconAll {
            display: block;
            height: 34px;
            width: 34px;
        }

        .productLineTabItem--active.productLineTabItem .productLineTabItem-name {
            color: #589442;
            font-family: Raleway;
            font-weight: 500;
        }

        .productLineTabItem .productLineTabItem-name {
            display: block;
            font-size: 18px;
            line-height: 1.15;
            text-transform: uppercase;
            color: #4e4e56;
        }

        .productLineTabItem .productLineTabItem-baseline {
            display: block;
            font-size: 13px;
        }

        .search-header {
            background-color: #E3E3E3;
            border-bottom: 1px solid #DCDCDC;
        }

        .search-header h4{
            margin-bottom: 0px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .search-box {
            border-radius: 3px;
            box-shadow: 1px 2px 2px rgba(0,0,0,.2);
            border-left: 1px solid #E3E3E3;
            color: #434343;
            padding-bottom: 20px;
        }

        .search-content {
            padding: 20px 20px;
        }

        .panel .alert-success {
            margin-bottom: 0px !important;
        }
    </style>
@endsection

<div class="row">
    <div class="col-md-4">
        <div class="slideshow-container">
            <div class="mySlides fade">
                <img src="{{ asset('uploadedimages/'.$room->image1) }}" style="width:100%">
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="resultItem-information">
            <h3 class="resultItem-name">{{ $room->name }} Floor - {{ $room->floor }} {{ $room->room_name }}</h3>
            <div class="resultItem-address">
                <span class="resultItem-distance">{{ $room->address }}</span>
            </div>

            <div class="resultItem-averagePrice">
                Zipcode: {{ $room->zipcode }}
            </div>
            <div class="resultItem-area">
                Area: {{ $room->area }} sqm
            </div>
            <div class="resultItem-area">
                Price: ${{ $room->price }}
            </div>
        </div>
    </div>
</div>