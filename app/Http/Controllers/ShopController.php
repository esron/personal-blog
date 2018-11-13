<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('shop.index', compact('products'));
    }

    public function singleProduct($id)
    {
        $product = Product::findOrFail($id);

        return view('shop.singleProduct', compact('product'));
    }
}
