@extends('layouts.main')
@section('title', 'Program')
@section('title_content', 'Ubah Data Program by ENROLLMENT')

@section('content')
    {{-- modal register --}}
    <div class="modal" id="modal-register" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Masukkan Data Anda</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="sign-up-screen-content">
                        <div class="container">
                            <div class="sign-in-login mt-24">
                                <h1 class="login-txt">REGISTRASI, {{ $enroll[0]->program->name }}</h1>
                            </div>
                            <div class="sign-up-login-form mt-24">
                                <!-- <form id="registerForm" method="POST" action="{{ route('mutate_register') }}"> -->
                                <form action="{{ route('mutate_admin_enrollment_edit', ['id' => $enroll[0]->id]) }}"
                                    method="POST">
                                    @csrf
                                    <div class="form-details-sign-in">
                                        <img src="{{ statics('desktop/name.svg') }}" alt="right-arrow" height="24"
                                            width="24" />
                                        <input type="text" id="nama" name="nama" placeholder="Nama Anda"
                                            class="sign-in-custom-input" required />
                                    </div>
                                    {{-- provinsi --}}
                                    <div class="form-details-sign-in mt-12">
                                        <select required onchange="getKabupaten()" style="background-color: #F3F3F3"
                                            class="form-select" id="dropdown-provinsi" required name="provinsi">
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
                                    <div class="form-details-sign-in mt-12">
                                        <img src="{{ statics('desktop/phone.svg') }}" alt="right-arrow" height="24"
                                            width="24" />
                                        <input required type="text" id="nomorhp" name="no_hp"
                                            placeholder="Nomor Handphone" class="sign-in-custom-input" />
                                    </div>

                                    {{-- email --}}
                                    <div class="form-details-sign-in mt-12">
                                        <img src="{{ statics('desktop/email.svg') }}" alt="right-arrow" height="24"
                                            width="24" />
                                        <input required type="email" id="email" name="email"
                                            placeholder="Alamat E-mail" class="sign-in-custom-input" />
                                    </div>
                                    {{-- VALUE STATIC --}}
                                    <input type="hidden" value="{{ $program[0]->id }}" name="program_id">
                                    <input type="hidden" id="address_id" value="" name="address_id">
                                    <div class="form-check mt-12">
                                        <input onchange="termsCheck()" class="form-check-input" type="checkbox"
                                            name="terms" value="valid" id="flexCheckIndeterminate">
                                        <label class="form-check-label" for="flexCheckIndeterminate">
                                            Bersedia menerima informasi terbaru mengenai Program Edukasi Keuangan Bersama di
                                            Kantor Pos
                                        </label>
                                    </div>
                                    <div class="d-grid">
                                        <button id="registerButton" disabled style="background-color: #3EAC54"
                                            class="btn mt-12 btn-primary d-flex justify-content-center" type="submit">
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
    <div class="first-decs-sec mt-16">
        <div class="first-decs-sec-wrap">
            <div class="first-left-sec">{{ data_get($program, 'programCategories.name', '-') }}</div>
            <div class="first-right-sec">
                <div class="buy-now-description">
                    <a data-bs-toggle="modal" data-bs-target="#modal-register"
                        href="checkout-screen.html">Daftar/Bergabung</a>
                </div>
            </div>
        </div>
    </div>


    <h1>{{ route('mutate_admin_enrollment_edit', ['id' => $enroll[0]->id]) }}</h1>
    {{-- script --}}
    <script>
        var btn = document.getElementById("registerButton")

        // console.log({{ $program[0]->url }})
        btn.addEventListener("click", function() {
            $.post("{{ route('mutate_admin_enrollment_edit', ['id' => $enroll[0]->id]) }}",
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
                            window.open('{{ $program[0]->url }}', '_blank');
                        })
                    }
                });
        })
    </script>

    <script>
        function termsCheck() {

            var checkbox = document.getElementById('flexCheckIndeterminate')

            if (checkbox.checked == true) {
                document.getElementById('registerButton').disabled = false;
            } else {
                document.getElementById('registerButton').disabled = true;
            }
        }
    </script>


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
@endsection
