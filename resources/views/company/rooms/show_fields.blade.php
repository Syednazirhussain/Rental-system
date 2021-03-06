@section('css')
    <!-- Zabuto calendar -->
    <link href="{{ asset('/css/zabuto_calendar.min.css') }}" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box
        }

        body {
            font-family: Verdana, sans-serif;
            margin: 0
            background: #fefefe;
        }

        .mySlides {
            display: none
        }

        img {
            vertical-align: middle;
        }

        /* Slideshow container */
        .slideshow-container {
            max-width: 1000px;
            position: relative;
            margin: auto;
        }

        /* Next & previous buttons */
        .prev, .next {
            cursor: pointer;
            position: absolute;
            top: 50%;
            width: auto;
            padding: 16px;
            margin-top: -22px;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: 0.6s ease;
            border-radius: 0 3px 3px 0;
        }

        /* Position the "next button" to the right */
        .next {
            right: 0;
            border-radius: 3px 0 0 3px;
        }

        /* On hover, add a black background color with a little bit see-through */
        .prev:hover, .next:hover {
            background-color: rgba(0, 0, 0, 0.8);
        }

        /* Caption text */
        .text {
            color: #f2f2f2;
            font-size: 15px;
            padding: 8px 12px;
            position: absolute;
            bottom: 8px;
            width: 100%;
            text-align: center;
        }

        /* Number text (1/3 etc) */
        .numbertext {
            color: #f2f2f2;
            font-size: 12px;
            padding: 8px 12px;
            position: absolute;
            top: 0;
        }

        /* The dots/bullets/indicators */
        .dot {
            cursor: pointer;
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }

        .active, .dot:hover {
            background-color: #717171;
        }

        /* Fading animation */
        .fade {
            opacity: 100 !important;
            -webkit-animation-name: fade;
            -webkit-animation-duration: 1.5s;
            animation-name: fade;
            animation-duration: 1.5s;
        }

        .building_address {
            font-size: 15px;
            color: #939396;
        }

        .pd-t-5 {
            padding-top: 5px;
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
    <div class="col-md-6">
        <table class="table table-striped">
            <tbody>
            <tr>
                <th scope="row" width="200px">Id</th>
                <th>{{ $room->id }}</th>
            </tr>
            <tr>
                <th scope="row" width="200px">Company Name</th>
                <th>{{ $company->name }}</th>
            </tr>
            <tr>
                <th scope="row" width="200px">Building Name</th>
                <th>{{ $building->name }}</th>
            </tr>
            <tr>
                <th scope="row" width="200px">Building Address</th>
                <th>{{ $building->address }}</th>
            </tr>
            <tr>
                <th scope="row" width="200px">Building Zipcode</th>
                <th>{{ $building->zipcode }}</th>
            </tr>
            <tr>
                <th scope="row" width="200px">Floors</th>
                <th>{{ $floor }}</th>
            </tr>
            <tr>
                <th scope="row" width="200px">Name</th>
                <th>{{ $room->name }}</th>
            </tr>
            <tr>
                <th scope="row" width="200px">Area</th>
                <th>{{ $room->area }}</th>
            </tr>
            <tr>
                <th scope="row" width="200px">Price</th>
                <th>$ {{ $room->price }}</th>
            </tr>
            <tr>
                <th scope="row" width="200px">Security Code</th>
                <th>{{ $room->security_code }}</th>
            </tr>
            <tr>
                <th scope="row" width="200px">Service</th>
                <th>{{ $service }}</th>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-6">
        <div class="slideshow-container">
            @if($room->image1 !== '')
                <div class="mySlides fade">
                    <img src="{{ asset('uploadedimages/'.$room->image1) }}" style="width:100%">
                </div>
            @endif
            @if($room->image2 !== '')
                <div class="mySlides fade">
                    <img src="{{ asset('uploadedimages/'.$room->image2) }}" style="width:100%">
                </div>
            @endif
            @if($room->image3 !== '')
                <div class="mySlides fade">
                    <img src="{{ asset('uploadedimages/'.$room->image3) }}" style="width:100%">
                </div>
            @endif
            @if($room->image4 !== '')
                <div class="mySlides fade">
                    <img src="{{ asset('uploadedimages/'.$room->image4) }}" style="width:100%">
                </div>
            @endif
            @if($room->image5 !== '')
                <div class="mySlides fade">
                    <img src="{{ asset('uploadedimages/'.$room->image5) }}" style="width:100%">
                </div>
            @endif

            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>

        </div>
    </div>
</div>
<div class="row" style="margin-top: 50px;">
    <div class="col-md-6">
        <table class="table table-striped table-bordered" id="roomContractsTable">
            <thead>
            <tr>
                <th>No</th>
                <th>Contract No</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Contract Price</th>
            </tr>
            </thead>
            <tbody>
            @foreach($roomContracts as $room)
                <tr>
                    <td>{!! $loop->index + 1 !!}</td>
                    <td>{!! $room->contract_number !!}</td>
                    <td>{!! $room->start_date !!}</td>
                    <td>{!! $room->end_date !!}</td>
                    <td>{!! $room->price !!}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-md-6">
        <div id="my-calendar"></div>
        <input type="hidden" id="room_contract_data" value="{{ $roomContracts }}">
    </div>
</div>

@section('js')
    <script src="{{ asset('/js/zabuto_calendar.min.js') }}"></script>
    <script>
        var eventData = [];

        //Calendar management
        var data = JSON.parse(document.getElementById('room_contract_data').value);
        data.forEach(function(item){
            for (var d = new Date(item.start_date); d <= new Date(item.end_date); d.setDate(d.getDate() + 1)) {
                var temp = new Date(d);
                var month = temp.getMonth() > 8 ? (temp.getMonth() + 1).toString() : '0' + (temp.getMonth() + 1).toString();
                var day = temp.getDate() > 9 ? temp.getDate().toString() : '0' + temp.getDate().toString();
                eventData.push({"date": temp.getFullYear().toString() + '-' + month + '-' + day, "badge": false});
            }
        });

        $("#my-calendar").zabuto_calendar({
            language: "en",
            show_previous: false,
            nav_icon: {
                prev: '<i class="fa fa-chevron-left" aria-hidden="true"></i>',
                next: '<i class="fa fa-chevron-right" aria-hidden="true"></i>'
            },
            legend: [
                {type: "text", label: "Booked Dates", badge: "00"},
            ],
            data: eventData,
        });

        var slideIndex = 1;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function currentSlide(n) {
            showSlides(slideIndex = n);
        }

        function showSlides(n) {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            //var dots = document.getElementsByClassName("dot");
            if (n > slides.length) {slideIndex = 1}
            if (n < 1) {slideIndex = slides.length}
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            /*for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }*/
            slides[slideIndex-1].style.display = "block";
            //dots[slideIndex-1].className += " active";
        }
    </script>
@endsection