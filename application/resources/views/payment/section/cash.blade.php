@extends('layouts.guest')
@section('guest-layout')
<div class="container fashion_section">
  <!-- Main content -->
  <div class="invoice p-3 mb-3 card">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h1><b>INVOICE</b></h1>
         <div class="card callout callout-info">
          <h5><i class="fas fa-info"></i> Note:</h5>
          Payment Method is set to Cash. Dont forget to collect your receipt. Thank you!
        </div>
        @include('alert.alert')
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        From
        <address>
          <strong>{{ config('app.name', 'Jomaka Horizons Kenya') }}</strong><br>
          Along <br>
          Thika Town<br>
          Phone: (+254) 721 478 644<br>
          Email: info@jomakahorizons.com
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        To
        <address>
          <strong>{{$result['payment']['order'][0]['username']}}</strong><br>
          Address: {{$result['payment']['order'][0]['address']}}<br>
          Country: {{$result['payment']['order'][0]['country']}}<br>
          Phone: {{$result['payment']['order'][0]['phone']}}<br>
          Email: {{$result['payment']['order'][0]['email']}}
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b>Date: @php echo date('d/m/y') @endphp</b><br>
        <br>
        <b>Order ID:</b> JHK_{{$result['payment']['order'][0]['order_id']}}<br>
        <b>Order Due:</b> {{$result['payment']['order'][0]['created_at']}}<br>
        <b>Account:</b> {{$result['payment']['order'][0]['phone']}}
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Sub - Total</th>
            <th>VAT</th>
          </tr>
          </thead>
          <tbody>
          @if(count($result['payment']['order-item']) > 0)
          @foreach($result['payment']['order-item'] as $item)
          <tr>
              <td>{{$item->name}}</td>
              <td>{{$item->quantity}}</td>
              <td>{{number_format($item->amount, 2)}}</td>
              <td>
                  @if($item->vat === 'on')
                  <span class="badge bg-success"><i class="fas fa-check"></i></span>
                  @else
                  <span class="badge bg-warning">X</span>
                  @endif
              </td>
          </tr>
          @endforeach
          @else
          <span class="text-danger">EMPTY!</span>
          @endif
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-6">
        <p class="lead">Payment Method: Cash</p>

        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
          
        </p>
      </div>
      <!-- /.col -->
      <div class="col-6">
        <p class="lead"></p>

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th>Total:</th>
              <td><b>{{$result['payment']['order'][0]['total']}}</b></td>
            </tr>
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- this row will not appear when printing -->
    <div class="row no-print">
      <div class="col-12">
        <form id="m-pesa-transaction-form" action="{{route('cash-transaction')}}" method="POST">
          @csrf
          <div>
            <input type="hidden" name="email" value="{{$result['payment']['order'][0]['email']}}">
            <input type="hidden" name="order_id" value="{{$result['payment']['order'][0]['order_id']}}">
            <input type="hidden" name="amount" value="{{$result['payment']['order'][0]['total']}}">
            <input type="hidden" name="type" value="cash">
          </div>
          <button type="submit" form="m-pesa-transaction-form" class="btn btn-success float-right"><i class="fa fa-credit-card"></i> Submit
            Payment
          </button>
        </form>
      </div>
    </div>
  </div>
  <!-- /.invoice -->
</div>
@endsection