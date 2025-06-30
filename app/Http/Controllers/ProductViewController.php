<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductViewController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('frontend.products.index', compact('products'));
    }
}
