<?php

namespace App\Http\Controllers;

use Mail;
use App\Mail\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;
use App\Models\Transaction;
use App\Models\Sale;

class TransactionController extends ResultController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $result = $this->result();
      return view('transaction.index', compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      $request->validate([
        'email' => ['required'],
        'order_id' => ['required'],
        'amount' => ['required'],
        'type' => ['required'],
      ]);

      $order_id = $request->input('order_id');
      $amount = $request->input('amount');
      $type = $request->input('type');

      $payment = new Payment;
      $payment->order_id = $order_id;
      $payment->amount = $amount;
      $payment->type = $type;
      $payment->status = 0;
      $payment->save();

      $transaction = new Transaction;
      $transaction->order_id = $order_id;
      $transaction->transaction_code = 0;
      $transaction->transaction_amount = $amount;
      $transaction->transaction_type = $type;
      $transaction->transaction_status = 0;
      $transaction->save();

      $sale = new Sale;
      $sale->order_id = $order_id;
      $sale->amount = $amount;
      $sale->status = 0;
      $sale->save();

      $notification = [
        "title" => "Confirmed!",
        "body" => "We have recieved an order addressed to this email. If you made the order, continue to register an account with us to collect your receipt and invoice. Jomaka Horizons Kenya",
      ];

      $email = $request->input('email');
      Mail::to($email)->send(new Notification($notification));
      return redirect('/payment/'.$order_id.'/confirmation/')->with('info', 'M - Pesa Push  STK initialized. Enter pin to confirm transaction');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
}
