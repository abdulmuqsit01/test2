<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link rel="icon" type="image/png"
        href="https://cdn.digitaldesa.com/statics/landing/homepage/media/misc/favicon/favicon.ico">

    {{-- sidebar --}}
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ statics('css/main.css?v=0.0.1') }}">

    <!-- Favicons -->
    <link href="{{ statics('assets/deskripsi-asset/img/favicon.png') }}" rel="icon">
    <link href="{{ statics('assets/deskripsi-asset/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ statics('assets/deskripsi-asset/vendor/bootstrap/css/bootstrap.min.css?v=0.0.1') }}"
        rel="stylesheet">
    <link href="{{ statics('assets/deskripsi-asset/vendor/bootstrap-icons/bootstrap-icons.css?v=0.0.1') }}"
        rel="stylesheet">
    <link href="{{ statics('assets/deskripsi-asset/vendor/boxicons/css/boxicons.min.css?v=0.0.1') }}" rel="stylesheet">
    <link href="{{ statics('assets/deskripsi-asset/vendor/quill/quill.snow.css?v=0.0.1') }}" rel="stylesheet">
    <link href="{{ statics('assets/deskripsi-asset/vendor/quill/quill.bubble.css?v=0.0.1') }}" rel="stylesheet">
    <link href="{{ statics('assets/deskripsi-asset/vendor/remixicon/remixicon.css?v=0.0.1') }}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ statics('assets/deskripsi-asset/css/Editorstyle.css?v=0.0.5') }}" rel="stylesheet">

    {{-- data table --}}
    <link rel="stylesheet" href="//cdn.datatables.net/2.0.5/css/dataTables.dataTables.min.css">

    {{-- select2 --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0-beta.1/css/select2.min.css"
        integrity="sha512-yI2XOLiLTQtFA9IYePU0Q1Wt0Mjm/UkmlKMy4TU4oNXEws0LybqbifbO8t9rEIU65qdmtomQEQ+b3XfLfCzNaw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- print --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.0.2/css/buttons.dataTables.css">

    <style>
        .text {
            word-break: break-all;
        }

        .ck-editor__editable[role="textbox"] {
            /* Editing area */
            min-height: 400px;
            max-height: 400px;
        }
    </style>
    @include('mobile.partials.analytics')

</head>

<body>
    <div class="wrapper">
        <aside id="sidebar" class="expand" style="height: max-content;position:sticky;top:0px">
            <div class="d-flex mt-5">
                <button class="toggle-btn" type="button">
                    {{-- <i class="lni lni-grid-alt"></i> --}}
                </button>
                <div class="sidebar-logo pb-5">
                    <a href="#"><img
                            src="https://cdn.digitaldesa.com/statics/landing/homepage/media/logo/neo-logo-digides.svg"
                            alt="" style="height: 100%; width:70%;"></a>
                </div>
            </div>
            <ul class="sidebar-nav" style="height:100vh">
                <li class="sidebar-item">
                    {{-- <a href="#" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span>Selamat datang {{"".Auth::user()->name.""}}</span>
                    </a> --}}
                </li>
                @if (Auth::user()->role == '')
                    <li class="sidebar-item">
                        <a href="/administrator/instance" class="sidebar-link">
                            <i class="lni lni-apartment"></i>
                            <span>Instansi</span>
                        </a>
                    </li>
                    <li class="sidebar-item" id="list-program-item">
                        <a href="/administrator/program" class="sidebar-link">
                            <i class="lni lni-agenda"></i>
                            <span>Program</span>
                        </a>
                    </li>
                    <li class="sidebar-item" id="list-program-item">
                        <a href="/administrator/kategori" class="sidebar-link">
                            <i class="lni lni-grid-alt"></i>
                            <span>Kategori Program</span>
                        </a>
                    </li>
                    <li class="sidebar-item" id="list-program-item">
                        <a href="/administrator/banner" class="sidebar-link">
                            <i class="lni lni-license"></i>
                            <span>Banner</span>
                        </a>
                    </li>
                    <li class="sidebar-item" id="list-program-item">
                        <a href="{{ route('view_admin_registrasi') }}" class="sidebar-link">
                            <i class="lni lni-users"></i>
                            <span>Registrasi</span>
                        </a>
                    </li>
                    <li class="sidebar-item" id="list-program-item">
                        <a href="{{ route('view_location') }}" class="sidebar-link">
                            <i class="lni lni-map-marker"></i>
                            <span>Lokasi kantor</span>
                        </a>
                    </li>
                    <li class="sidebar-item" id="list-program-item">
                        <a href="{{ route('view_user_enrollment') }}" class="sidebar-link">
                            <i class="lni lni-layers"></i>
                            <span>User Enrollment</span>
                        </a>
                    </li>
                @else
                    {{--  --}}
                    <li class="sidebar-item" id="list-program-item">
                        <a href="/administrator/program" class="sidebar-link">
                            <i class="lni lni-agenda"></i>
                            <span>Program</span>
                        </a>
                    </li>
                    <li class="sidebar-item" id="list-program-item">
                        <a href="{{ route('view_admin_edit') }}" class="sidebar-link">
                            <i class="lni lni-users"></i>
                            <span>AKUN</span>
                        </a>
                    </li>
                    {{--  --}}
                @endif



            </ul>
            <div class="sidebar-footer" style="position:sticky;bottom:10px;">
                <form action="{{ route('mutate_admin_logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="sidebar-link btn btn-outline-light mx-3 mb-3">
                        <i class="lni lni-exit"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </aside>
        <div class="main p-3">
            <div class="text-center" style="display: flex;justify-content:space-between">
                <h1>
                    @yield('title_content')
                </h1>
                <p>Selamat datang {{ '' . Auth::user()->name . '' }}</p>
            </div>
            @yield('content')
        </div>
    </div>

    <!-- Vendor JS Files -->
    <script src="{{ statics('assets/deskripsi-asset/vendor/apexcharts/apexcharts.min.js?v=0.0.1') }}"></script>
    <script src="{{ statics('assets/deskripsi-asset/vendor/chart.js/chart.umd.js?v=0.0.1') }}"></script>
    <script src="{{ statics('assets/deskripsi-asset/vendor/echarts/echarts.min.js?v=0.0.1') }}"></script>
    <script src="{{ statics('assets/deskripsi-asset/vendor/quill/quill.min.js?v=0.0.1') }}"></script>
    <script src="{{ statics('assets/deskripsi-asset/vendor/simple-datatables/simple-datatables.js?v=0.0.1') }}"></script>
    <script src="{{ statics('assets/deskripsi-asset/vendor/tinymce/tinymce.min.js?v=0.0.1') }}"></script>
    <script src="{{ statics('assets/deskripsi-asset/vendor/php-email-form/validate.js?v=0.0.1') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ statics('assets/deskripsi-asset/js/main.js?v=0.0.1') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

{{-- datatables --}}
<script src="//cdn.datatables.net/2.0.5/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/dataTables.buttons.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.dataTables.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.2/js/buttons.print.min.js"></script>
{{-- datatables --}}

{{-- select2 --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/js/select2.min.js"
    integrity="sha512-9p/L4acAjbjIaaGXmZf0Q2bV42HetlCLbv8EP0z3rLbQED2TAFUlDvAezy7kumYqg5T8jHtDdlm1fgIsr5QzKg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {

        $('#dropwown-kategori').select2({
            // theme: 'bootstrap-5'
        });
        $('#dropwown-instansi').select2();

        let table = new DataTable('#table-program', {

            language: {
                lengthMenu: '_MENU_  Data per-halaman'
            },

            columns: [{
                    name: 'no'
                },
                {
                    name: 'Program'
                },
                {
                    name: 'Instansi'
                },
                {
                    name: 'Ilustrasi Program'
                },
                {
                    name: 'Kategori'
                },
                {
                    name: 'tag'
                },
                {
                    name: 'URL'
                },
                {
                    name: 'Aksi'
                },
                {
                    name: 'Fitur'
                },
            ],

            lengthMenu: [{
                label: 'All',
                value: -1
            }, 20, 50, 100, 1000],
            scrollX: true,
            autoWidth: false,
            layout: {
                topEnd: {
                    search: {
                        placeholder: 'Search here...'
                    },

                }
            }
        })

        $('#filter-select').on('change', function() {
            var category = $(this).val();
            table.search(category).draw();
        });
    })

    let table = new DataTable('#table', {
        lengthMenu: [{
            label: 'All',
            value: -1
        }, 20, 50, 100, 1000],
        scrollX: true,
        autoWidth: false,
        layout: {
            topEnd: {
                search: {
                    placeholder: 'Search here...'
                }
            }
        }
    });

    new DataTable('#table_user_enrollment', {
        dom: 'fBrtip',
        scrollX: true,
        lengthMenu: [
            [10, 25, 50, -1],
            [10, 25, 50, "All"]
        ],
        buttons: [
            'excelHtml5',
            'pageLength',
        ],
    });
</script>
