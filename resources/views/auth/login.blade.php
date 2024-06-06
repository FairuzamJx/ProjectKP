<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('log')}}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('log')}}/css/sb-admin-2.min.css" rel="stylesheet">

</head>
<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-5 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">LOGIN LARAVEL</h1>
                        </div>
                        @if (session('danger'))
                        <div class="alert alert-danger mt-2" role="alert">
                            {{session('danger') }}.
                        </div>
                        @endif
                        <form method="POST" action="/user/authenticate">
                            @csrf
                            <div class="form-group">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email addres" name="email" id="email" value="">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" type="password" value="">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-xs btn-success btn-block mt-2">Login</button></a>
                            <hr>
                    </div>
                </div>
                </form>
            </div>
            <main class="py-4">
            </main>
        </div>
        <script>
            window.setTimeout(function() {
                $(".alert").fadeTo(500.0).slideUp(500, function() {
                    $(this).remove();

                });
            }, 3000);
        </script>
        </body>

</html>
