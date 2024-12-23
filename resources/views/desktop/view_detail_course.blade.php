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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css?v=0.0.1" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ statics('assets/css/all.min.css?v=0.0.1') }}">
    <link rel="stylesheet" href="{{ statics('assets/css/desktop_slick.css?v=0.0.2') }}">
    <link rel="stylesheet" href="{{ statics('assets/css/bootstrap.min.css?v=0.0.1') }}">
    <link rel="stylesheet" href="{{ statics('assets/css/desktop_style.css?v=0.0.6') }}">
    <link rel="stylesheet" href="{{ statics('assets/css/media-query.css?v=0.0.1') }}">
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    {{-- TEMPLETE NOTIF POP UP --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">

    {{-- END TEMPLETE NOTIF POP UP --}}

    {{-- data table --}}
    {{-- <link rel="stylesheet" href="//cdn.datatables.net/2.0.5/css/dataTables.dataTables.min.css"> --}}

    {{-- select2 --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css"
        integrity="sha512-yI2XOLiLTQtFA9IYePU0Q1Wt0Mjm/UkmlKMy4TU4oNXEws0LybqbifbO8t9rEIU65qdmtomQEQ+b3XfLfCzNaw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
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

        <!-- Single description section start -->
        <section id="single-description-screen" class="mt-50">
            @if ($errors->has('custom_error'))
                <div class="alert alert-danger">
                    {{ $errors->first('custom_error') }}
                </div>
            @endif
            <div class="first-desc-img-sec">
                <div class="hero-img-desc" style="display:flex;flex-direction:column">

                    {{-- check if thumbnail exist --}}
                    @if (file_exists(storage_path('app/public/program/' . $program->thumbnail)))
                        <img src="{{ uploads('storage/program/' . $program->thumbnail) }}" alt="category-img"
                            style="height:max-content;width:90%;margin:auto; object-fit:contain;background: rgb(1,132,118);
					background: linear-gradient(141deg, rgba(1,132,118,1) 30%, rgba(255,255,255,1) 100%);"
                            onerror="this.onerror=null; this.src='{{ statics('assets/images/category/alt-category.jpg') }}'">
                    @else
                        <img src="" alt="category-img"
                            style="height:max-content;width:90%;margin:auto; object-fit:contain;"
                            onerror="this.onerror=null; this.src='{{ statics('assets/images/category/alt-category.jpg') }}'">
                    @endif

                    <nav aria-label="breadcrumb" class="nav-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="hover_breadcrumb"
                                    href="{{ route('view_desktop_home') }}">Beranda</a></li>
                            <li class="breadcrumb-item active hover_breadcrumb" aria-current="page"
                                onclick="history.back()" id="BACK"></li>
                        </ol>
                    </nav>
                </div>

                <div class="container">
                    <div class="single-courses-description">
                        <div class="first-decs-sec mt-16">
                            <div class="first-decs-sec-wrap">
                                <div class="first-left-sec">{{ data_get($program, 'programCategories.name', '-') }}
                                </div>
                                <div class="first-right-sec">
                                    <div class="buy-now-description">
                                        <a onclick="ifVideoWatched()" data-bs-toggle="modal"
                                            data-bs-target="#modal-register"
                                            href="checkout-screen.html">Daftar/Bergabung</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="second-decs-sec mt-16">
                            <div class="second-decs-sec-wrap">
                                <div class="second-decs-sec-top">
                                    <h1 class="second-txt1">{{ $program->name }}</h1>
                                </div>
                            </div>
                        </div>

                        {{-- mentor --}}
                        {{-- <div class="fourth-decs-sec mt-32">
							<div class="fourth-decs-sec-wrap">
								<div class="fourth-decs-sec-top mt-16">
									<div class="fourth-decs-img-wrap">
										<div class="fourth-decs-img">
											<img src="{{ uploads('storage/program/'.$program->image) }}"alt="client-img" style="height: 96px; width: 96px">
										</div>
										<div class="fourth-client-wrap">
											<h3 class="fourth-txt1">{{$program}}</h3>
											<h4 class="fourth-txt2 mt-12"></h4>

										</div>
									</div>

								</div>
							</div>
						</div> --}}
                        <div class="fifth-decs-sec mt-16">
                            <div class="fifth-decs-sec-wrap">
                                <div class="tab-content" id="description-tabContent">
                                    <div class="tab-pane fade show active" id="description-content" role="tabpanel"
                                        tabindex="0">
                                        <div class="description-content-wrap mt-24">
                                            <div class="description-first-content">
                                                <h3 class="des-con-txt1">Details</h3>
                                                {{-- <span class="program-description">{!!$program->description!!}</span> --}}
                                                <div
                                                    class="ck-restricted-editing_mode_s ck ck-content ck-editor_editable ck-rounded-corners ck-editor_editable_inline ck-blurred program-description">
                                                    {!! $program->description !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
        </section>
        <!-- Single description section end -->

    </div>

    {{-- modal register --}}
    <div class="modal" id="modal-register" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Masukkan Data Anda</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="sign-up-screen-content">
                        <div class="container">
                            <div class="sign-in-login mt-24">
                                <h1 class="login-txt">REGISTRASI</h1>
                            </div>
                            <div class="sign-up-login-form mt-24">
                                <!-- <form id="registerForm" method="POST" action="{{ route('mutate_register') }}"> -->
                                <form id="registerForm" method="POST">
                                    @csrf
                                    <div class="form-details-sign-in">
                                        <img src="{{ statics('desktop/name.svg') }}" alt="right-arrow"
                                            height="24" width="24" />
                                        <input type="text" id="nama" name="nama" placeholder="Nama Anda"
                                            class="sign-in-custom-input" required />
                                    </div>
                                    {{-- provinsi --}}
                                    <div class="form-details-sign-in mt-12">
                                        <img src="{{ statics('desktop/target.svg') }}" alt="right-arrow"
                                            height="24" width="24" />
                                        <select required onchange="getKabupaten()" style="background-color: #F3F3F3"
                                            class="form-select" id="dropdown-provinsi"
                                            aria-label="Floating label select example" required name="provinsi">
                                        </select>

                                    </div>

                                    <div id="container-kabupaten-kecamatan" style="display: none">
                                        {{-- kabupaten --}}
                                        <div id="kabupaten-container" class="form-details-sign-in mt-12">
                                            <img src="{{ statics('desktop/direction-alt.svg') }}" alt="right-arrow"
                                                height="24" width="24" />
                                            <input required readonly type="kabupaten" id="kabupaten" name="kabupaten"
                                                placeholder="kabupaten" class="sign-in-custom-input" />
                                        </div>

                                        {{-- kecamatan --}}
                                        <div id="kecamatan-container" class="form-details-sign-in mt-12">
                                            <img src="{{ statics('desktop/direction.svg') }}" alt="right-arrow"
                                                height="24" width="24" />
                                            <input required readonly type="kecamatan" id="kecamatan" name="kecamatan"
                                                placeholder="kecamatan" class="sign-in-custom-input" />
                                        </div>
                                    </div>

                                    {{-- nomer hp --}}
                                    <div class="input-group mt-12">
                                        <span style="background-color: #F3F3F3" class="input-group-text"
                                            id="basic-addon1"><img src="{{ statics('desktop/phone.svg') }}"
                                                alt="right-arrow" height="24" width="24" />+62</span>
                                        <input style="background-color: #F3F3F3" name="no_hp" maxlength="12"
                                            type="tel" id="nomorhp" class="form-control"
                                            placeholder="Nomor Handphone(+62)" aria-label="Username"
                                            aria-describedby="basic-addon1">
                                    </div>

                                    {{-- email --}}
                                    <div class="form-details-sign-in mt-12">
                                        <img src="{{ statics('desktop/email.svg') }}" alt="right-arrow"
                                            height="24" width="24" />
                                        <input required type="email" id="email" name="email"
                                            placeholder="Alamat E-mail" class="sign-in-custom-input" />
                                    </div>
                                    <br>
                                    {{-- Lokasi Kantor Pos --}}
                                    <div class="form-details-sign-in">
                                        <img src="{{ statics('desktop/office.svg') }}" alt="right-arrow"
                                            height="24" width="24" />
                                        <select class="sign-in-custom-input" id="id_lokasi"
                                            aria-label="Floating label disabled select example" name="id_lokasi"
                                            required value="{{ old('id_category') }}">
                                            <option selected value="">Silahkan pilih lokasi kantor pos...
                                            </option>
                                            @foreach ($cabangList as $item)
                                                <option value="{{ $item->pos_location }}">{{ $item->kcu_or_kcp }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    {{-- VALUE STATIC --}}
                                    <input type="hidden" value="{{ $program->id }}" name="program_id">
                                    <input type="hidden" id="address_id" value="" name="address_id">
                                    <div class="form-check mt-12">
                                        <input onchange="termsCheck()" class="form-check-input" type="checkbox"
                                            name="terms" value="valid" id="flexCheckIndeterminate">
                                        <label class="form-check-label" for="flexCheckIndeterminate"
                                            style="margin-bottom: 0.5em; font-size: 0.98em;">
                                            Bersedia menerima informasi terbaru mengenai Program Edukasi Keuangan
                                            Bersama di Kantor Pos
                                        </label>
                                        <p style="text-align: center; font-size: 1.2em; color: red;"
                                            id="unwatchedVideoCautionLabel">:: Tonton video edukasi berikut sebelum
                                            melakukan registrasi ::</p>
                                    </div>

                                    {{-- Video edukasi --}}
                                    <div class="d-flex justify-content-center">
                                        <video id="videoEdukasi" width="90%" controls>
                                            <source
                                                src="{{ statics('videos/jaga-kerahasiaan-informasi-pribadi.mp4') }}"
                                                type="video/mp4">
                                        </video>
                                    </div>
                                    {{-- end Video edukasi --}}

                                    <div class="d-grid">
                                        <button id="registerButton" disabled style="background-color: #3EAC54"
                                            class="btn mt-12 btn-primary d-flex justify-content-center"
                                            type="button">
                                            Registrasi
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="remember-section">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <script src="//cdn.datatables.net/2.0.5/js/dataTables.min.js"></script> --}}
    <script src="{{ statics('assets/js/jquery.min.js') }}"></script>
    <script src="{{ statics('assets/js/slick.min.js') }}"></script>
    <script src="{{ statics('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ statics('assets/js/custom.js') }}"></script>
    <script src="{{ statics('js/terms_and_condition_register.js?v=1') }}"></script>
    <script>
        document.getElementById('BACK').innerHTML = localStorage.getItem('asal');
    </script>

    {{-- TEMPLETE NOTIF POP UP --}}

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>

    {{-- END TEMPLETE NOTIF POP UP --}}

    <script>
        var btn = document.getElementById("registerButton")

        btn.addEventListener("click", function() {
            $.post("{{ route('mutate_register') }}",
                $('#registerForm').serialize(),
                function(response) {
                    if (response?.success) {
                        $('#modal-register').modal('hide');
                        swal({
                            title: "Terima Kasih, Pendaftaran Anda Berhasil",
                            // text: "Silakan cek email anda untuk petunjuk lebih lanjut atau klik tombol di bawah untuk menuju ke link instansi",
                            type: "success",
                            confirmButtonText: "Menuju Link Instansi",
                            showCancelButton: false
                        }).then((result) => {
                            window.open('{{ $program->url }}', '_blank');
                        })
                    }
                }).fail(function() {
                $('#modal-register').modal('hide');
                swal({
                    title: "Gagal Melakukan register, pastikan anda mengisi data dengan benar",
                    // text: "Silakan cek email anda untuk petunjuk lebih lanjut atau klik tombol di bawah untuk menuju ke link instansi",
                    type: "error",
                    showCancelButton: false
                })
            });
        })
    </script>

</body>
@include('layouts.footer_dekstop')

</html>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

{{-- <script src="//cdn.datatables.net/2.0.5/js/dataTables.min.js"></script> --}}

{{-- select2 --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/js/select2.min.js"
    integrity="sha512-9p/L4acAjbjIaaGXmZf0Q2bV42HetlCLbv8EP0z3rLbQED2TAFUlDvAezy7kumYqg5T8jHtDdlm1fgIsr5QzKg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
    $(document).ready(function() {
        $('#modal-register').on('shown.bs.modal', function() {
            $('#id_lokasi').select2({
                theme: 'bootstrap-5',
                delay: 200,
                dropdownParent: $('#modal-register'),
                placeholder: "Silakan pilih lokasi kantor pos...",
            });

            $('#dropdown-provinsi').select2({
                theme: 'bootstrap-5',
                delay: 200,
                dropdownParent: $('#modal-register'),
                placeholder: "Nama kecamatan domisili",
                ajax: {
                    url: function(params) {
                        return 'https://api.digitaldesa.id/home/list-wilayah-query?q=' +
                            params.term;
                    },
                    dataType: 'json',
                    processResults: function(data) {
                        return {
                            results: $.map(data.data, function(item) {
                                return {
                                    id: item.id,
                                    text: [`KECAMATAN ${item.kecamatan}`, " ", item
                                        .kabkota, " ",
                                        `PROVINSI ${item.provinsi}`
                                    ],
                                };
                            })
                        };
                    },
                }
            });
        });
    });
</script>

<script>
    // menerima value dari hasil search secara keseluruhan, lalu displit untuk diisi ke input form masing-masing
    function getKabupaten() {
        var provinsiValue = $("#dropdown-provinsi option:selected").text();
        var id = $("#dropdown-provinsi").val();
        var splitText = provinsiValue.split(', ,')

        var kecamatan = splitText[0]
        var kabupaten = splitText[1]
        var provinsi = splitText[2]

        document.getElementById('container-kabupaten-kecamatan').style.display = "block"
        document.getElementById('kecamatan').value = kecamatan
        document.getElementById('kabupaten').value = kabupaten

        document.getElementById('address_id').value = id
        let optionHTML = `
		<option selected value="${provinsi}">
			${provinsi}
		</option>`;
        $('#dropdown-provinsi').append(optionHTML);
    }
</script>

<style>
    .ajax-wrap {
        display: none;
    }

    .ajax-bg {
        background: #333;
        opacity: 0.5;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 9999;
    }

    .ajax-content {
        background: #dadada;
        font-size: 18px;
        position: absolute;
        top: 50%;
        left: 50%;
        margin-right: -50%;
        transform: translate(-50%, -50%);
        width: auto;
        z-index: 9999;
        border-radius: 10px;
        padding: 10px 20px;
    }

    .ajax-content .ajax-title {
        color: #394B92;
        font-size: 22px;
        border-bottom: 1px solid #ccc;
        margin-bottom: 5px;
        font-weight: bold;
    }

    .ajax-content p {
        font-size: 14px;
        margin-bottom: 0;
    }
</style>

<div class="form-result ajax-wrap" id="ajax-loading">
    <div class="ajax-bg"></div>
    <div class="ajax-content text-center">
        <img src="{{ statics('images/loader.gif') }}" />
        <p id="ajax-loading-text">MENGIRIM DATA, SILAKAN TUNGGU...</p>
    </div>
</div>

<script>
    $(document).ajaxStart(function() {
        $('#ajax-loading').fadeIn(0);
        $('.field-error').remove();
    });

    $(document).ajaxStop(function() {
        $('#ajax-loading').fadeOut('fast');
    });
</script>
