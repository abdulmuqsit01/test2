<!DOCTYPE html>
<html lang="en">
{{-- catatan --}} {{-- shop-now2-sec nama clas untuk setiap background di
banner di batasi cuman bisa 3 carousel-inner containe --}}

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    {{-- font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">

    {{-- font inter --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ statics('assets/css/all.min.css?v=0.0.1') }} }}" />
    <link rel="stylesheet" href="{{ statics('assets/css/slick.css?v=0.0.1') }} }}" />
    <link rel="stylesheet" href="{{ statics('assets/css/bootstrap.min.css?v=0.0.1') }} }}" />
    <link rel="stylesheet" href="{{ statics('assets/css/style.css?v=0.0.5') }} }}" />
    <link rel="stylesheet" href="{{ statics('assets/css/media-query.css?v=0.0.1') }} }}" />
    <link rel="stylesheet" href="{{ statics('assets/css/card.css?v=0.0.1') }} }}" />
    <style>
        .showss {
            display: flex;
        }

        .hidess {
            display: none;

        }
    </style>
    @include('mobile.partials.analytics')
</head>

<body class="mobile">

    {{-- {{ $programList['name'] }} --}}

    <div class="site-content">
        <!-- Preloader start -->
        <div class="loader-mask">
            <div class="loader"></div>
        </div>
        <!-- Preloader end -->
        <!-- Header start -->
        <header id="top-navbar" class="top-navbar">
            <div class="navbar-boder"></div>
        </header>
        <!-- Header end -->
        <!-- Homescreen content start -->

        {{-- BANNER --}}
        <div id="carouselExampleIndicators" class="carousel slide">
            <div class="carousel-indicators">
                @foreach ($programListFeatured as $index => $item)
                    <button type="button" class="{{ $loop->first ? 'active' : '' }}"
                        data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $index }}"
                        aria-label="Slide {{ $index }}" style="width: 10px"></button>
                @endforeach
            </div>
            <div class="carousel-inner">
                @if ($programListFeatured == null)
                    <div class="carousel-item active slider">
                        <img src="https://cdn.digitaldesa.com/statics/landing/homepage/media/extra-banner/pos-pintar.webp?v=1"
                            class="d-block w-100 slider-image" alt="...">
                    </div>
                @else
                    @foreach ($programListFeatured as $item)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }} slider">
                            <img src="{{ uploads('storage/program/' . $item->image) }}"
                                class="d-block w-100 slider-image" alt="...">
                        </div>
                    @endforeach
                @endif
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        {{-- <img src="https://cdn.digitaldesa.com/statics/landing/homepage/media/extra-banner/pos-pintar.webp?v=1" style="width:100%;padding:0%;margin: 0%" > --}}
        {{-- END BANNER --}}
        {{-- <section class="mb-5">
      <div div class="home-first-sec">
          <div class="container">
            <div class="home-first-sec-wrap d-flex flex-column justify-content-center">
              <h1>POS Pintar</h1>
              <h1><a href="instagram://user?username=canal_bettafish">Buka ig</a></h1>
              <p class="mt-8" id="output">Temukan program yang ingin Anda daftarkan</p>
            </div>
          </div>
        </div>
      </div> --}}
        {{-- container category --}}
        {{-- <div class="home-category mt-32">
      <div class="home-category-wrap container">
        <div class="homescreen-second-wrapper-top">
          <div class="categories-first">
            <h2 class="home1-txt3">📙 Categories</h2>
          </div>
          <div class="view-all-second">
            <a href="{{ route('view_category_list') }}">
              <p class="see-all-txt">
                See all<span><img src="{{statics('assets/svg/right-arrow.svg') }}" alt="right-arrow" /></span></p>
            </a>
          </div>
        </div>
      </div> --}}
        {{-- <div class="categories-slider mt-16">
      //@foreach ($getData['categoryList'] as $item)
      <div class="categories-content single-course">
        <div>
          <img src="{{ uploads('storage/kategori_image/'.$item->image) }}" alt="category-img" onerror="this.onerror=null; this.src='{{ statics('assets/images/category/alt-category.jpg') }}'" style="width: 140px;height:100px" />
        </div>
        <div class="categories-title">
          <h3 class="category-txt1">{{ $item->name }}</h3>
          <p class="category-txt2">120 Courses</p>
        </div>
      </div>
      //@endforeach
    </div>
    </div>  --}}
        {{-- container banner --}}
        {{-- <div class="home-offer-sec"> --}}
        {{-- <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide carousel slide-shop-now2" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active show-now2-custom-btn" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" class="show-now2-custom-btn" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" class="show-now2-custom-btn" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            @foreach ($getData['programListFeture'] as $item)
            @if ($loop->iteration == 1)
            <div class="carousel-item active">
              @else
              <div class="carousel-item">
                @endif
                <div class="shop-now2-sec" style="height: 174px;background-image:url('{{ uploads('storage/program/'.$item->image) }}'); background-size:100%;">
                  <img src="{{ uploads('storage/program/'.$item->image) }}" alt="" style="position: absolute;">
                  <div class="offer-details">
                    <div class="offer-details-wrap">
                      <div class="offer-price">
                        @if ($item->harga == 0)
                        <p class="firs-txt2">Gratis</p>
                        @else
                        <p class="firs-txt2">Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
                        @endif
                        <h2 class="mt-12">{{ $item->name }}</h2>
                      </div>
                      <div class="home1-shop-now-btn">
                        <p>{{ $item->programCategories->name }}</p>
                      </div>
                    </div>
                    <div class="discount-txt mt-16">
                      <p>
                        {{ $item->tag }}
                      </p>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div> --}}
        {{-- <div class="home-trending-course"> --}}
        {{-- <div class="homescreen-second-wrapper-top container">
          <div class="categories-first">
            <h2 class="home1-txt3">🔥 Trending Courses</h2>
          </div>
          <div class="view-all-second">
            <a href="{{ route('view_program_populer') }}">
              <p class="see-all-txt">
                See all<span><img src="{{ statics('assets/svg/right-arrow.svg')}}" alt="right-arrow" /></span></p>
            </a>
          </div>
        </div> --}}
        {{-- <div class="trending-course-bottom-wrap">
          //@foreach ($getData['programListFetures'] as $item)
          <a href="{{ route('view_mobile_program_detail', ["slug"=> $item->slug]) }}" style="margin:auto">
            <div class="trending-course-details single-course" style="margin-right: 20px;">
              <div class="trending-course-details">
                <div class="trending-course-img">
                  <img src="{{ uploads('storage/program/'.$item->image) }}" alt="course-img" style="width:343px;height:180px" />
          </a>
                  <div class="trending-bookmark">
                            <a
                              href="javascript:void(0);"
                              class="item-bookmark active"
                              tabindex="0"
                            >
                              <img
                                src="{{ statics('assets/svg/black-bookmark.svg"') }}
                  alt="bookmark-icon"
                  />
          </a>
          </div>
          <div class="trending-name">
            <p>{{ $item->programCategories->name }}</p>
          </div>
        </div> --}}
        {{-- <div class="trending-course-bottom mt-12">
        <div>
          <p class="trending-txt1">
            {{ $item->name }}
          </p>
        </div>
        <div class="trending-course-price">
          <div>
            <span class="trending-txt2" style="margin:0;">
              //@if ($item->harga == 0)
              <p class="firs-txt2" style="font-size: 20px; text-align: left;">Gratis</p>
              //@else
              <p class="firs-txt2" style="font-size: 20px; text-align: left;">Rp {{ number_format($item->harga, 0, ',', '.') }}</p>
              //@endif
            </span>
            <span style="color: black;">
              <p style="width: 200px;height:50px;overflow:hidden;">{{ $item->tag }}</p>
            </span>
          </div> --}}
        {{-- <div>
                              <span class="trending-txt4"
                                ><img
                                  src="{{ statics('assets/images/single-courses/orange-fill-star.svg') }}"
          alt="star-img"
          /></span>
          <span class="trending-txt5">5.0</span>
        </div> --}}
        {{-- </div>
    </div>
    </div>
    </div>
    </a>
    //@endforeach --}}
        {{-- <div class="trending-course-details single-course">
                  <div class="trending-course-details">
                    <div class="trending-course-img">
                      <img
                        src="{{ statics('assets/images/trending-course/course2.png"') }}
    alt="course-img"
    class="w-100"
    />
    <div class="trending-bookmark">
      <a href="javascript:void(0);" class="item-bookmark active" tabindex="0">
        <img src="{{ statics('assets/svg/black-bookmark.svg"') }}
                            alt=" bookmark-icon" />
      </a>
    </div>
    <div class="trending-name">
      <p>Development</p>
    </div>
    </div>
    <div class="trending-course-bottom mt-12">
    <div>
      <p class="trending-txt1">
        Learning Python For Data Analy...
      </p>
    </div>
    <div class="trending-course-price">
      <div>
        <span class="trending-txt2">$150.00</span>
        <span class="trending-txt3">$210.00</span>
      </div>
      <div>
        <span class="trending-txt4"><img src="{{ statics('assets/images/single-courses/orange-fill-star.svg"') }}
                            alt=" star-img" /></span>
        <span class="trending-txt5">5.0</span>
      </div>
      </div>
      </div>
      </div>

      </div> --}}
    </div>
    </div>
    {{-- mentor --}}
    <div class="home-mentor" style="margin-top: 15px">
        <div class="home-category-wrap container">
            <div class="homescreen-second-wrapper-top">
                <div class="categories-first">
                    <h2 class="home1-txt3" style="display:flex;gap:10px"><img
                            src="{{ statics('images/logo-mitra3.png') }}" alt="" style="height: 25px;"><span
                            style="line-height:30px;">Mitra Kegiatan</span></h2>
                </div>
                <div class="view-all-second">
                    <a href="{{ route('view_instansi') }}">
                        <p class="see-all-txt">See all<span><i class="bi bi-chevron-right"></i></span></p>
                    </a>
                </div>
            </div>
        </div>
        <div class="home-mentor-bottom mt-16">
            @foreach ($getData['instansiList'] as $item)
                {{-- <div class="home-mentor-sec-wrap redirect-mentor" style="width:56px; border: solid 1px red;"> --}}
                <div class="home-mentor-sec" style="width:56px;">
                    <div>
                        <a href="{{ route('view_program_by_instansi', ['name' => $item->slug]) }}">
                            <img src="{{ uploads('storage/instance_logo/' . $item->logo) }}" alt="mentor-img"
                                style="height: 56px;width:56px;  object-fit:contain;" class="mobile_img_mitra" />
                        </a>
                    </div>
                    <div class="home-mentor-name">
                        <p>{{ $item->name }}</p>
                    </div>
                </div>
                {{-- </div> --}}
            @endforeach
        </div>
    </div>
    <div class="home-course mt-32">
        {{-- end mentor --}}
        <div class="home-course-wrapper-top">
            <div class="container">
                <div class="categories-first">
                    <h2 class="home1-txt3" style="font-size: 25px;">Program Tersedia</h2>
                    {{-- <button id="toggle">TOGGLE</button> --}}
                </div>
            </div>
        </div>
        <div class="home-course-wrapper-bottom mt-16">
            <div class="home-course-wrapper-bottom-full">

                @include('mobile.data.tabList')

                <br>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane show active" id="pills-all" role="tabpanel" tabindex="0">
                        <div class="container">
                            {{-- <div id="data-wrapper" style="display: flex; flex-wrap: wrap;"> --}}
                            <div id="data-wrapper">
                                @include('mobile.data.Programlist')
                            </div>
                            {{-- </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="loadere text-center" style="display: none;">
            <div class="d-flex justify-content-center">
                <div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
        </section>
        <!-- Homescreen content end -->
        <!-- Tabbar start -->
        <div id="bottom-navigation">
            <div class="container">
                <div class="home-navigation-menu">
                    <div class="bottom-panel nagivation-menu-wrap">
                        <ul class="bootom-tabbar">
                            <li class="active">
                                <a href="{{ route('view_mobile_home') }}" class="active">
                                    <svg class="active" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <mask id="mask0_202_7251" style="mask-type: alpha" maskUnits="userSpaceOnUse"
                                            x="0" y="0" width="24" height="24">
                                            <rect width="24" height="24" fill="white" />
                                        </mask>
                                        <g mask="url(#mask0_202_7251)">
                                            <path
                                                d="M8.12602 14C8.57006 15.7252 10.1362 17 12 17C13.8638 17 15.4299 15.7252 15.874 14M11.0177 2.764L4.23539 8.03912C3.78202 8.39175 3.55534 8.56806 3.39203 8.78886C3.24737 8.98444 3.1396 9.20478 3.07403 9.43905C3 9.70352 3 9.9907 3 10.5651V17.8C3 18.9201 3 19.4801 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.07989 21 6.2 21H17.8C18.9201 21 19.4802 21 19.908 20.782C20.2843 20.5903 20.5903 20.2843 20.782 19.908C21 19.4801 21 18.9201 21 17.8V10.5651C21 9.9907 21 9.70352 20.926 9.43905C20.8604 9.20478 20.7526 8.98444 20.608 8.78886C20.4447 8.56806 20.218 8.39175 19.7646 8.03913L12.9823 2.764C12.631 2.49075 12.4553 2.35412 12.2613 2.3016C12.0902 2.25526 11.9098 2.25526 11.7387 2.3016C11.5447 2.35412 11.369 2.49075 11.0177 2.764Z"
                                                stroke="black" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </g>
                                    </svg>
                                </a>
                                <div class="orange-boder active"></div>
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
        <!--SideBar setting menu start-->
        <div class="dark-overlay"></div>
        <!--SideBar setting menu end-->
        <!-- pwa install app popup Start -->
        {{--
        <div class="offcanvas offcanvas-bottom addtohome-popup theme-offcanvas" tabindex="-1" id="offcanvas"
            aria-modal="true" role="dialog">
            <button type="button" class="btn-close text-reset popup-close-home" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
            <div class="offcanvas-body small">
                <img src="{{statics('assets/images/logo/logo.png') }}" alt="logo" class="logo-popup" />
  <p class="title font-w600">Guruji</p>
  <p class="install-txt">
    Install Guruji - Online Learning & Educational Courses PWA to your
    home screen for easy access, just like any other app
  </p>
  <a href="javascript:void(0)" class="theme-btn install-app btn-inline addhome-btn" id="installApp">Add to
    Home
    Screen</a>
  </div>
  </div>
  --}}
        <!-- pwa install app popup End -->
    </div>
    {{-- <script src="{{statics('assets/js/bookmark-handle.js') }}"></script> --}}
    <script src="{{ statics('assets/js/jquery.min.js') }}"></script>
    <script src="{{ statics('assets/js/slick.min.js') }}"></script>
    <script src="{{ statics('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ statics('assets/js/modal.js') }}"></script>
    <script src="{{ statics('assets/js/custom.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>

    <script src="{{ statics('js/intersector.js?v=0.0.1') }}"></script>
    <script src="{{ statics('js/filterProgram.js?v=0.0.1') }}"></script>
</body>

</html>
