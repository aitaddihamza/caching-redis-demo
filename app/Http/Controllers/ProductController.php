<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Benchmark;
use Illuminate\Support\Facades\Cache;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $result = Benchmark::measure(function () use (&$products) {
            $products = Cache::remember('products', 5, function () {
                return Product::all();
            });
        });
        return view('products', compact('products', 'result'));
    }
}
