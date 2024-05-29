<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function update(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required',
            'name' => 'required',
            'tanggal_kadaluarsa' => 'required',
            'price' => 'required',
        ]);
        $product = Product::find($request->id);
        if ($product === null) {
            abort(404);
        }
        $product->code = $request->code;
        $product->name = $request->name;
        $product->tanggal_kadaluarsa = $request->tanggal_kadaluarsa;
        $product->price = $request->price;
        $product->save();
        return redirect(url('/product'));
    }

    public function edit(Request $request, $id)
    {
        $product = Product::find($id);
        if ($product === null) {
            abort(404);
        }
        return view('content.product.edit', [
            'product' => $product
        ]);
    }

    public function delete(Request $request)
    {
        $idProduct = $request->id;
        $product = Product::find($idProduct);
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
            'tanggal_kadaluarsa' =>'required',
            'price' => 'required',
        ]);
        #sudah tervalidasi
        $product = new Product();
        $product->code = $request->code;
        $product->name = $request->name;
        $product->tanggal_kadaluarsa = $request->tanggal_kadaluarsa;
        $product->price = $request->price;
        $product->save();
        return redirect(url('/product'));

    }

    public function list()
    {
        $products = Product::paginate(10);
        return view('content.product.list', [
            'products' => $products
        ]);
    }

    public function add()
    {
        return view('content.product.add');
    }
}


