<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Transaction;

class OrderController extends ResultController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $result = $this->result();
      return view('order.index', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function order_id($data)
    {
      function order_id($data) {
        $order_id = '';
        for ($i=0; $i < $data; $i++) { 
          $order_id .= rand(0, 9);
        }
        return $order_id;
      }
      $result = order_id($data);
      return $result; 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $request->validate([
        'username' => ['required'],
        'email' => ['required'],
        'phone' => ['required'],
        'total' => ['required'],
        'address' => ['required'],
        'transaction_type' => ['required'],
      ]);
      if (count((array) session('cart')) > 0) {
      $order_id = $this->order_id(12);
      $order = new Order;
      $order->order_id = $order_id;
      $string = $request->input('transaction_type');
      $order->username = $request->input('username');
      $order->email = $request->input('email');
      $order->phone = $request->input('phone');
      $order->address = $request->input('address');
      $order->country = 'kenya';
      $order->transaction_type = $request->input('transaction_type');
      $order->total = $request->input('total');
      $order->save();
        foreach (session('cart') as $item) {
          $order_item = new OrderItem;
          $order_item->order_id = $order_id;
          $order_item->product_id = $item['product_id'];
          $order_item->name = $item['name'];
          $order_item->quantity = $item['quantity'];
          $order_item->amount = $item['price'];
          $order_item->vat = $item['vat'];
          $order_item->discount =  $item['discount'];
          $order_item->status = 1;
          $order_item->save();
        }
      return redirect('/payment/'.$order_id.'/'.$string.'/')->with('info', 'Almost there! Confirm order details and proceed to payment.');
      } else {
        return redirect()->back()->with('warning', 'Shopping cart cannot be empty!');
      }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
      $result[] = 'order';
      $result = $this->result();
      $result['order'] = $this->order($id);
      $order_id = $result['order']['order_id'];
      $result['order-item'] = $this->order_item($order_id);
      $result['transaction'] = Transaction::where('order_id' ,$order_id)->get();
      return view('order.section.show', compact('result'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function my_order () {
      $result = $this->result();
      return view('order.index', compact('result'));
    }
}
