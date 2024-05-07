<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        input {
            text-align: center;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

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
                        <h3 class="card-title text-center mb-4">انشاء حساب جديد</h3>
                        <form action="{{ route('register.submit') }}" method="post">
                            @csrf
                            <div class="mb-3">
                                <input type="text" name="name" value="{{ old('name') }}"
                                    placeholder="اسم السمتخدم" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <input type="email" name="email" value="{{ old('email') }}"
                                    placeholder="البريد الالكتروني" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password" placeholder="كلمة المرور" class="form-control"
                                    required>
                            </div>
                            <div class="mb-3">
                                <input type="password" name="password_confirmation" placeholder="تأكيد كلمة المرور"
                                    class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">تسجيل حساب</button>
                        </form>
                        <p class="mt-3">هل لديك حساب؟ <a href="{{ route('login') }}"> تسجيل دخول</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
