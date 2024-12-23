<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>POS PINTAR DIGIDES</title>
    <link rel="icon" type="image/png"
        href="https://cdn.digitaldesa.com/statics/landing/homepage/media/misc/favicon/favicon.ico">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <link rel="icon" href="{{ statics('assets/images/favicon/icon.png') }}">
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
    <link rel="stylesheet" href="{{ statics('assets/css/card.css?v=0.0.1') }} }}" />
    @include('mobile.partials.analytics')

</head>

<body>
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

        <!-- Single mentor screen content start -->
        <section id="single-mentor-sec ">
            <div class="container ">
                <h1 class="d-none">Hideen</h1>
                <h2 class="d-none">Mentor</h2>
                <div class="single-mentor-sec-wrap mt-50">
                    @foreach ($kategori as $item)
                        @if ($loop->first)
                            <div class="single-mentor-first-wrap">
                                <div class="mentor-img-sec">
                                    <img style="width: 150px; height: 150px; object-fit: contain;"
                                        src="{{ uploads('storage/kategori_image/' . $item->thumbnail) }}"
                                        alt="client-img">
                                </div>
                                <div class="single-mentor-details"
                                    style="align-items: center; justify-content: center; display: flex">
                                    <h3>{{ $item->name }}</h3>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <div class="single-mentor-third-sec">
                        <div class="fifth-decs-sec mt-32">
                            <div class="fifth-decs-sec-wrap">
                                <section id="bookmark-sec">
                                    <div class="container">
                                        <div class="bookmark-sec-wrap">
                                            <div class="checkout-screen-full">
                                                {{-- batas card --}}
                                                @if ($programList != null)
                                                    @foreach ($programList as $item)
                                                        <a
                                                            href="{{ route('view_desktop_detail_course', ['slug' => $item->slug]) }}">
                                                            <div
                                                                class="result-found-bottom-wrap mt-1 single-course cards">
                                                                <div class="result-img-sec"
                                                                    style="height: 128px; width: 128px; overflow:hidden; border-radius: 5px;border: 1px #F6F5F2 solid;">
                                                                    <img src="{{ uploads('storage/program/' . $item->image) }}"
                                                                        alt="course-img"
                                                                        onerror="this.onerror=null; this.src='{{ statics('assets/images/category/alt-category.jpg') }}'"
                                                                        class="list1"
                                                                        style="
                                                                        width: 100%;
                                                                        height:100%;
                                                                        object-fit:contain;
                                                                        box-sizing: border-box;
                                                                        border-radius:0px;
                                                                        " />
                                                                </div>
                                                                <div class="result-content-sec">
                                                                    {{-- <h1 class="d-none">Search</h1> --}}
                                                                    <div class="result-content-sec-wrap mt-1">
                                                                        <div class="content-first">
                                                                            <div class="result-bottom-txt">
                                                                                <p>{{ isset($item->program_kategori) ? $item->program_kategori : '-' }}
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="content-second mt-1">
                                                                            <span class="program-name">
                                                                                <p>{{ $item->name }}</p>
                                                                            </span>
                                                                        </div>
                                                                        <div class="content-fourth mt-1">
                                                                            <div class="result-rating-sec">
                                                                                {{-- <div class="result-rating-sec-img">
                                                                                <img src="{{statics('assets/images/result-found/orange-star.svg') }}"
                                                                                    alt="star-img" />
                                                                            </div> --}}
                                                                                <div class="result-rating-txt">
                                                                                    <span
                                                                                        class="program-tag">{{ $item->tag }}</span>
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
                                                                <p class="see-all-txt"
                                                                    style="    display: flex;
                                                                    justify-content: center; /* mengatur horisontal ke tengah */
                                                                    align-items: center; ">
                                                                    <span style="font-size: 20px;"><i
                                                                            class="bi bi-chevron-right"></i></span>
                                                                </p>
                                                            </div>
                                                        </a>
                                                    @endforeach
                                                @else
                                                    <span class="program-name-null">
                                                        <p>Kategori Ini Belum Memiliki Program</p>
                                                    </span>
                                                @endisset
                                                {{-- batas card --}}
                                        </div>
                                    </div>
                                </div>
                            </section>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Single mentor screen content end -->
</div>
<script src="{{ statics('assets/js/jquery.min.js?v=0.0.1') }}"></script>
<script src="{{ statics('assets/js/slick.min.js?v=0.0.1') }}"></script>
<script src="{{ statics('assets/js/bootstrap.bundle.min.js?v=0.0.1') }}"></script>
<script src="{{ statics('assets/js/custom.js?v=0.0.1') }}"></script>
<script src="{{ statics('js/intersector.js?v=0.0.1') }}"></script>
<?php
@$nilai_asal = $programList[0]->program_kategori;
echo "<script>
                localStorage.setItem('asal', '" .
    $nilai_asal .
    "');
                </script>";

?>
</body>

@include('layouts.footer_dekstop')

</html>
