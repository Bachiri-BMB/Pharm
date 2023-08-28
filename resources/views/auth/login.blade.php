<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ ucfirst(AppSettings::get('app_name', 'App')) }} - {{ ucfirst($title ?? '') }}</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    <meta name="author" content="Phoenixcoded" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon"
        href="@if(!empty(AppSettings::get('logo'))) {{ asset('storage/' . AppSettings::get('favicon')) }} @else{{ asset('img/fav.png') }} @endif">

    <!-- vendor css -->
    <link rel="stylesheet" href="{{ asset('jambasangsang/assets/css/style.css') }}">
	<style>
		 <style>
        /* ... (your existing styles) ... */
        
        /* Copyright animation */
        .copyright {
            text-align: center;
            font-size: 14px;
            color: #777;
            margin-top: 30px;
            animation: fade-in 0.5s ease;
        }

        @keyframes fade-in {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>

</head>

<body class="bg-light">

    <div class="auth-wrapper d-flex align-items-center justify-content-center">
        <div class="auth-content text-center">
            <div class="card borderless">
                <div class="row align-items-center ">
                    <div class="col-md-12">
                        <div class="card-body">
                            <img src="{{ asset('img/Police_Algérie.png') }}" width="150" alt=""
                                class="img-fluid mb-4 rounded-circle">
                            <h4 class="mb-3">Hopital de Police</h4>
                            <p class="text-muted">Veuillez Vous Connecter a Votre Compte .</p>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <input id="email" type="email" placeholder="Email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="password" placeholder="Password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="custom-control custom-checkbox text-left mb-4">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Remember me</label>
                                </div>
                                <button type="submit" class="btn btn-primary btn-block">Connecter</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
			<div class="copyright">
				&copy; 2023 BECHIRI MOHAMMED EL BACHIR
			</div>
        </div>
    </div>
	

    <!-- Required Js -->
    <script src="{{ asset('jambasangsang/assets/js/vendor-all.min.js') }}"></script>
    <script src="{{ asset('jambasangsang/assets/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('jambasangsang/assets/js/pcoded.min.js') }}"></script>

</body>

</html>
