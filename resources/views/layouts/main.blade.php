<!DOCTYPE html>
<html lang="en">
<head>
    <title>Eslahchi Lab - @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.css" />
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/cards-gallery.css">
    <style>
        .fakeimg {
            height: 200px;
            background: #aaa;
        }
    </style>
</head>
<body>
<div class="container shadow p-4 mb-4 bg-white">
    <div id="demo" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="1"></li>
            <li data-target="#demo" data-slide-to="2"></li>
        </ul>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/images/banners/1.jpg" alt="Eslahchi" width="100%" height="400px">
                <div class="carousel-caption">
                    <h3></h3>
                    <p></p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/images/banners/2.jpg" alt="BIO" width="100%" height="400px">
                <div class="carousel-caption">
                    <h3></h3>
                    <p></p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/images/banners/3.jpg" alt="Softwares" width="100%" height="400px">
                <div class="carousel-caption">
                    <h3></h3>
                    <p></p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
    {{--sticky-top--}}
    <nav class="navbar navbar-expand-sm  bg-dark navbar-dark ">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" aria-controls="collapsibleNavbar" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about-us">About Us</a>
                </li>
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="#">CV</a>--}}
                {{--</li>--}}
                <li class="nav-item">
                    <a class="nav-link" href="/people">People</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/softwares">Softwares</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/events">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact-us">Contact Us</a>
                </li>
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="#">Videos</a>--}}
                {{--</li>--}}
            </ul>
        </div>
    </nav>

    <div class="container" style="margin-top:30px">
        @yield('content')

        <div class="text-center shadow p-3 mb-3 bg-light bg-dark rounded" style="color: lightgray">
            +98 21 22431653<br>
            ch-eslahchi@sbu.ac.ir<br>
            Copyright 2016 Eslahchi Lab | All Rights Reserved
        </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="/js/jquery.backstretch.min.js"></script>
    <script src="/js/app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.10.0/baguetteBox.min.js"></script>
    <script>
        baguetteBox.run('.cards-gallery', { animation: 'slideIn'});
    </script>

    {{--<script>--}}
        {{--function testSession() {--}}
            {{--window.sessionStorage.setItem("algorithms", ["a", "b"])--}}
        {{--}--}}
    {{--</script>--}}

</body>
</html>
