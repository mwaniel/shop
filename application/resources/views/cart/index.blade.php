@extends('layouts.guest')
@section('guest-layout')
<div class="container fashion_section">
  <main>
    <div class="py-5 text-center">
      <p class="lead">Provide accurate details for better service delivery.</p>
    </div>
      @include('alert.alert')
    <div class="row g-5">
      <div class="col-md-5 col-lg-4 order-md-last">
        <h4 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-primary">Your cart</span>
          <span class="badge bg-primary rounded-pill">{{ count((array) session('cart')) }}</span>
        </h4>
        <ul class="list-group mb-3">
          @php $total = 0 @endphp
          @if(session('cart'))
          @foreach(session('cart') as $id => $details)
          @php $subtotal = $details['price'] *= $details['quantity'] @endphp
          <li class="list-group-item d-flex justify-content-between lh-sm">
            <div>
              <h6 class="my-0">{{ $details['name'] }}</h6>
              <small class="text-body-secondary">{{ $details['quantity'] }}</small>
            </div>
            <span class="text-body-secondary">{{ number_format($details['price'], 2) }} shs</span>
          </li>
          @php $total += $subtotal @endphp
          @endforeach
          <li class="list-group-item d-flex justify-content-between bg-body-tertiary">
            <div class="text-success">
              <h6 class="my-0">Empty Shopping cart!</h6>
            </div>
            <form action="{{route('cart-delete')}}" method="POST">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger">Delete</button>
            </form>
          </li>
          @else
          @php $total = '0' @endphp
          <li class="list-group-item d-flex justify-content-between bg-body-tertiary">
            <div class="text-success">
              <h6 class="my-0">Shopping</h6>
              <small>Cart</small>
            </div>
            <span class="text-warning">EMPTY!</span>
          </li>
          @endif
          <li class="list-group-item d-flex justify-content-between">
            <span>Total (shs)</span>
            <strong>@php echo number_format($total, 2) @endphp</strong>
          </li>
        </ul>
      </div>
      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">Billing address</h4>
        <form action="{{route('order-store')}}" class="needs-validation" novalidate method="POST">
          @csrf
          <div class="row g-3">
            <div class="col-12">
              <label for="username" class="form-label">Username</label>
              <div class="input-group has-validation">
                <span class="input-group-text">@</span>
                <input type="text" name="username" class="form-control" id="username" placeholder="Username" required>
              <div class="invalid-feedback">
                  Your username is required.
                </div>
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Email <span class="text-body-secondary">(Optional)</span></label>
              <input type="email" name="email" class="form-control" id="email" placeholder="you@example.com" required>
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="col-12">
              <label for="phone" class="form-label">M-Pesa Number</label>
              <div class="input-group has-validation">
                <span class="input-group-text">+2547</span>
                <input type="text" name="phone" class="form-control" id="phone" placeholder="M-Pesa Number" required>
              <div class="invalid-feedback">
                  Your M-Pesa Number is required.
                </div>
              </div>
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Shipping Address</label>
              <input type="text" name="address" class="form-control" id="address" placeholder="1234 Main St" required>
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

            <div class="col-md-5">
              <label for="country" class="form-label">Country</label>
              <select class="form-control" name="country" id="country" required>
                <option value="">Choose...</option>
                <option value="kenya">Kenya</option>
              </select>
              <div class="invalid-feedback">
                Please select a valid country.
              </div>
            </div>
          </div>

          <hr class="my-4">

          <h4 class="mb-3">Payment Method</h4>

          <div class="my-3">
            <div class="form-check">
              <input id="credit" value="m-pesa" name="transaction_type" type="radio" class="form-check-input" checked required>
              <label class="form-check-label" for="credit">M-Pesa</label>
            </div>
            <div class="form-check">
              <input id="paypal" name="transaction_type" value="cash" type="radio" class="form-check-input" required>
              <label class="form-check-label" for="paypal">Cash</label>
            </div>
          </div>

          <hr class="my-4">
          <div>
            <input type="hidden" value="<?php echo number_format($total, 2) ?>" name="total">
          </div>

          <button class="w-100 btn btn-primary btn-lg" type="submit">Process Payment</button>
        </form>
      </div>
    </div>
  </main>
</div>
@endsection