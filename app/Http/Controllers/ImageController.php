<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductImage;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index(Product $product)
    {
        $images = $product->images;
        return view('admin.images.index', compact('images', 'product'));
    }

    public function store(Request $request, Product $product)
    {

    }

    public function destroy(Product $product, ProductImage $product_image)
    {

    }
}
