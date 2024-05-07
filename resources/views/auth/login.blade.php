<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-4">sign in</h3>
                        <form action="{{ route('login.submit') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                                    placeholder="E-mail" required>
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password" class="form-control" placeholder="Password "
                                    required>
                            </div>
                            <button type="submit" class="btn btn-primary">sign in</button>
                        </form>
                        <p class="mt-3"> Do you already have an account?<a href="{{ route('register') }}"> new account
                            </a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
