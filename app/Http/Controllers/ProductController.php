<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::paginate(10);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {

        $this->validate($request, [
           'name' => 'required | min:3',
            'price' => 'required | numeric | min:0',
            'description' => 'required | max:200'
        ], [
            'name.required' => 'El nombre es obligatorio',
            'name.min' => 'El nombre debe tener al menos 3 caráteres',
            'price.required' => 'El precio es obligatorio',
            'price.min' => 'El precio mínimo es 0',
            'description.required' => 'La descripción es obligatoria',


        ]);
        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->long_description = $request->input('long_description');
        $product->save();
        return redirect('/admin/products');
    }


    public function edit(Product $product)
    {
        //$product = Product::findOrFail($id);
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'name' => 'required | min:3',
            'price' => 'required | numeric | min:0',
            'description' => 'required | max:200 | min:10',

        ], [
            'name.required' => 'El nombre es obligatorio',
            'name.min' => 'El nombre debe tener al menos 3 caráteres',
            'price.required' => 'El precio es obligatorio',
            'price.min' => 'El precio mínimo es 0',
            'description.required' => 'La descripción es obligatoria',


        ]);
        //$product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->long_description = $request->input('long_description');
        $product->save();
        return redirect('/admin/products');

    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/admin/products');
    }
}
