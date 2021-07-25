<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <link rel="icon" href="{{ asset('images/logo.svg') }}" type="image/svg">
    <title>Jakarta Laptop</title>
</head>

<body style="height:100%">
    <nav data-aos="fade-down" data-aos-duration="1250"
        class="navbar navbar-expand-md navbar-light sticky-top justify-content-between" id="navbar">
        <div class="container">
            <a class="navbar-brand font-weight-bold" style="color:#3C4858;">Jakarta <span
                    class="text-info">Laptop</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('user.order.history') }}">Order History</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6" data-aos="fade-right" data-aos-duration="1500" data-aos-delay="1000">
                <h1 class="heading mb-3">Butuh Laptop Cepat?
                    <span class="text-primary">Jakarta Laptop.</span> aja
                </h1>
                <p class="para-desc text-muted">
                    Jakarta Laptop | Jasa sewa laptop di Jakarta dengan harga murah untuk keperluan kantor, sewa laptop
                    event, dll.
                    Tersedia laptop mulai dari intel core i3, core i5 hingga core i7 dengan pilihan masa sewa laptop
                    harian, sewa laptop mingguan atau sewa laptop bulanan.
                    Telah dipercaya berbagai perusahaan di Jakarta dan Indonesia untuk jasa rental laptop dan multimedia
                    lainnya.
                </p>
                @guest
                    <a href="{{ route('login') }}"><button type="button" class="btn btn-primary btn-custom1 mr-1"
                            style="width:150px">Order Now!</button></a>
                @else
                    <a href="{{ route('user.order.view') }}"><button type="button"
                            class="btn btn-primary btn-custom1 mr-1" style="width:150px">Order Now!</button></a>
                @endguest

            </div>
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1500" data-aos-delay="1000">
                <div class="text-md-right text-center"><img src="{{ asset('images/atl-2-c.png') }}" class="img-fluid"
                        style="width:70%"></div>
            </div>
        </div>
    </div>
    <div class="section bg-light">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#FFFFFF" fill-opacity="1"
                d="M0,256L26.7,229.3C53.3,203,107,149,160,122.7C213.3,96,267,96,320,106.7C373.3,117,427,139,480,122.7C533.3,107,587,53,640,53.3C693.3,53,747,107,800,138.7C853.3,171,907,181,960,165.3C1013.3,149,1067,107,1120,96C1173.3,85,1227,107,1280,133.3C1333.3,160,1387,192,1413,208L1440,224L1440,0L1413.3,0C1386.7,0,1333,0,1280,0C1226.7,0,1173,0,1120,0C1066.7,0,1013,0,960,0C906.7,0,853,0,800,0C746.7,0,693,0,640,0C586.7,0,533,0,480,0C426.7,0,373,0,320,0C266.7,0,213,0,160,0C106.7,0,53,0,27,0L0,0Z">
            </path>
        </svg>
        <div class="container">
            <div class="col-lg-12 text-center" data-aos="fade-down" data-aos-duration="1500">
                <h4 class="title mb-3">Our Products</h4>
                <p class="text-muted para-desc mx-auto mb-4">
                    Various kinds of products that we provide in
                    <a class="text-primary font-weight-bold" href="#">Jakarta Laptop</a></span>.
                </p>
            </div>
            <div class="card-deck">
                <div class="card" data-aos="fade-right" data-aos-duration="1500">
                    <img class="card-img-top" src="{{ asset('images/product/macbook3.png') }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Macbook Pro 13 2020</h5>
                        <p class="card-text">Apple's most powerful notebooks featuring fast processors, incredible
                            graphics, Touch Bar, and a spectacular Retina display.</p>
                    </div>
                </div>
                <div class="card" data-aos="fade-down" data-aos-duration="1500">
                    <img class="card-img-top" src="{{ asset('images/product/surface3.png') }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Microsoft Surface Pro 7</h5>
                        <p class="card-text">Ultra-light and versatile. At your desk, on the couch, or in the yard, get
                            more done your way with Surface Pro 7, featuring a laptop-class Intel® Core™ processor,
                            all-day battery,¹ and HD cameras.</p>
                    </div>
                </div>
                <div class="card" data-aos="fade-left" data-aos-duration="1500">
                    <img class="card-img-top" src="{{ asset('images/product/thinkpad3.png') }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Thinkpad X1 Carbon Gen 9</h5>
                        <p class="card-text">With the Intel® Evo™ platform, the ThinkPad X1 Carbon Gen 9 laptop delivers
                            a powerhouse combination of performance, responsiveness, battery life, and stunning visuals.
                            With up to 11th Gen Intel® Core™ i7 vPro® processors.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#F8F9FA" fill-opacity="1"
            d="M0,288L34.3,277.3C68.6,267,137,245,206,208C274.3,171,343,117,411,133.3C480,149,549,235,617,256C685.7,277,754,235,823,197.3C891.4,160,960,128,1029,144C1097.1,160,1166,224,1234,245.3C1302.9,267,1371,245,1406,234.7L1440,224L1440,0L1405.7,0C1371.4,0,1303,0,1234,0C1165.7,0,1097,0,1029,0C960,0,891,0,823,0C754.3,0,686,0,617,0C548.6,0,480,0,411,0C342.9,0,274,0,206,0C137.1,0,69,0,34,0L0,0Z">
        </path>
    </svg>

    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="jumbotron"
                style="background-color:white;max-width:800px;border-radius:25px;border:0.8px solid #F8F9FA"
                data-aos="fade-up" data-aos-duration="1500">
                <h1 style="text-align:center">Got a Question?</h1>
                <form method="POST" action="{{ route('question.store') }}" id="question">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Name</label>
                            <input name="name" type="text" class="form-control" id="inputCity" value="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label>Email</label>
                            <input name="email" type="email" class="form-control" id="inputState" value="">
                        </div>
                        <div class="form-group col-md-6">
                            <label>Phone Number</label>
                            <input name="phone" type="text" class="form-control" id="inputZip" value="">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label>Subject</label>
                            <textarea name="subject" type="text" class="form-control" id="inputSubject"
                                style="height:200px"></textarea>
                        </div>
                    </div>
                    <div class="form-row">
                        <button type="submit" class="btn btn-primary btn-custom1 ">Ask Us</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="section bg-light">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#FFFFFF" fill-opacity="1"
                d="M0,256L26.7,229.3C53.3,203,107,149,160,122.7C213.3,96,267,96,320,106.7C373.3,117,427,139,480,122.7C533.3,107,587,53,640,53.3C693.3,53,747,107,800,138.7C853.3,171,907,181,960,165.3C1013.3,149,1067,107,1120,96C1173.3,85,1227,107,1280,133.3C1333.3,160,1387,192,1413,208L1440,224L1440,0L1413.3,0C1386.7,0,1333,0,1280,0C1226.7,0,1173,0,1120,0C1066.7,0,1013,0,960,0C906.7,0,853,0,800,0C746.7,0,693,0,640,0C586.7,0,533,0,480,0C426.7,0,373,0,320,0C266.7,0,213,0,160,0C106.7,0,53,0,27,0L0,0Z">
            </path>
        </svg>
        <div class="container" style="margin-top: -50px">
            <div class="col-lg-12 text-center">
                <h4 class="title mb-4" data-aos="fade-up" data-aos-duration="1500">Find Us On Google Maps</h4>
                <div class="map-responsive" data-aos="fade-up" data-aos-duration="3000">
                    <iframe width="900px" height="550px" frameborder="0" style="border-radius:20px"
                        src="https://www.google.com/maps/embed/v1/place?q=place_id:ChIJMVL-yvj1aS4R_r10UGTZU5w&key=AIzaSyBNX0f53ALAO7cT8zb3PiBrRtorxRGSsu0"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>

    <div style="background-color: #202942">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#f8f9fa" fill-opacity="1"
                d="M0,288L34.3,277.3C68.6,267,137,245,206,208C274.3,171,343,117,411,133.3C480,149,549,235,617,256C685.7,277,754,235,823,197.3C891.4,160,960,128,1029,144C1097.1,160,1166,224,1234,245.3C1302.9,267,1371,245,1406,234.7L1440,224L1440,0L1405.7,0C1371.4,0,1303,0,1234,0C1165.7,0,1097,0,1029,0C960,0,891,0,823,0C754.3,0,686,0,617,0C548.6,0,480,0,411,0C342.9,0,274,0,206,0C137.1,0,69,0,34,0L0,0Z">
            </path>
        </svg>
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="jumbotron" style="text-align: center;background-color: #202942;">
                    <a data-aos="fade-right" data-aos-duration="1250" href="https://www.instagram.com/dya_az/"
                        style="font-size:30px" class="fa fa-instagram"></a>
                    <a data-aos="fade-down" data-aos-duration="1250" href="https://goo.gl/maps/1Pj9YT9xEJKBL4oaA"
                        style="font-size:30px" class="fa fa-map-marker"></a>
                    <a data-aos="fade-left" data-aos-duration="1250" href="https://wa.me/+62895613367705"
                        style="font-size:30px" class="fa fa-whatsapp"></a>
                    <h6 data-aos="fade-down" data-aos-duration="1250" style="color:rgb(223, 223, 223);">Muhammad Arya
                        Dyas</h6>
                    <h6 data-aos="fade-down" data-aos-duration="1250" style="color:rgb(223, 223, 223);">&#169;
                        {{ date('Y') }}</h6>
                    <h4 data-aos="fade-down" data-aos-duration="1250" style="color:rgb(158, 158, 158)">SMKN 1 Cibinong
                    </h4>
                    <a data-aos="fade-down" data-aos-duration="1250" href="#" onclick="window.scrollTo(0, 0);"
                        class="fa fa-angle-up" style="margin-bottom: -10%;color:rgb(223, 223, 223);"></a>
                    <a href="#" onclick="window.scrollTo(0, 0);" style="text-decoration:none;">
                        <h4 data-aos="fade-down" data-aos-duration="1250" style="color:rgb(158, 158, 158)">Back To Top
                        </h4>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        window.addEventListener('scroll', (e) => {
            const nav = document.querySelector('.navbar');
            if (window.pageYOffset > 0) {
                nav.classList.add("add-shadow");
            } else {
                nav.classList.remove("add-shadow");
            }
        });
        AOS.init();
    </script>
    @include('sweetalert::alert')
</body>

</html>
