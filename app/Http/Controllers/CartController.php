<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function index()
    {
        // Fetch cart items for the authenticated user and calculate grand total
        $cartItems = Cart::where('user_id', auth()->id())->get();
        $grandTotal = $cartItems->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        return view('cart.index', compact('cartItems', 'grandTotal'));
    }

    public function addToCart(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'product_name' => 'required|string',
            'product_price' => 'required|numeric',
            'product_image' => 'required|string',
            'product_quantity' => 'required|integer|min:1',
        ]);

        // Create a new cart item and save it
        $cart = new Cart();
        $cart->user_id = auth()->id();
        $cart->name = $validatedData['product_name'];
        $cart->price = $validatedData['product_price'];
        $cart->image = $validatedData['product_image'];
        $cart->quantity = $validatedData['product_quantity'];
        $cart->save();

        return redirect()->route('cart.index')->with('success', 'Product added to cart successfully!');
    }

    // Implement updateCart, removeFromCart, deleteAll, and logout methods as needed
}