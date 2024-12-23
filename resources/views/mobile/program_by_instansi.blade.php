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
    <link rel="stylesheet" href="{{ statics('assets/css/card.css?v=0.0.1') }} }}" />
    <link rel="stylesheet" href="{{ statics('assets/css/instansiList.css?v=0.0.2') }} }}" />
    @include('mobile.partials.analytics')
</head>

<body class="mobile">
    <div class="site-content">
        <!-- Preloader start -->
        <div class="loader-mask">
            <div class="loader">
            </div>
        </div>
        @foreach ($logo as $item)
            <div class="banner-instansi">
                <img src="{{ uploads('storage/instance_logo/' . $item->logo) }}" alt="logo">
            </div>
        @endforeach
        {{-- ENROLLED PROGRAM --}}
        <div class="container riwayat-pelatihan">
            <div class="top-navbar-title">
                <p>Program Tersedia</p>
            </div>
            @if ($program != null)
                @foreach ($program as $item)
                    <a href="{{ route('view_mobile_program_detail', ['slug' => $item->slug]) }}">
                        <div class=" cards bookmark-sec-wrap">
                            <div class="checkout-screen-full">
                                <div class="result-found-bottom-wrap mt-1 single-course">
                                    <div class="result-img-sec"
                                        style="height: 128px; width: 128px; overflow:hidden; border-radius: 5px;border: 1px #F6F5F2 solid;">
                                        <img src="{{ uploads('storage/program/' . $item->image) }}" class="list1"
                                            style="
									width: 100%;
									height:100%;
									object-fit:contain;
									box-sizing: border-box;
									border-radius:0px;
									" />
                                    </div>
                                    <div class="result-content-sec">
                                        <div class="result-content-sec-wrap mt-1">
                                            <div class="content-first">
                                                <div class="result-bottom-txt">
                                                    <p>{{ $item->program_categories_name }}
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
                                                    <div class="result-rating-txt">
                                                        <span class="program-tag">{{ $item->tag }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mt-2">
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
                        </div>
                    </a>
                @endforeach
            @else
                <span class="program-name-null">
                    <p>Instansi Ini Belum Memiliki Program</p>
                </span>
            @endisset
    </div>
    {{-- END ENDROLLED PROGRAM --}}
</div>
<script src="{{ statics('assets/js/jquery.min.js?v=0.0.1') }}"></script>
<script src="{{ statics('assets/js/slick.min.js?v=0.0.1') }}"></script>
<script src="{{ statics('assets/js/bootstrap.bundle.min.js?v=0.0.1') }}"></script>
<script src="{{ statics('assets/js/custom.js?v=0.0.1') }}"></script>
<script src="{{ statics('js/intersector.js?v=0.0.1') }}"></script>
</body>

</html>
