<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <title>SIM-SOH INTERNATIONAL SERVICES, INC.</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/x-icon" href="{{ asset('simsoh/logosim.ico') }}">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="{{ asset('simsoh/bootstrap.min.css') }}"/>

    <!-- Owl Carousel -->
    <link type="text/css" rel="stylesheet" href="{{ asset('simsoh/owl.carousel.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('simsoh/owl.theme.default.css') }}"/>

    <!-- Magnific Popup -->
    <link type="text/css" rel="stylesheet" href="{{ asset('simsoh/magnific-popup.css') }}"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{ asset('simsoh/fonts/font-awesome.min.css') }}">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{ asset('simsoh/style.css') }}"/>

    <link rel="stylesheet" type="text/css" href="{{ asset('simsoh/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('simsoh/layout-styles.css') }}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Verdana, sans-serif;
        }

        .mySlides {
            display: none;
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
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }

        .active {
            background-color: #717171;
        }

        /* Fading animation */
        .fade {
            -webkit-animation-name: fade;
            -webkit-animation-duration: 3.5s;
            animation-name: fade;
            animation-duration: 3.5s;
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

        @import url('https://fonts.googleapis.com/css?family=Averia+Serif+Libre|Bubblegum+Sans|Caveat+Brush|Chewy|Lobster+Two');


        body {
            width: 100%;
            height: 100%;
        }

        html {
            width: 100%;
            height: 100%;
        }

        .navbar {
            border: 0;
            z-index: 9999;
            letter-spacing: 4px;

        }

        .logo {
            display: block;
            height: auto;
            width: 52px;
            padding-top: 5px;
            margin-right: 15px;
        }

        .navbar-brand > img {
            height: 100%;
            padding: 15px; /* firefox bug fix */
            width: auto;
        }

        .navbar .nav > li > a {
            line-height: inherit;
        }

        .navbar-header h1 {
            letter-spacing: 1px;
            color: black !important;
            font-family: 'Lobster Two', cursive;
        }

        .navbar-header {
            padding-top: 5px;
            padding-bottom: 10px;
        }

        .navbar-nav {
            padding-top: 15px !important;
        }

        .navbar li a, .navbar {
            color: black !important;
            font-size: 12px;
            transition: all 0.6s 0s;
        }

        .navbar-toggle {
            background-color: transparent !important;
            border: 0;
        }

        .navbar-nav li a:hover, .navbar-nav li.active a {
            color: red !important;
        }


    </style>
</head>

<body>

<header id="home">
    <!-- Background Image -->
    <div class="bg-img" style="background-image: url('{{ asset('simsoh/simsohbg.jpg') }}');">
        <div class="overlay"></div>
    </div>
    <!-- /Background Image -->

    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"
                        data-target="#myNavbar">
                    <span class="glyphicon glyphicon-menu-hamburger"></span>
                </button>
                <div class="navbar-left logo">
                    <img class="logo" src="{{ asset('simsoh/logosim.png') }}" alt="logo">
                </div>
            </div>
            <div class="collapse navbar-collapse navbar-right" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#service">Services</a></li>
                    <li><a href="#Branches">Branch</a></li>
                    <li><a href="#portfolio">Recruitment Office</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="#contact">Contact</a></li>
                    <li><a href="{{ route('complains.form', ['agency_id' => 0]) }}">Complaint</a></li>
                    
                    @guest()
                        <li><a href="{{ route('login') }}" class="btn btn-sm btn-info" style="padding: 10px;margin-left: 12px;">Login</a></li>
                    @else
                        <li><a href="{{ route('dashboard') }}" class="btn btn-sm btn-info" style="padding: 10px;margin-left: 12px;">My Account</a></li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <!-- Nav -->

    <!-- home wrapper -->
    <div class="home-wrapper">
        <div class="container">
            <div class="row">

                <!-- home content -->
                <div class="col-md-10 col-md-offset-1">
                    <div class="home-content">
                        <h1 class="white-text">SIM-SOH INTERNATIONAL SERVICES, INC.</h1>
                        <p class="white-text">A landbase agency which opened its flambouyant horizons in May, 1993.
                            Nevertheless, it has been operating and continuously pro-active for the past twenty-four
                            years serving and reaching out overseas job-seekers from the "End North Bound" to the "South
                            End Bound" in the whole archipelago.
                        </p>
                    </div>
                </div>
                <!-- /home content -->

            </div>
        </div>
    </div>
    <!-- /home wrapper -->

</header>
<div id="about" class="section md-padding">

    <!-- Container -->
    <div class="container">

        <!-- Row -->
        <div class="row">

            <!-- Section header -->
            <div class="section-header text-center">
                <h2 class="title">Welcome to Our Website</h2>
            </div>
            <!-- /Section header -->

            <!-- about -->
            <div class="col-md-6">
                <div class="about">
                    <i class="fa fa-pencil"></i>
                    <h3>Our Mission</h3>
                    <p>The rich imagination and perspective essence of our mission is cordially centered, designed and
                        manifested to motivate, enlighten, partake and integrate constellation of unconditional
                        assistance to young youth who are deserving, potential and highly qualified fully engross to
                        work in so far a journey to be deployed overseas.</p>
                    <br><br><br>
                </div>
            </div>
            <!-- /about -->


            <!-- about -->
            <div class="col-md-6">
                <div class="about">
                    <i class="fa fa-pencil"></i>
                    <h3>Our Vision</h3>
                    <p>To be considered as one of the most prestigious agencies in the country evolving the “Magnet” of
                        the worldwide market in the recruitment industry. Likewise, an epitomed, highly patronized,
                        distinguished and respected agency for its transparency in favor of the OFW in accordance to the
                        valid and binding benefits and standard salary rate will be imposed and admonished. Awareness to
                        be safeguarded while away from the welfare of the family left behind.</p>

                </div>
            </div>
            <!-- /about -->

        </div>
        <!-- /Row -->

    </div>
    <!-- /Container -->
    <div class="container">

        <!-- Row -->
        <div class="row">

            <!-- why choose us content -->
            <div class="col-md-12">
                <div class="section-header">
                    <h2 class="title">Our Story</h2>
                </div>
                <p>SIM-SOH International Services (SIS) Inc. a corporation duly organized and existing under the laws of
                    the Republic of the Philippines. The agency opened its doors on May 11, 1993. Apparently, it has
                    been operating for more than two decades already. <br> <br> The corporation was built in a
                    multi-task premise; to provide total manpower service worlwide. It is created to be a well-organized
                    and professionally managed human resource consultant company. <br><br> Our human resource
                    consultants are well versed in the laws, policies, practices and culture about the Middle East like
                    Saudi Arabia, Kuwait, Qatar, United Arab Emirates, Libya, United Kingdom, Russia, Australia, New
                    Zealand, USA & Canada. <br><br> In 1997-1998 SIM-SOH had been declared and appreciated at Qatar
                    Embassy the highest rate of deployment mostly professionals, engineers, skilled and semi skilled. In
                    Asia we had deployed domestic helpers, caregivers and actory workers to Taiwan, Hongkong and
                    Singapore. To date, we are deploying caregivers, household workers to Saudi Arabia, Kuwait and
                    Qatar. Thus the company has the knowledge and experience to advise our valued clients and applicants
                    in any of their manpower requirements.
                </p>
            </div>
            <!-- /why choose us content -->

            <!-- About slider -->
            <!-- <div class="col-md-6">
                <div id="about-slider" class="owl-carousel owl-theme">
                    <img class="img-responsive" src="about1.jpg" alt="">
                    <img class="img-responsive" src="about2.jpg" alt="">
                    <img class="img-responsive" src="about1.jpg" alt="">
                    <img class="img-responsive" src="about2.jpg" alt="">
                </div>
            </div> -->
            <!-- /About slider -->

        </div>
        <!-- /Row -->

    </div>
    <br>

    <div class="container">

        <!-- Row -->
        <div class="row">

            <!-- why choose us content -->
            <div class="col-md-6">
                <div class="section-header">
                    <h2 class="title">Branches</h2>
                </div>

                <div class="feature">
                    <i class="fa fa-building-o"></i>
                    <p>Makati City</p>
                </div>
                <div class="feature">
                    <i class="fa fa-building-o"></i>
                    <p>Cagayan De Oro City</p>
                </div>
                <div class="feature">
                    <i class="fa fa-building-o"></i>
                    <p>Butuan City</p>
                </div>
                <div class="feature">
                    <i class="fa fa-building-o"></i>
                    <p>Digos City</p>
                </div>
                <div class="feature">
                    <i class="fa fa-building-o"></i>
                    <p>Cebu City</p>
                </div>
                <div class="feature">
                    <p><b>SOON TO OPEN</b></p>
                </div>
                <div class="feature">
                    <i class="fa fa-building-o"></i>
                    <p>Bacolod City</p>
                </div>
            </div>
            <!-- /why choose us content -->
            <div class="col-md-6">
                <div class="mySlides fade">
                    <div class="numbertext">1 / 5</div>
                    <img src="{{ asset('simsoh/makati.png') }}" style="width:100%">
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">2 / 5</div>
                    <img src="{{ asset('simsoh/cagayandeoro.png') }}" style="width:100%">
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">3 / 5</div>
                    <img src="{{ asset('simsoh/butuan.png') }}" style="width:100%">
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">4 / 5</div>
                    <img src="{{ asset('simsoh/digos.png') }}" style="width:100%">
                </div>

                <div class="mySlides fade">
                    <div class="numbertext">5 / 5</div>
                    <img src="{{ asset('simsoh/cebu.jpeg') }}" style="width:100%">
                </div>

            </div>
            <br>


        </div>
        <!-- Slideshow container -->

        <!-- The dots/circles -->
        <div style="text-align:center">
            <span class="dot" onclick="currentSlide(1)"></span>
            <span class="dot" onclick="currentSlide(2)"></span>
            <span class="dot" onclick="currentSlide(3)"></span>
            <span class="dot" onclick="currentSlide(4)"></span>
            <span class="dot" onclick="currentSlide(5)"></span>
        </div>
        <!-- About slider -->
        <!-- <div class="col-md-6">
            <div id="about-slider" class="owl-carousel owl-theme">
                <img class="img-responsive" src="makati.png" alt="">
                <img class="img-responsive" src="cagayandeoro.png" alt="">
                <img class="img-responsive" src="butuan.png" alt="">
                <img class="img-responsive" src="digos.png" alt="">
            </div>
        </div> -->
        <!-- /About slider -->

    </div>
    <!-- /Row -->

</div>

</div>
<div id="numbers" class="section sm-padding">

    <!-- Background Image -->
    <div class="bg-img" style="background-image: url('{{ asset('simsoh/background2.jpg') }}');">
        <div class="overlay"></div>
    </div>
    <!-- /Background Image -->

    <!-- Container -->
    <div class="container">

        <!-- Row -->
        <div class="row">

            <!-- number -->
            <div class="col-sm-12 col-xs-6">
                <div class="number">
                    <i class="fa fa-commenting"></i>
                    <h3 class="white-text"><span
                                class="counter">We believe what makes SIM-SOH different is our focus:</span></h3>
                    <span class="white-text">To put our applicant first, The Company is driven by a sincere desire to enable our aplicants success and carry on the commitment to manpower services</span>
                </div>
            </div>

        </div>
        <!-- /Row -->

    </div>
    <!-- /Container -->

</div>
<div id="service" class="section md-padding">

    <!-- Container -->
    <div class="container">

        <!-- Row -->
        <div class="row">

            <!-- Section header -->
            <div class="section-header text-center">
                <h2 class="title">Services Offered</h2>
            </div>
            <!-- /Section header -->

            <!-- service -->
            <div class="col-md-4 col-sm-6">
                <div class="service">
                    <i class="fa fa-pencil"></i>
                    <h3>Household Workers</h3>
                    <p>-Domestic helper <br>
                        -Baby sitter <br>
                        -Family driver <br>
                        -Caretaker <br>
                        -in house Gardener</p>
                </div>
            </div>
            <!-- /service -->

            <!-- service -->
            <div class="col-md-4 col-sm-6">
                <div class="service">
                    <i class="fa fa-pencil"></i>
                    <h3>Medical Staff</h3>
                    <p>-Nurses <br>
                        -Midwife <br>
                        -And other related medical categories <br><br></p>
                </div>
            </div>
            <!-- /service -->

            <!-- service -->
            <div class="col-md-4 col-sm-6">
                <div class="service">
                    <i class="fa fa-pencil"></i>
                    <h3>Education Training</h3>
                    <p>-Teachers both Elementary, Secondary and College <br>
                        -Lecturer <br>
                        -Pre School Teachers <br>
                        -Computer Specialist <br></p>
                </div>
            </div>
            <!-- /service -->

            <!-- service -->
            <div class="col-md-4 col-sm-6">
                <div class="service">
                    <i class="fa fa-pencil"></i>
                    <h3>Commercial Firms</h3>
                    <p>-Cameraman <br>
                        -Computer Operator <br>
                        -Computer Programmer / Analyst <br>
                        -Computer Technician <br>
                        -Factory worker / Operator <br>
                        -Maintenance worker <br>
                        -Printer <br>

                    </p>
                </div>
            </div>
            <!-- /service -->

            <!-- service -->
            <div class="col-md-4 col-sm-6">
                <div class="service">
                    <i class="fa fa-pencil"></i>
                    <h3>Construction Workers</h3>
                    <p>-Engineer <br>
                        -Welder <br>
                        -Heavy equipment operator <br>
                        -Mason <br>
                        -Carpenter <br>
                        -Architect <br>
                        -And other related technical categories
                    </p>
                </div>
            </div>
            <!-- /service -->

            <!-- service -->
            <div class="col-md-4 col-sm-6">
                <div class="service">
                    <i class="fa fa-pencil"></i>
                    <h3>Health Care</h3>
                    <p>-Nurses / Nursing Aide <br>
                        -Doctors <br>
                        -Midwives <br>
                        -Dentist / Orthodontist / Dental Assist. / Dental Technician <br>
                        -X Ray Tech / Radiologist <br>
                        -Hospital Administrators <br>
                        -Support Staffs
                    </p>
                </div>
            </div>
            <!-- /service -->
            <div class="col-md-4 col-sm-6">
                <div class="service">
                    <i class="fa fa-pencil"></i>
                    <h3>Office Personnel</h3>
                    <p>-Accountant <br>
                        -Marketing personnel <br>
                        -Human resources officer <br>
                        -Administrative staff <br>
                        -Encoder <br>
                        -Purchasing officer <br>
                        -Janitor <br>
                        -And other office related staff <br><br><br><br>
                    </p>
                </div>
            </div>

            <div class="col-md-4 col-sm-6">
                <div class="service">
                    <i class="fa fa-pencil"></i>
                    <h3>Hotel & Restaurant</h3>
                    <p>-Front desk officer / Receptionist <br>
                        -Waiter / Waitress <br>
                        -Chef / Pastry Chef <br>
                        -Cook <br>
                        -Bellboy <br>
                        -Bartender <br>
                        -Chamber Ward <br>
                        -Laundry helper <br>
                        -House keepers <br>
                        -Dishwasher <br>
                        -Cashiers
                    </p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="service">
                    <i class="fa fa-pencil"></i>
                    <h3>We can also supply workers for the following industries</h3>
                    <p>-Airports <br>
                        -Manufacturing Factories <br>
                        -Telecom / Information Technology <br>
                        -Engineering <br>
                        -Architecture <br>
                        -Mining <br>
                        -Power Plants <br>
                        -Petrochemical / Oil Refineries <br>
                    </p>
                </div>
            </div>

        </div>
        <!-- /Row -->

    </div>
    <!-- /Container -->

</div>

<div id="Branches" class="section md-padding">
    <div class="container">

        <!-- Row -->
        <div class="row">

            <!-- why choose us content -->
            <div class="col-md-6">
                <div class="section-header">
                    <h2 class="title">Branch</h2>
                </div>

                <div class="feature">
                    <i class="fa fa-building-o"></i>
                    <p>Cebu City</p><br>
                    <p><b>Office Address:</b></p>Rooms 811 & 812, 8th Floor, Luym Bldg., Plaridel St. Corner Osmena
                    Blvd., Cebu City<br>
                    <p><b>Contact No. :</b></p>
                    <p>09168296671 - Globe<br>
                        0931995968 - Smart</p>
                    <p><b>Branch Manager :</b></p>Mr. Julieto Cosie
                </div>
            </div>
            <!-- /why choose us content -->
            <div class="col-md-6">
                <img src="{{ asset('simsoh/cebu/cebu.jpeg') }}" style="width:100%" height="auto;">
                <iframe class="responsive-iframe"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3925.582904050241!2d123.89786131474482!3d10.295151492649184!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33a99be257522c69%3A0xba3f8a4827350744!2sLUYM%20Building%2C%20Cebu%20City%2C%20Cebu!5e0!3m2!1sen!2sph!4v1618134362879!5m2!1sen!2sph"
                        width="100%" height="300px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                <br><br><br><br>
            </div>
            <div class="container">

            </div>


            <div class="col-md-4 col-xs-6 work">
                <img class="img-responsive" src="{{ asset('simsoh/cebu/1.jpeg') }}" alt="">
                <div class="overlay"></div>
                <div class="work-content">
                    <div class="work-link">
                        <a class="lightbox" href="{{ asset('simsoh/cebu/1.jpeg') }}"><i class="fa fa-search"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xs-6 work">
                <img class="img-responsive" src="{{ asset('simsoh/cebu/2.jpeg') }}" alt="">
                <div class="overlay"></div>
                <div class="work-content">
                    <div class="work-link">
                        <a class="lightbox" href="{{ asset('simsoh/cebu/2.jpeg') }}"><i class="fa fa-search"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xs-6 work">
                <img class="img-responsive" src="{{ asset('simsoh/cebu/3.jpeg') }}" alt="">
                <div class="overlay"></div>
                <div class="work-content">
                    <div class="work-link">
                        <a class="lightbox" href="{{ asset('simsoh/cebu/3.jpeg') }}"><i class="fa fa-search"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xs-6 work">
                <img class="img-responsive" src="{{ asset('simsoh/cebu/4.jpeg') }}" alt="">
                <div class="overlay"></div>
                <div class="work-content">
                    <div class="work-link">
                        <a class="lightbox" href="{{ asset('simsoh/cebu/4.jpeg') }}"><i class="fa fa-search"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xs-6 work">
                <img class="img-responsive" src="{{ asset('simsoh/cebu/5.jpeg') }}" alt="">
                <div class="overlay"></div>
                <div class="work-content">
                    <div class="work-link">
                        <a class="lightbox" href="{{ asset('simsoh/cebu/5.jpeg') }}"><i class="fa fa-search"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xs-6 work">
                <img class="img-responsive" src="{{ asset('simsoh/cebu/6.jpeg') }}" alt="">
                <div class="overlay"></div>
                <div class="work-content">
                    <div class="work-link">
                        <a class="lightbox" href="{{ asset('simsoh/cebu/6.jpeg') }}"><i class="fa fa-search"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-xs-6 work">
                <img class="img-responsive" src="{{ asset('simsoh/cebu/7.jpeg') }}" alt="">
                <div class="overlay"></div>
                <div class="work-content">
                    <div class="work-link">
                        <a class="lightbox" href="{{ asset('simsoh/cebu/7.jpeg') }}"><i class="fa fa-search"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- About slider -->
        <!-- <div class="col-md-6">
            <div id="about-slider" class="owl-carousel owl-theme">
                <img class="img-responsive" src="makati.png" alt="">
                <img class="img-responsive" src="cagayandeoro.png" alt="">
                <img class="img-responsive" src="butuan.png" alt="">
                <img class="img-responsive" src="digos.png" alt="">
            </div>
        </div> -->
        <!-- /About slider -->

    </div>
    <!-- /Row -->

</div>

</div>

<div id="portfolio" class="section md-padding bg-grey">

    <!-- Container -->
    <div class="container">

        <!-- Row -->
        <div class="row">

            <!-- Section header -->
            <div class="section-header text-center">
                <h2 class="title">Our Recruitment Office</h2>
            </div>
            <!-- /Section header -->

            <!-- Work -->
            @for ($i = 1; $i <= 18; $i++)
                <div class="col-md-4 col-xs-6 work">
                    <img class="img-responsive" src="{{ asset("simsoh/$i.jpeg") }}" alt="">
                    <div class="overlay"></div>
                    <div class="work-content">
                        <div class="work-link">
                            <a class="lightbox" href="{{ asset("simsoh/$i.jpeg") }}"><i class="fa fa-search"></i></a>
                        </div>
                    </div>
                </div>
        @endfor
        <!-- /Work -->

        </div>
        <!-- /Row -->

    </div>
    <!-- /Container -->

</div>

<div id="contact" class="section md-padding">

    <!-- Container -->
    <div class="container">

        <!-- Row -->
        <div class="row">

            <!-- Section-header -->
            <div class="section-header text-center">
                <h2 class="title">Get in touch</h2>
            </div>
            <!-- /Section-header -->

            <!-- contact -->
            <div class="col-sm-4">
                <div class="contact">
                    <i class="fa fa-phone"></i>
                    <h3>Phone</h3>
                    <p>+632 819 6021</p>
                </div>
            </div>
            <!-- /contact -->

            <!-- contact -->
            <div class="col-sm-4">
                <div class="contact">
                    <i class="fa fa-envelope"></i>
                    <h3>Email</h3>
                    <p>simsoh_international@yahoo.com</p>
                </div>
            </div>
            <!-- /contact -->

            <!-- contact -->
            <div class="col-sm-4">
                <div class="contact">
                    <i class="fa fa-map-marker"></i>
                    <h3>Address</h3>
                    <p>E.L. Bondoc Business Center, 1674 Dian St, Makati, 1234 Metro Manila</p>
                </div>
            </div>
            <!-- /contact -->

            <div class="container">
                <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.780255603076!2d121.00207111478856!3d14.554555089831767!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c8f8d08141ad%3A0xe06d9f7d8449519b!2sSim-Soh%20International%20Services%20Incorporated!5e0!3m2!1sen!2sph!4v1618211963284!5m2!1sen!2sph"
                        width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

            </div>
        </div>
        <!-- /Row -->

    </div>
    <!-- /Container -->

</div>

<footer id="footer" class="sm-padding bg-dark">

    <!-- Container -->
    <div class="container">

        <!-- Row -->
        <div class="row">

            <div class="col-md-12">

                <!-- footer logo -->
                <div class="footer-logo">
                    <a href="index.php"><img src="{{ asset('simsoh/logosim.png') }}" alt="logo"></a>
                </div>
                <!-- /footer logo -->

                <!-- footer follow -->
                <ul class="footer-follow">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                </ul>
                <!-- /footer follow -->

                <!-- footer copyright -->
                <div class="footer-copyright">
                    <p>Copyright ©
                        <script>document.write(new Date().getFullYear());</script>
                        <span style="color: red;"> SIM-SOH International Services, Inc.</span> All Rights Reserved.
                    </p>
                </div>
                <!-- /footer copyright -->

            </div>

        </div>
        <!-- /Row -->

    </div>
    <!-- /Container -->

</footer>
<div id="back-to-top"></div>
<!-- <div id="preloader">
    <div class="preloader">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
</div> -->
<script>
    var slideIndex = 0;
    showSlides();

    function showSlides() {
        var i;
        var slides = document.getElementsByClassName("mySlides");
        var dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1
        }
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex - 1].style.display = "block";
        dots[slideIndex - 1].className += " active";
        setTimeout(showSlides, 2000); // Change image every 2 seconds
    }
</script>
<script type="text/javascript" src="{{ asset('simsoh/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('simsoh/owl.carousel.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('simsoh/jquery.magnific-popup.js') }}"></script>
<script type="text/javascript" src="{{ asset('simsoh/main.js') }}"></script>
</body>
</html>
