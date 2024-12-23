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
    <link rel="stylesheet" href="{{ statics('assets/css/desktop_slick.css?v=0.0.2') }}">
    <link rel="stylesheet" href="{{ statics('assets/css/bootstrap.min.css?v=0.0.1') }}">
    <link rel="stylesheet" href="{{ statics('assets/css/desktop_style.css?v=0.0.6') }}">
    <link rel="stylesheet" href="{{ statics('assets/css/media-query.css?v=0.0.1') }}">
    @include('mobile.partials.analytics')

</head>

<body class="desktop">
    <div class="site-content">
        <!-- Preloader start -->
        <div class="loader-mask">
            <div class="loader">
            </div>
        </div>
        <!-- Preloader end -->

        <!-- Navbar DIGIDES -->

        @include('layouts.navbar_desktop')

        <!-- Navbar DIGIDES End-->


        <!-- Homescreen content start -->
        <section id="homescreen">

            {{-- BANNER EVENT PENTING --}}
            <div class="home-offer-sec mt-50">
                <div class="container">
                    <div id="carouselExampleIndicators" class="carousel slide carousel slide-shop-now2"
                        data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            @foreach ($programListMain as $index => $item)
                                <button type="button" data-bs-target="#carouselExampleIndicators"
                                    data-bs-slide-to="{{ $index }}"
                                    class="show-now2-custom-btn {{ $loop->first ? 'active' : '' }}" aria-current="true"
                                    aria-label="Slide {{ $index }}"></button>
                            @endforeach
                        </div>
                        <div class="carousel-inner" style="height:300px">
                            @foreach ($programListMain as $item)
                                <div class="carousel-item {{ $loop->first ? 'active' : '' }}" style="height:300px">
                                    <div class="shop-now2-sec"
                                        style="background-image: url('{{ uploads('storage/banner/' . $item->name) }}');background-position-y:0px;background-size: 100% 300px;height:300px">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button style="justify-content: flex-start" class="carousel-control-prev" type="button"
                            data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button style="justify-content: flex-end" class="carousel-control-next" type="button"
                            data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>

            {{-- SLIDER KATEGORI --}}
            <div class="home-category mt-5">
                <div class="home-category-wrap container">
                    <div class="homescreen-second-wrapper-top">
                        <div class="categories-first">
                            <h2 class="home1-txt3">📙 Kategori</h2>
                        </div>
                    </div>
                </div>
                <div class="categories-slider mt-24">
                    @foreach ($getData['categoryList'] as $item)
                        <a href="{{ route('view_desktop_category', ['category' => $item->slug]) }}"
                            style="margin: 0px 10px">
                            <div class="categories-content">
                                <div>
                                    <img src="{{ uploads('storage/kategori_image/' . $item->thumbnail) }}"
                                        alt="category-img" class="card_category"
                                        onerror="this.onerror=null; this.src='{{ statics('assets/images/category/alt-category.jpg') }}'">
                                </div>
                                <div class="categories-title">
                                    <h3 class="category-txt1">{{ $item->name }}</h3>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            {{-- BANNER PILOT PROJECT --}}
            <div class="home-offer-sec mt-5">
                <div class="container">
                    <div id="carouselExampleIndicators2" class="carousel slide carousel slide-shop-now2"
                        data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            @foreach ($programListPilot as $item)
                                <button type="button" data-bs-target="#carouselExampleIndicators2"
                                    data-bs-slide-to="{{ $loop->index }}"
                                    class="show-now2-custom-btn {{ $loop->first ? 'active' : '' }}" aria-current="true"
                                    aria-label="Slide {{ $loop->index }}"></button>
                            @endforeach

                        </div>
                        <div class="carousel-inner">
                            @foreach ($programListPilot as $item)
                                <a href="{{ route('view_desktop_detail_course', ['slug' => $item->slug]) }}">
                                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                        <img style="height: 296.04px" class="d-block w-100"
                                            src="{{ uploads('storage/banner/' . $item->name) }}" alt="">
                                    </div>
                                </a>
                            @endforeach
                        </div>
                        <button style="justify-content: flex-start" class="carousel-control-prev" type="button"
                            data-bs-target="#carouselExampleIndicators2" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button style="justify-content: flex-end" class="carousel-control-next" type="button"
                            data-bs-target="#carouselExampleIndicators2" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>

            {{-- SLIDE MITRA --}}
            <div class="home-mentor mt-5">
                <div class="home-category-wrap container">
                    <div class="homescreen-second-wrapper-top">
                        <div class="categories-first">
                            <h2 class="home1-txt3">👨‍🏫 Mitra</h2>
                        </div>

                    </div>
                </div>
                <div class="home-mentor-bottom mt-24">
                    @foreach ($getData['instansiList'] as $item)
                        <div class="home-mentor-sec2" style="width:120px;">
                            <div>
                                <a href="{{ route('view_desktop_instansi', ['instansi' => $item->slug]) }}">
                                    <img src="{{ uploads('storage/instance_logo/' . $item->logo) }}" alt="mentor-img"
                                        style="height: 120px;width:120px;  object-fit:contain;" />
                                </a>
                            </div>
                            <div class="home-mentor-name2">
                                <p>{{ $item->name }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </section>
        <!-- Homescreen content end -->


    </div>
    <script src="{{ statics('assets/js/jquery.min.js') }}"></script>
    <script src="{{ statics('assets/js/slick.min.js') }}"></script>
    <script src="{{ statics('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ statics('assets/js/modal.js') }}"></script>
    <script src="{{ statics('assets/js/custom.js') }}"></script>
</body>

@include('layouts.footer_dekstop')

</html>
