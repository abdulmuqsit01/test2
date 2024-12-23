<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>POS PINTAR DIGIDES</title>
    <link rel="icon" type="image/png"
        href="https://cdn.digitaldesa.com/statics/landing/homepage/media/misc/favicon/favicon.ico">

    {{-- select2 --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css"
        integrity="sha512-yI2XOLiLTQtFA9IYePU0Q1Wt0Mjm/UkmlKMy4TU4oNXEws0LybqbifbO8t9rEIU65qdmtomQEQ+b3XfLfCzNaw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

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
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

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
        <!-- Single description section start -->
        <section id="single-description-screen">
            <div class="first-desc-img-sec">
                <div class="hero-img-desc">
                    <img src="{{ uploads('storage/program/' . $program->image) }}" alt="social-media-img"
                        class="img-fluid w-100">
                    <div class="single-courses-top">
                        {{-- <div class="course-back-icon">
                            @if (session()->has('message-success'))
                            <a href="javascript:history.go(-2)">
                            @else
                            <a href="javascript:history.go(-1)">
                            @endif
                            <?xml version="1.0" encoding="utf-8"?>
                            <!-- Generator: Adobe Illustrator 25.2.1, SVG Export Plug-In . SVG Version: 6.00 Build 0)  -->
                            <svg fill="#f97316" width="36" height="36" version="1.1" id="lni_lni-arrow-left-circle"
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 64 64"
                                style="enable-background:new 0 0 64 64;" xml:space="preserve">
                                <g>
                                    <path d="M43.3,29.8H26l6-6.1c0.9-0.9,0.9-2.3,0-3.2c-0.9-0.9-2.3-0.9-3.2,0l-9.7,9.9c-0.9,0.9-0.9,2.3,0,3.2l9.7,9.9
                                    c0.4,0.4,1,0.7,1.6,0.7c0.6,0,1.1-0.2,1.6-0.6c0.9-0.9,0.9-2.3,0-3.2l-6-6.1h17.3c1.2,0,2.2-1,2.2-2.2
                                    C45.6,30.8,44.6,29.8,43.3,29.8z" />
                                    <path d="M32,1.8C15.3,1.8,1.7,15.3,1.7,32S15.3,62.2,32,62.2S62.3,48.7,62.3,32S48.7,1.8,32,1.8z M32,57.8
                                    C17.8,57.8,6.2,46.2,6.2,32C6.2,17.8,17.8,6.2,32,6.2S57.8,17.8,57.8,32C57.8,46.2,46.2,57.8,32,57.8z" />
                                </g>
                            </svg>
                            </a>
                        </div> --}}
                    </div>
                </div>
                <div class="container">
                    <div class="single-courses-description">
                        <div class="first-decs-sec mt-16">
                            <div class="first-decs-sec-wrap">
                                <div class="first-left-sec">{{ data_get($program, 'programCategories.name', '-') }}
                                </div>
                                <div class="first-right-sec">
                                    <div>
                                        {{-- <span class="firs-txt1 mr-8"></span> --}}
                                        @if ($program->harga == 0)
                                            <span class="firs-txt2">Gratis</span>
                                        @else
                                            <span class="firs-txt2">Rp
                                                {{ number_format($program->harga, 0, ',', '.') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="second-decs-sec mt-16">
                            <div class="second-decs-sec-wrap">
                                <div class="second-decs-sec-top">
                                    <h1 class="second-txt1">{{ $program->name }}
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <div class="fifth-decs-sec mt-32">
                            <div class="fifth-decs-sec-wrap">
                                <div class="tab-content" id="description-tabContent">
                                    <div class="tab-pane fade show active" id="description-content" role="tabpanel"
                                        tabindex="0">
                                        <div class="description-content-wrap mt-24">
                                            <div class="description-first-content">
                                                <h3 class="des-con-txt1" style="font-size: 25px;font-weight:600;">
                                                    Details</h3>
                                                {{-- <div class="quill-editor-default"> --}}
                                                {{-- <span class="program-description">{!!$program->description!!}</span> --}}
                                                {{-- </div> --}}
                                                <div
                                                    class="ck-restricted-editing_mode_s ck ck-content ck-editor_editable ck-rounded-corners ck-editor_editable_inline ck-blurred">
                                                    {!! $program->description !!}
                                                </div>
                                                <h3 class="des-con-txt1"
                                                    style="margin-top:20px;font-size: 25px;font-weight:600">Tags
                                                </h3>
                                                <p style="color:#F97316;font-size:17px">{{ $program->tag }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="buy-now-description">
                    @error('program_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <button onclick="ifVideoWatched();locationCheck()"
                        @if ($user == null) disabled @else @if ($isEnrolledTo)
                            onclick="window.location.href='{{ $program->url }}'" @else data-bs-toggle="modal" data-bs-target="#modal-enrolled" @endif
                        @endif type="button" class="btn black-button"
                        style="background-color: #3EAC54">
                        {{ $user == null ? 'Login terlebih dahulu' : ($isEnrolledTo ? 'Buka pelatihan' : 'Daftar/Bergabung') }}
                    </button>

                </div>
            </div>
        </section>
    </div>

    <div class="modal" id="modal-enrolled" tabindex="-1">
        <div class="modal-dialog modal-lg" id="enrolled-confirmation">
            <div class="modal-content">
                <div class="modal-body">
                    <form action="{{ route('mutate_mobile_enroll') }}" method="POST" enctype="multipart/form-data"
                        id="myform">
                        @csrf
                        <p style="font-size: 24px">Silakan pilih lokasi Kantor Pos</p>
                        <input type="hidden" name="program_id" value="{{ $program->id }}">
                        <div class="form-details-sign-in">
                            <img src="{{ statics('desktop/office.svg') }}" alt="right-arrow" height="24"
                                width="24" />
                            <select onchange="locationCheck()" class="sign-in-custom-input" id="id_lokasi"
                                aria-label="Floating label disabled select example" name="id_lokasi" required
                                value="{{ old('id_category') }}">
                                <option selected value="">Silahkan pilih lokasi kantor pos...</option>
                                @foreach ($cabangList as $item)
                                    <option value="{{ $item->pos_location }}">{{ $item->kcu_or_kcp }}</option>
                                @endforeach
                            </select>
                        </div>

                        <p class="mt-2" id="unwatchedVideoCautionLabel" style="color: red;font-size: 11px">Tonton
                            video edukasi berikut sebelum melakukan registrasi</p>

                        {{-- Video edukasi --}}
                        <div class="d-flex justify-content-center mt-2">
                            <video id="videoEdukasi" width="90%" controls>
                                <source src="{{ statics('videos/jaga-kerahasiaan-informasi-pribadi.mp4') }}"
                                    type="video/mp4">
                            </video>
                        </div>
                        {{-- end Video edukasi --}}

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button disabled id="button_bergabung" type="submit"
                                class="btn btn-success">Bergabung?</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ statics('assets/js/bookmark-handle2.js') }}"></script>
    <script src="{{ statics('assets/js/jquery.min.js') }}"></script>
    <script src="{{ statics('assets/js/slick.min.js') }}"></script>
    <script src="{{ statics('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ statics('assets/js/custom.js') }}"></script>
    <script src="{{ statics('js/terms_and_condition_register.js?v=1') }}"></script>

    {{-- select2 --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/js/select2.min.js"
        integrity="sha512-9p/L4acAjbjIaaGXmZf0Q2bV42HetlCLbv8EP0z3rLbQED2TAFUlDvAezy7kumYqg5T8jHtDdlm1fgIsr5QzKg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {
            $('#modal-enrolled').on('shown.bs.modal', function() {
                $('#id_lokasi').select2({
                    // theme: 'bootstrap-5',
                    theme: 'classic',
                    allowClear: true,
                    delay: 200,
                    dropdownParent: $('#modal-enrolled'),
                    placeholder: "Silakan pilih lokasi kantor pos...",
                });
            });
        });
    </script>
</body>

</html>
