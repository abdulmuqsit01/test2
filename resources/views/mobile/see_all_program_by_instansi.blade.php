<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>POS PINTAR DIGIDES</title>
    <link rel="icon" type="image/png"
        href="https://cdn.digitaldesa.com/statics/landing/homepage/media/misc/favicon/favicon.ico">
    <link
        href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
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
    <link rel="stylesheet" href="{{ statics('assets/css/instansiList.css?v=0.0.2') }} }}" />
</head>

<body style="background-color: #F6F5F2" class="mobile">
    <div class="site-content">
        <!-- Preloader start -->
        <div class="loader-mask">
            <div class="loader">
            </div>
        </div>
        <!-- Preloader end -->
        <!-- Header start -->
        <header id="top-navbar" class="top-navbar">
            <div class="top-navbar_full">
                <div class="top-navbar-title">
                    <p>Mitra Kegiatan</p>
                </div>
            </div>
        </header>

        <div class="container riwayat-instansi" style="background-color: #F6F5F2">
            <div class="top-navbar-title">
                <p>Semua Mitra Kegiatan</p>
            </div>
            @foreach ($programList as $item)
                <a href="{{ route('view_program_by_instansi', ['name' => $item->slug]) }}">
                    <div class="instansi-list">
                        <div class="home-mentor-sec" style="width:56px;">
                            <img src="{{ uploads('storage/instance_logo/' . $item->logo) }}" alt="mentor-img"
                                style="height: 56px;width:56px;  object-fit:contain;" />
                        </div>
                        <div class="program-instansi-name" style="color: black">
                            <p>{{ $item->name }}</p>
                        </div>
                        <div style="padding: 12px; color: black"><i class="bi bi-chevron-right"></i></div>
                    </div>
                </a>
            @endforeach
        </div>

    </div>



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
