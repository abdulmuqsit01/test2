<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>POS PINTAR DIGIDES</title>
    <link rel="icon" type="image/png"
        href="https://cdn.digitaldesa.com/statics/landing/homepage/media/misc/favicon/favicon.ico">
    <link
        href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="{{ statics('assets/css/all.min.css?v=0.0.1') }}" />
    <link rel="stylesheet" href="{{ statics('assets/css/slick.css?v=0.0.1') }}" />
    <link rel="stylesheet" href="{{ statics('assets/css/bootstrap.min.css?v=0.0.1') }}" />
    <link rel="stylesheet" href="{{ statics('assets/css/style.css?v=0.0.5') }}" />
    <link rel="stylesheet" href="{{ statics('assets/css/media-query.css?v=0.0.1') }}" />
    @include('mobile.partials.analytics')
</head>

<body class="mobile">
    <div class="site-content">
        <!-- Preloader start -->
        <div class="loader-mask">
            <div class="loader"></div>
        </div>
        <!-- Preloader end -->
        <!-- Header start -->
        <header id="top-header">
            <div class="container">
                <div class="top-header-full">
                    <div class="back-btn">
                        <a href="javascript:history.go(-1)">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <mask id="mask0_330_7385" style="mask-type: alpha" maskUnits="userSpaceOnUse" x="0"
                                    y="0" width="24" height="24">
                                    <rect width="24" height="24" fill="black" />
                                </mask>
                                <g mask="url(#mask0_330_7385)">
                                    <path d="M15 18L9 12L15 6" stroke="black" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </g>
                            </svg>
                        </a>
                    </div>
                    <div class="header-title">
                        <p>Categories</p>
                    </div>
                </div>
            </div>
            <div class="navbar-boder"></div>
        </header>
        <!-- Header end -->
        <!-- Category screen start -->
        <section id="categories-section">
            <div class="container">
                <h1 class="d-none">Category</h1>
                <h2 class="d-none">Category</h2>
                <div class="categories-wrap mt-32">
                    {{-- card category --}}
                    @foreach ($categoryList as $item)
                        <a href="/mobile/program/category/{{ $item->name }}">
                            <div class="categories-content business-course">
                                <div>
                                    <img src="{{ uploads('storage/kategori_image/' . $item->image) }}"
                                        onerror="this.onerror=null; this.src='{{ statics('assets/images/category/alt-category.jpg') }}'"
                                        class="w-100" />
                                </div>
                                <div class="categories-title">
                                    <h3 class="category-txt1">{{ $item->name }}</h3>
                                    {{-- <p class="category-txt2">120 Courses</p> --}}
                                </div>
                            </div>
                        </a>
                    @endforeach
                    {{-- card category --}}
                </div>
            </div>
        </section>
        <!-- Category screen end -->
    </div>
    <script src="{{ statics('assets/js/jquery.min.js?v=0.0.1') }}"></script>
    <script src="{{ statics('assets/js/slick.min.js?v=0.0.1') }}"></script>
    <script src="{{ statics('assets/js/bootstrap.bundle.min.js?v=0.0.1') }}"></script>
    <script src="{{ statics('assets/js/custom.js?v=0.0.1') }}"></script>
</body>

</html>
