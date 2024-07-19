<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;

class CartController extends ResultController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $result = $this->welcome();
      return view('cart.index', compact('result'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(String $id)
    {
      $product = Product::findOrFail($id);
      $cart = session()->get('cart', []);
      if(isset($cart[$id])) {
          $cart[$id]['quantity']++;
      } else {
          $cart[$id] = [
              "product_id" => $id,
              "name" => $product->name,
              "quantity" => 1,
              "price" => $product->price,
              "vat" => $product->vat,
              "discount" => $product->discount
          ];
      }
      session()->put('cart', $cart);
      return redirect()->back()->with('success', 'Product has been added to cart!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
      if($request->id && $request->quantity){
          $cart = session()->get('cart', []);
          $cart[$request->id]["quantity"] = $request->quantity;
          session()->put('cart', $cart);
          session()->flash('success', 'Product added to cart.');
      }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
      session()->forget('cart');
      return redirect()->back()->with('success', 'Shopping Cart successfully deleted.');
    }
}
