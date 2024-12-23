<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="style.css"> --}}
    <link rel="stylesheet" href="{{ statics('assets/css/style.css?v=0.0.5') }}" />
    <title>LOGIN</title>
</head>

<body>

    <!----------------------- Main Container -------------------------->

    <div class="container d-flex justify-content-center align-items-center min-vh-100">

        <!----------------------- Login Container -------------------------->

        <div class="row border rounded-5 p-3 bg-white shadow box-area">

            <!--------------------------- Left Box ----------------------------->

            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box p-5"
                style="background: #018577;">
                <div class="featured-image mb-3">
                    <img src="https://cdn.digitaldesa.com/statics/landing/homepage/media/logo/neo-logo-digides.svg"
                        class="img-fluid" style="width: 250px;">
                </div>
                <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 600;">Be
                    Verified</p>
                <small class="text-white text-wrap text-center"
                    style="width: 17rem;font-family: 'Courier New', Courier, monospace;">Join experienced Designers on
                    this platform.</small>

            </div>

            <!-------------------- ------ Right Box ---------------------------->
            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4">
                        <h2>Hello,Again</h2>
                        <p>We are happy to have you back.</p>
                    </div>
                    <form action="{{ route('mutate_admin_login') }}" method="POST">
                        @csrf

                        {{-- error for wrong username or password --}}
                        @if (Session::has('message'))
                            <p class="alert alert-danger">
                                {{ Session::get('message') }}
                            </p>
                        @endif

                        {{-- error for username --}}
                        @error('username')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        {{-- error for password --}}
                        @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror

                        {{-- username --}}
                        <div class="input-group mb-3">
                            <input type="text"
                                class="form-control form-control-lg bg-light fs-6 @error('username') is-invalid @enderror"
                                placeholder="username" name="username" required>
                        </div>
                        {{-- username --}}

                        {{-- password --}}
                        <div class="input-group mb-1">
                            <input type="password" class="form-control form-control-lg bg-light fs-6"
                                placeholder="Password" name="password" required>
                        </div>
                        <div class="input-group mb-5 d-flex justify-content-between">
                        </div>
                        <div class="input-group mb-3">
                            <button type="submit" class="btn btn-lg btn-primary w-100 fs-6">Login</button>
                        </div>
                        {{-- password --}}
                    </form>

                </div>
            </div>

        </div>
    </div>

</body>

</html>
