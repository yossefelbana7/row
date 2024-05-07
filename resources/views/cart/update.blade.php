@extends('cart.product')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update | Edit a product</title>
        <link
            href="https://fonts.googleapis.com/css2?family=Amiri&family=Cairo:wght@200&family=Poppins:wght@100;200;300&family=Tajawal:wght@300&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="index.css">
    </head>

    <body>
        <div class="main">
            <center>
                <h2>Modify products</h2>
                <form action="{{ route('products.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ $data['id'] }}">
                    <input type="text" name='name' value='{{ $data['name'] }}'>
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <br>
                    <input type="text" name='price' value='{{ $data['price'] }}'>
                    @error('price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <br>
                    <input type="file" id="file" name='image'>
                    <label for="file"> Update product image</label>
                    <button name='update' type='submit'>Update product </button>
                    <br><br>
                    <a href="{{ route('products.index') }}"> View all products </a>
                </form>
            </center>
        </div>
        <p>Developer By Youssef Elbanna</p>
    </body>

    </html>
@endsection
