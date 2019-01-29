<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
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
        $categories = Category::orderBy('name')->get();
        return view('admin.products.create')->with(compact('categories'));
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
        $product->category_id = $request->input('category_id') != 0 ? $request->input('category_id') : null;
        $product->long_description = $request->input('long_description');
        $product->save();
        return redirect('/admin/products');
    }


    public function edit(Product $product)
    {
        //$product = Product::findOrFail($id);
        $categories = Category::orderBy('name')->get();

        return view('admin.products.edit', compact('product', 'categories'));
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
        $product->category_id = $request->input('category_id') != 0 ? $request->input('category_id') : null;
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
