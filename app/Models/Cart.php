<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'price', 'image', 'quantity'];

    // Specify the table name (usually lowercase and plural)
    protected $table = "carts"; // Changed "Cart" to "carts"

    // Optional: Define relationships, accessors, mutators, etc. here
}