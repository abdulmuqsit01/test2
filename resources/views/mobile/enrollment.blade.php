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
    <link rel="stylesheet" href="{{ statics('assets/css/all.min.css?v=0.0.1') }} }}">
    <link rel="stylesheet" href="{{ statics('assets/css/slick.css?v=0.0.1') }} }}">
    <link rel="stylesheet" href="{{ statics('assets/css/bootstrap.min.css?v=0.0.1') }} }}">
    <link rel="stylesheet" href="{{ statics('assets/css/style.css?v=0.0.5') }} }}">
    <link rel="stylesheet" href="{{ statics('assets/css/media-query.css?v=0.0.1') }} }}">
    <style>
        .changed-color {
            background-color: red;
        }
    </style>
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
                <div class="top-navbar_full">

                    <div class="top-navbar-title">
                        <p>Program yang Didaftarkan</p>
                    </div>

                </div>
            </div>
            <div class="navbar-boder"></div>
        </header>
        <!-- Header end -->
        <!-- Bookmark section start -->
        <section id="bookmark-sec">
            <div class="container">
                <div class="bookmark-sec-wrap">
                    <div class="checkout-screen-full">
                        @foreach ($program_enroll as $item)
                            <div class="result-found-bottom-wrap mt-1 single-course">
                                <a href="{{ route('view_mobile_program_detail', ['slug' => $item->program->slug]) }}">
                                    <div class="result-img-sec" style="height: 128px; width: 128px; overflow:hidden">
                                        <img src="{{ uploads('storage/program/' . $item->program->image) }}"
                                            alt="course-img" class="list1"
                                            style="
										width: 100%;
										height:100%;
										object-fit:contain;
										box-sizing: border-box;
										border-radius:0px;
										" />
                                    </div>
                                </a>
                                <div class="result-content-sec">
                                    <h1 class="d-none">Search</h1>
                                    <div class="result-content-sec-wrap mt-1">
                                        <div class="content-first">
                                            <div class="result-bottom-txt">
                                                <p>{{ data_get($item->program, 'programCategories.name', '-') }}</p>
                                            </div>
                                        </div>
                                        <div class="content-second mt-1">
                                            <h2>{{ $item->program->name }}</h2>
                                        </div>
                                        <div class="content-fourth mt-1">
                                            <div class="result-rating-sec">
                                                {{-- <div class="result-rating-sec-img">
												<img src="{{statics('assets/images/result-found/orange-star.svg') }}"
													alt="star-img" />
											</div> --}}
                                                <div class="result-rating-txt">
                                                    {{ $item->program->tag }}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-2">
                                            {{-- <span class="firs-txt1 mr-8"></span> --}}
                                            @if ($item->harga == 0)
                                                <span class="firs-txt2">Gratis</span>
                                            @else
                                                <span class="firs-txt2">Rp
                                                    {{ number_format($item->harga, 0, ',', '.') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </section>
        <!-- Bookmark section end -->
        <!-- Tabbar start -->
        <div id="bottom-navigation">
            <div class="container">
                <div class="home-navigation-menu">
                    <div class="bottom-panel nagivation-menu-wrap">
                        <ul class="bootom-tabbar">
                            <li>
                                <a href="/mobile/">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <mask id="mask0_202_7251" style="mask-type: alpha" maskUnits="userSpaceOnUse"
                                            x="0" y="0" width="24" height="24">
                                            <rect width="24" height="24" fill="black" />
                                        </mask>
                                        <g mask="url(#mask0_202_7251)">
                                            <path
                                                d="M8.12602 14C8.57006 15.7252 10.1362 17 12 17C13.8638 17 15.4299 15.7252 15.874 14M11.0177 2.764L4.23539 8.03912C3.78202 8.39175 3.55534 8.56806 3.39203 8.78886C3.24737 8.98444 3.1396 9.20478 3.07403 9.43905C3 9.70352 3 9.9907 3 10.5651V17.8C3 18.9201 3 19.4801 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4801 21 18.9201 21 17.8V10.5651C21 9.9907 21 9.70352 20.926 9.43905C20.8604 9.20478 20.7526 8.98444 20.608 8.78886C20.4447 8.56806 20.218 8.39175 19.7646 8.03913L12.9823 2.764C12.631 2.49075 12.4553 2.35412 12.2613 2.3016C12.0902 2.25526 11.9098 2.25526 11.7387 2.3016C11.5447 2.35412 11.369 2.49075 11.0177 2.764Z"
                                                stroke="black" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </g>
                                    </svg>
                                </a>
                                <div class="orange-boder"></div>
                            </li>
                            <li>
                                <a href="{{ route('view_mobile_profile') }}">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <mask id="mask0_202_1984" style="mask-type: alpha" maskUnits="userSpaceOnUse"
                                            x="0" y="0" width="24" height="24">
                                            <rect width="24" height="24" fill="white" />
                                        </mask>
                                        <g mask="url(#mask0_202_1984)">
                                            <path
                                                d="M20 21C20 19.6044 20 18.9067 19.8278 18.3389C19.44 17.0605 18.4395 16.06 17.1611 15.6722C16.5933 15.5 15.8956 15.5 14.5 15.5H9.5C8.10444 15.5 7.40665 15.5 6.83886 15.6722C5.56045 16.06 4.56004 17.0605 4.17224 18.3389C4 18.9067 4 19.6044 4 21M16.5 7.5C16.5 9.98528 14.4853 12 12 12C9.51472 12 7.5 9.98528 7.5 7.5C7.5 5.01472 9.51472 3 12 3C14.4853 3 16.5 5.01472 16.5 7.5Z"
                                                stroke="black" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </g>
                                    </svg>
                                </a>
                                <div class="orange-boder"></div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tabbar end -->
        <div class="dark-overlay"></div>
        <!--SideBar setting menu end-->
    </div>
    <script src="{{ statics('assets/js/bookmark-handle2.js') }}"></script>

    <script src="{{ statics('assets/js/jquery.min.js') }}"></script>
    <script src="{{ statics('assets/js/slick.min.js') }}"></script>
    <script src="{{ statics('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ statics('assets/js/custom.js') }}"></script>
</body>

</html>
