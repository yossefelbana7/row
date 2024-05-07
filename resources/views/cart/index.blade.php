@extends('cart.product')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
            integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <link rel="stylesheet" href="index.css"> <!-- Make sure this path is correct -->
        <title>Online Shop | Add Products</title>
    </head>

    <body>
        <center>
            <div class="main">

                <form action="{{ url('upload') }}" method="post" enctype="multipart/form-data">
                    @csrf <!-- Add this CSRF token for Laravel forms -->
                    <h2>Online marketing website</h2>
                    <input type="text" name="name" placeholder="Product Name">
                    <br>
                    <input type="text" name="price" placeholder="Product Price">
                    <br>
                    <input type="file" id="file" name="image" style="display:none;">
                    <label for="file">Choose an image of the product</label>
                    <button type="submit" name="upload">Upload the product ✅</button>
                    <br><br>
                    <a href="{{ url('product') }}">View all products</a>
                    <!-- Assuming you have a route named 'product' -->
                </form>
            </div>
            <p>Developed by Youssef Elbanna</p>
        </center>
    </body>

    </html>
@endsection
