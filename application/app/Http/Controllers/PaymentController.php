<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends ResultController
{
    /**
     * Display a listing of the resource.
     */
    public function index(String $id, String $string)
    {
      switch ($string) {
        case 'm-pesa':
          $result[] = 'payment';
          $result = $this->welcome();
          $result['payment'] = $this->payment($id);
          //return $result;
          return view('payment.section.m_pesa', compact('result'));
          break;

        case 'cash':
          $result[] = 'payment';
          $result = $this->welcome();
          $result['payment'] = $this->payment($id);
          return view('payment.section.cash', compact('result'));
          break;

        case 'confirmation':
          $result[] = 'confirmation';
          $result = $this->welcome();
          $result['payment'] = $this->payment($id);
          $result['transaction'] = $this->transaction($id);
          return view('payment.section.confirmation', compact('result'));
          break;
        
        default:
          $result = $this->welcome();
          return view('payment.index', compact('result'));
          break;
      }
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
        //
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
