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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
                                    {{-- <path d="M15 18L9 12L15 6" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> --}}
                                </g>
                            </svg>
                        </a>
                    </div>
                    <div class="top-navbar-title">
                        {{-- <p>Choose Interests</p> --}}
                    </div>
                    <div class="skip-btn-goal">
                        <a href="select-courses-screen.html">
                            {{-- Skip --}}
                        </a>
                    </div>
                </div>
            </div>
            <div class="navbar-boder"></div>
        </header>
        <!-- Header end -->
        <!-- Interest screen start -->
        <section id="interest-screen" style="margin-top:-30px">
            <div class="container">
                <div class="furniture-fill-sec mt-32">
                    <h1 class="d-none">Interest Details</h1>
                    <span style="font-size:24px">Pilih Ketertarikan</span>
                    <div class="goal-title">
                        <p style="display:flex;justify-content:flex-start">Pilih 3 atau lebih topik yang kamu senangi
                        </p>
                    </div>
                    <form class="select-interest mt-32" id="interestForm" action="{{ route('mutate_mobile_interest') }}"
                        method="POST">
                        @foreach ($list as $item)
                            <div class="interest-sec">
                                <input type="checkbox" id="{{ $item->name }}" value="{{ $item->id }}">
                                <label class="custom-interest-lbl" for="{{ $item->name }}">{{ $item->name }}</label>
                            </div>
                        @endforeach
                        @csrf
                        <div class="buy-now-description">
                            <button type="submit" id="submitButton" class="btn black-button"
                                style="opacity: {{ $login == true ? '1' : '0.7' }}"
                                {{ $login == false ? 'disabled' : '' }}>
                                {{-- <div style="opacity: {{ $login == true ? '1' : '0.7'}} "> --}}
                                {{ $login == true ? 'Lanjutkan' : 'Login terlebih dahulu' }}</a>
                                {{-- </div> --}}
                            </button>
                        </div>
                    </form>


                </div>
            </div>
        </section>
        <!-- Interest screen end -->
    </div>
    <script src="{{ statics('assets/js/jquery.min.js?v=0.0.1') }}"></script>
    <script src="{{ statics('assets/js/slick.min.js?v=0.0.1') }}"></script>
    <script src="{{ statics('assets/js/bootstrap.bundle.min.js?v=0.0.1') }}"></script>
    <script src="{{ statics('assets/js/custom.js?v=0.0.1') }}"></script>
    <script>
        var form = document.getElementById('interestForm');
        var submitButton = document.getElementById('submitButton');
        submitButton.addEventListener('click', function() {
            var checkboxes = form.querySelectorAll('input[type="checkbox"]');
            var checkedCount = 0;

            checkboxes.forEach(function(cb) {
                if (cb.checked) {
                    cb.setAttribute('name', checkedCount);
                    checkedCount++;
                }
            });

            if (checkedCount >= 3) {
                form.submit();
            } else {
                Swal.fire("Minimal 3 pilihan &#128519;");
                event.preventDefault();
            }
        });
    </script>

</body>

</html>
