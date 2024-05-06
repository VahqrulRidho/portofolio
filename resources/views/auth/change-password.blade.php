<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div id="app">


        <div class="container-login">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-12 col-md-9">
                    <div class="card shadow-sm my-5">
                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="login-form">
                                        <div class="card-header">{{ __('Chnage Password') }}
                                        </div>

                                        <form action="{{ route('update-password') }}" method="POST">
                                            @csrf
                                            <div class="card-body">
                                                @if (session('status'))
                                                    <div class="alert alert-success" role="alert">
                                                        {{ session('status') }}
                                                    </div>
                                                @elseif (session('error'))
                                                    <div class="alert alert-danger" role="alert">
                                                        {{ session('error') }}
                                                    </div>
                                                @endif

                                                <div class="mb-3">
                                                    <label for="oldPasswordInput" class="form-label">Old
                                                        Password</label>
                                                    <input name="old_password" type="password"
                                                        class="form-control @error('old_password') is-invalid @enderror"
                                                        id="oldPasswordInput" placeholder="Old Password">
                                                    @error('old_password')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="newPasswordInput" class="form-label">New
                                                        Password</label>
                                                    <input name="new_password" type="password"
                                                        class="form-control @error('new_password') is-invalid @enderror"
                                                        id="newPasswordInput" placeholder="New Password">
                                                    @error('new_password')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="mb-3">
                                                    <label for="confirmNewPasswordInput" class="form-label">Confirm
                                                        New
                                                        Password</label>
                                                    <input name="new_password_confirmation" type="password"
                                                        class="form-control" id="confirmNewPasswordInput"
                                                        placeholder="Confirm New Password">
                                                </div>

                                            </div>

                                            <div class="card-footer">
                                                <a class="btn btn-dark" href="{{ route('home') }}">Back</a>
                                                <button class="btn btn-success">Submit</button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
