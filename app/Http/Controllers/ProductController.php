<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function delete($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Product not found.');
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }

    public function showUploadForm()
    {
        return view('upload_form');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image')->store('public/images');
        $imageUrl = Storage::url($imagePath);

        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'image' => $imageUrl,
        ]);

        return redirect()->route('products.index')->with('success', 'Product uploaded successfully.');
    }

    public function update(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $price = $request->input('price');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/images');
            $imageUp = Storage::url($imagePath);
        } else {
            $imageUp = '';
        }

        Product::where('id', $id)->update([
            'name' => $name,
            'price' => $price,
            'image' => $imageUp,
        ]);

        return redirect()->route('products.index')->with('success', 'Product updated successfully!');
    }
}