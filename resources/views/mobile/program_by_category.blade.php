<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>POS PINTAR DIGIDES</title>
    <link rel="icon" type="image/png"
        href="https://cdn.digitaldesa.com/statics/landing/homepage/media/misc/favicon/favicon.ico">
    <link
        href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ statics('assets/css/all.min.css?v=0.0.1') }}">
    <link rel="stylesheet" href="{{ statics('assets/css/slick.css?v=0.0.1') }}">
    <link rel="stylesheet" href="{{ statics('assets/css/bootstrap.min.css?v=0.0.1') }}">
    <link rel="stylesheet" href="{{ statics('assets/css/style.css?v=0.0.5') }}">
    <link rel="stylesheet" href="{{ statics('assets/css/media-query.css?v=0.0.1') }}">
    @include('mobile.partials.analytics')

</head>

<body class="mobile">
    <div class="site-content">
        <!-- Preloader start -->
        <div class="loader-mask">
            <div class="loader">
            </div>
        </div>
        <!-- Preloader end -->
        <!-- Header start -->
        <header id="top-navbar" class="top-navbar">
            <div class="container">
                <div class="top-navbar_full" style="display:flex; justify-content:space-between">
                    <div class="back-btn">
                        <a href="javascript:history.go(-1)">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <mask id="mask0_330_7385" style="mask-type:alpha" maskUnits="userSpaceOnUse" x="0" y="0"
                                    width="24" height="24">
                                    <rect width="24" height="24" fill="white"></rect>
                                </mask>
                                <g mask="url(#mask0_330_7385)">
                                    <path d="M15 18L9 12L15 6" stroke="black" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </g>
                            </svg>
                        </a>
                    </div>
                    <div class="top-navbar-title">
                        <p>Program {{ $category }}</p>
                    </div>
                    <div class="skip-btn-goal">
                        {{-- <a href="filter-screen.html">
							<img src="{{statics('assets/images/mentor/filter-icon.svg" alt="filter-icon">
						</a> --}}
                    </div>
                </div>
            </div>
            <div class="navbar-boder"></div>
        </header>
        <!-- Header end -->
        <!-- Trending courses start -->
        <section id="trending-course">
            <div class="container">
                <h1 class="d-none">Hideen</h1>
                <h2 class="d-none">Trending</h2>
                <div class="trending-course-wrap mt-32">
                    {{-- card untuk program --}}
                    @foreach ($programList as $item)
                        <div class="trending-course-details single-course">
                            <div class="trending-course-img">
                                {{-- link untuk ke halaman detail --}}
                                <a href="/mobile/program/{{ $item->slug }}">
                                    <img src="{{ uploads('storage/program/' . $item->image) }}" alt="course-img"
                                        class="w-100" style="height:280px;">
                                </a>

                                <div class="trending-name">
                                    <p>{{ $item->programCategories->name }}</p>
                                </div>
                            </div>
                            <div class="trending-course-bottom mt-12">
                                <div>
                                    <p class="trending-txt1">{{ $item->name }}</p>
                                </div>
                                <div class="trending-course-price">
                                    <div>
                                        <span class="trending-txt2"></span>
                                        <span class="trending-txt3"></span>
                                    </div>
                                    <div>
                                        <span class="trending-txt4"><img src=""></span>
                                        <span class="trending-txt5"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    {{-- card untuk program --}}

                </div>
            </div>
        </section>
        <!-- Trending courses end -->
    </div>
    <script src="{{ statics('assets/js/bookmark-handle2.js') }}"></script>

    <script src="{{ statics('assets/js/jquery.min.js?v=0.0.1') }}"></script>
    <script src="{{ statics('assets/js/slick.min.js?v=0.0.1') }}"></script>
    <script src="{{ statics('assets/js/bootstrap.bundle.min.js?v=0.0.1') }}"></script>
    <script src="{{ statics('assets/js/custom.js?v=0.0.1') }}"></script>
</body>

</html>
