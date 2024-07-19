@extends('layouts.guest')
@section('guest-layout')
<div class="container fashion_section">
	<div>
		<div class="col-12">
	    <h4 class="d-flex justify-content-between align-items-center mb-3">
	      <span class="text-primary"></span>
	    </h4>
	    <ul class="list-group mb-3">	    	
	      <li class="list-group-item d-flex justify-content-between bg-body-tertiary">
	        <div class="text-warning">
	          <h1 class="my-0 text-uppercase">Payment Confirmation</h1>
	          <small>Order_id: {{$result['payment']['order'][0]['order_id']}}</small>
	        </div>
	        <div class="ribbon-wrapper ribbon-xl">
	          <div class="ribbon bg-warning text-xl">
	            loading...
	          </div>
	        </div>
	      </li>
	      <li class="list-group-item d-flex justify-content-between">
	        <span>Total (USD)</span>
	        <strong>{{$result['payment']['order'][0]['total']}} shs</strong>
	      </li>
	    </ul>
	  </div>
	</div>
</div>
@endsection