{{-- @extends('layouts.app')

@section('content') --}}



<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Davur - Restaurant Food Order Bootstrap Admin Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../../images/favicon.png">
    <link href="../../vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../vendor/chartist/css/chartist.min.css">
    <link href="../../vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="../../css/style.css" rel="stylesheet">
    <link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">

    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous"> --}}
</head>



<div class="h-100">
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Connexin') }}</div>

<div class="card-body">
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                    value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de Pass') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6 offset-md-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                        {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        {{ __('Restez Connecté') }}
                    </label>
                </div>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Valder') }}
                </button>


            </div>
        </div>
    </form>
</div>
</div>
</div>
</div> --}}



<div class="login-bg h-100">
    <div class="container h-100">
        <div class="row justify-content-center h-100">
            <div class="col-md-5">
                <div class="form-input-content">
                    <div class="card card-login">
                        <div class="card-header">
                            <div class="nav-header position-relative  text-center w-100">
                                <div class="brand-logo">
                                    <a href="index.html">
                                        <b class="logo-abbr">D</b>
                                        <span class="brand-title"><b>Drora</b></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="text-center my-3">
                            <img class="rounded-circle" src="../../assets/images/avatar/11.png" width="80" height="80"
                                alt="">
                        </div>
                        <div class="card-body">

                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group mb-4">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group mb-4">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group ml-3 mb-5">
                                    <input id="checkbox1" type="checkbox">
                                    <label class="label-checkbox ml-2 mb-0" for="checkbox1">Remember Password</label>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block border-0">
                                    {{ __('Valder') }}
                                </button>
                            </form>
                        </div>
                        <div class="card-footer text-center border-0 pt-0">
                            <p class="mb-1">Don't have an account?</p>
                            <h6><a href="/register">Click me to create account</a></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>




<!-- Required vendors -->
<script src="../../vendor/global/global.min.js"></script>
<script src="../../vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="../../vendor/chart.js/Chart.bundle.min.js"></script>
<script src="../../js/custom.min.js"></script>
<script src="../../js/deznav-init.js"></script>

<!-- Counter Up -->
<script src="../../vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="../../vendor/jquery.counterup/jquery.counterup.min.js"></script>

<!-- Apex Chart -->
<script src="../../vendor/apexchart/apexchart.js"></script>

<!-- Chart piety plugin files -->
<script src="../../vendor/peity/jquery.peity.min.js"></script>

<!-- Dashboard 1 -->
<script src="../../js/dashboard/dashboard-1.js"></script>

{{-- @endsection --}}