<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Specify the table name (usually lowercase and plural)
    protected $table = "products";

    // Fillable attributes
    protected $fillable = ['name', 'price', 'image'];

    // Timestamps
    public $timestamps = false;

    // Optional: Define relationships, accessors, mutators, etc. here
}