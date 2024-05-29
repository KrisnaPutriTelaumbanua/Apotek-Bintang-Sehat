<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => 'required',
            'tanggal_kadaluarsa' => 'required|date',
            'price' => 'required|numeric',
        ]);

        $product = Product::find($id);
        if ($product === null) {
            abort(404);
        }

        $product->code = $validated['code'];
        $product->name = $validated['name'];
        $product->tanggal_kadaluarsa = $validated['tanggal_kadaluarsa'];
        $product->price = $validated['price'];
        $product->save();

        return redirect()->route('product.list');
    }

    public function edit($id)
    {
        $product = Product::find($id);
        if ($product === null) {
            abort(404);
        }

        return view('content.product.edit', compact('product'));
    }

    public function delete($id)
    {
        $product = Product::find($id);
        if ($product === null) {
            return response()->json([], 404);
        }

        $product->delete();
        return response()->json([], 200);
    }

    public function insert(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => 'required',
            'tanggal_kadaluarsa' => 'required|date',
            'price' => 'required|numeric',
        ]);

        $product = new Product();
        $product->code = $validated['code'];
        $product->name = $validated['name'];
        $product->tanggal_kadaluarsa = $validated['tanggal_kadaluarsa'];
        $product->price = $validated['price'];
        $product->save();

        return redirect()->route('product.list');
    }

    public function list()
    {
        $products = Product::paginate(10);
        return view('content.product.list', compact('products'));
    }

    public function add()
    {
        return view('content.product.add');
    }
}
