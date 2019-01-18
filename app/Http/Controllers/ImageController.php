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
        $file = $request->file('photo');
        $path = public_path() . '/images/products';
        $filename = uniqid() . $file->getClientOriginalName();
        $result = $file->move($path, $filename);

        if($result){
            $productImage = new ProductImage();
            $productImage->image = $filename;
            $productImage->product_id = $product->id;
            $productImage->save();
        }


        return redirect()->back();
    }

    public function destroy(Product $product, ProductImage $product_image)
    {

    }
}
