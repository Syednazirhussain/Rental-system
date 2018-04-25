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

        .wizard-steps li {
            min-width: 150px !important;
            max-width: 150px !important;;
            width: 150px !important;
        }

        .wizard-steps li.active {
            background-color: #ffffff;
        }

        .wizard-pane.active {
            background-color: #ffffff;
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
    <div class="col-md-12">
        <h1>{{ $room->name }}</h1>
    </div>
    <div class="col-md-12">
        <span class="building_address">{{ $building->address }}, {{ $building->zipcode }}</span><br/>
        <span class="building_address">{{ $building->name }} Floor - {{ $floor }}</span>
    </div>
</div>
<div class="row" style="margin-top: 50px">
    <div class="col-md-7">
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
        <input type="hidden" id="room_contract_data" value="{{ $room_contracts }}">
    </div>
    <div class="col-md-5">
        <form action="{{ route('home.rooms.store') }}" method="POST" id="roomContractForm">
            {{ csrf_field() }}
            <div class="wizard" id="wizard-basic">
                <div class="wizard-wrapper">
                    <ul class="wizard-steps">
                        <li data-target="#wizard-step1">
                            <span class="wizard-step-number">1</span>
                            <span class="wizard-step-complete"><i class="fa fa-check text-success"></i></span>
                            <span class="wizard-step-caption">
                              Step 1
                            </span>
                        </li>
                        <li data-target="#wizard-step2">
                            <span class="wizard-step-number">2</span>
                            <span class="wizard-step-complete"><i class="fa fa-check text-success"></i></span>
                            <span class="wizard-step-caption">
                              Step 2
                            </span>
                        </li>
                        <li data-target="#wizard-step3">
                            <span class="wizard-step-number">3</span>
                            <span class="wizard-step-complete"><i class="fa fa-check text-success"></i></span>
                            <span class="wizard-step-caption">
                              Finish
                            </span>
                        </li>
                    </ul>
                </div>
                <div class="wizard-content" style="padding-bottom: 20px;">
                    <div class="wizard-pane" id="wizard-step1">
                        <div class="col-md-12">
                            <h4 class="text-center" style="color: #49c000">Please Choose Start Date</h4>
                        </div>
                        <div id="my-calendar"></div>
                        <div class="col-md-12" style="padding-top: 20px;">
                            <div class="pull-right">
                                <button type="button" class="btn btn-primary" data-wizard-action="next">Next Step</button>
                            </div>
                        </div>
                    </div>
                    <div class="wizard-pane" id="wizard-step2">
                        <div class="col-md-12">
                            <h4 class="text-center" style="color: #49c000">Please Choose End Date</h4>
                        </div>
                        <div id="calendar_endate"></div>
                        <div class="col-md-12" style="padding-top: 20px;">
                            <div class="pull-right">
                                <button type="button" class="btn" data-wizard-action="prev">Prev</button>
                                <button type="button" class="btn btn-primary" data-wizard-action="next">Next</button>
                            </div>
                        </div>
                    </div>
                    <div class="wizard-pane" id="wizard-step3">
                        <div class="col-md-12">
                            <h4 class="text-center" style="color: #49c000">Confirmation</h4>
                        </div>
                        <div class="col-md-12 text-center">
                            <h4 id="book_start_date" class="text-center" style="color: #49c000; margin-top: 20px;"></h4>
                            <h4 id="book_end_date" class="text-center" style="color: #49c000; margin-top: 20px;"></h4>
                            <h4 style="color: #49c000; margin-top: 20px;">Price {{ $room->price }}</h4>
                            <input type="hidden" id="start_date" name="start_date">
                            <input type="hidden" id="end_date" name="end_date">
                            <input type="hidden" id="room_id" name="room_id" value="{{ $room->id }}">
                        </div>
                        <div class="col-md-12">
                            <div class="pull-right">
                                <button type="button" class="btn" data-wizard-action="prev">Prev</button>
                                <button type="submit" class="btn btn-primary" data-wizard-action="finish">Book Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="room-information">
            <div>
                <h4>Owner: {{ $company->name }}</h4>
            </div>
            <div class="pd-t-5">
                <span class="building_address">Area: {{ $room->area }} Sqm</span>
            </div>
            <div class="pd-t-5">
                <span class="building_address">Service: {{ $service }}</span>
            </div>
            <div class="pd-t-5">
                <span class="building_address">Security Code: {{ $room->security_code }}</span>
            </div>
            <div class="pd-t-5">
                <span class="building_address">Price: ${{ $room->price }}</span>
            </div>
        </div>
        <br/>
        <a href="{!! route('home.rooms.book', $room->id) !!}" class="btn btn-primary">Book This Room</a>
        <a href="{!! route('home') !!}" class="btn btn-default">Back</a>
    </div>
</div>

@section('js')
    <script src="{{ asset('/js/zabuto_calendar.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#wizard-basic').pxWizard();

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
                action: function () {
                    return chooseStartDate(this.id, false);
                },
            });

            $("#calendar_endate").zabuto_calendar({
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
                action: function () {
                    return chooseEndDate(this.id, false);
                },
            });
            var start_date = '';
            function chooseStartDate(id, fromModal) {
                var $calendar_id = $('#wizard-step1').find('.zabuto_calendar').parent().attr('id');

                if (start_date != '')
                    document.getElementById($calendar_id + '_' + start_date.toString() + '_day').style.backgroundColor = 'white';

                start_date = $("#" + id).data("date");
                var hasEvent = $("#" + id).data("hasEvent");
                if (hasEvent && !fromModal) {
                    return false;
                }

                //check if booked
                if (document.getElementById($calendar_id + '_' + start_date.toString() + '_day').style.backgroundColor == '#fff0c3')
                    return false;

                $("#book_start_date").html("Start Date " + start_date.toString());
                document.getElementById('start_date').value = start_date.toString();
                document.getElementById($calendar_id + '_' + start_date.toString() + '_day').style.backgroundColor = 'yellow';
                return true;
            }

            var end_date = '';
            function chooseEndDate(id, fromModal) {
                var $calendar_id = $('#wizard-step2').find('.zabuto_calendar').parent().attr('id');
                if (end_date != '')
                    document.getElementById($calendar_id + '_' + end_date.toString() + '_day').style.backgroundColor = 'white';

                end_date = $("#" + id).data("date");
                var hasEvent = $("#" + id).data("hasEvent");
                if (hasEvent && !fromModal) {
                    return false;
                }

                //check if booked
                if (document.getElementById($calendar_id + '_' + end_date.toString() + '_day').style.backgroundColor == '#fff0c3')
                    return false;

                $("#book_end_date").html("End Date " + end_date.toString());
                document.getElementById('end_date').value = end_date.toString();
                document.getElementById($calendar_id + '_' + end_date.toString() + '_day').style.backgroundColor = 'yellow';
                return true;
            }

        });

        //Slider Management
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
            if (n > slides.length) {
                slideIndex = 1
            }
            if (n < 1) {
                slideIndex = slides.length
            }
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            /*for (i = 0; i < dots.length; i++) {
             dots[i].className = dots[i].className.replace(" active", "");
             }*/
            slides[slideIndex - 1].style.display = "block";
            //dots[slideIndex-1].className += " active";
        }
    </script>
@endsection