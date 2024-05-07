@extends('cart.product')

@section('content')
    <!-- upload_form.blade.php -->
    <form action="{{ route('upload.submit') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" placeholder="Product Name">
        <input type="number" name="price" placeholder="Product Price">
        <input type="file" name="image">
        <button type="submit" name="upload">Upload</button>
    </form>
@endsection
