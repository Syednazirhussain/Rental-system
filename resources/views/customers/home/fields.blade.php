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
            padding: 5px;
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
        }

        .resultItem:hover {
            -webkit-box-shadow: 0 3px 14px 0 rgba(0,0,0,.15);
            -moz-box-shadow: 0 3px 14px 0 rgba(0,0,0,.15);
            box-shadow: 0 3px 14px 0 rgba(0,0,0,.15);
        }

        @-webkit-keyframes fade {
            from {
                opacity: .4
            }
            to {
                opacity: 1
            }
        }

        @keyframes fade {
            from {
                opacity: .4
            }
            to {
                opacity: 1
            }
        }

        /* On smaller screens, decrease text size */
        @media only screen and (max-width: 300px) {
            .prev, .next, .text {
                font-size: 11px
            }
        }
    </style>
@endsection

<div class="row">
    <div class="col-md-5">
        <div class="slideshow-container">
            <div class="mySlides fade">
                <img src="{{ asset('uploadedimages/'.$room->image1) }}" style="width:100%">
            </div>
        </div>
    </div>
    <div class="col-md-7">
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