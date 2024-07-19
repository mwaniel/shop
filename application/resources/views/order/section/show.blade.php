@extends('layouts.app')
@section('app-layout')
<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Invoice</h6>
        </div>
        <div class="table-responsive">
            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    
                  </h4>
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
                    <strong>{{$result['order']['username']}}</strong><br>
                    County: {{$result['order']['country']}}<br>
                    Address: {{$result['order']['address']}}<br>
                    Phone: {{$result['order']['phone']}}<br>
                    Email: {{$result['order']['email']}}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Date: @php echo date('d/m/y'); @endphp</b><br>
                  <br>
                  <b>Order ID:</b> JHK_{{$result['order']['order_id']}}<br>
                  <b>Account:</b> {{$result['order']['phone']}}<br>
                  @if($result['transaction'][0]['transaction_status'] === '1')
                  <div class="ribbon-wrapper ribbon-xl">
                    <div class="ribbon bg-success text-xl">
                      PAID
                    </div>
                  </div>
                  @elseif($result['transaction'][0]['transaction_status'] === '0')
                  <div class="ribbon-wrapper ribbon-xl">
                    <div class="ribbon bg-warning text-xl">
                      PAYMENT PENDING
                    </div>
                  </div>
                  @endif
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
                      <th>Amount</th>
                      <th>VAT</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($result['order-item']) > 0)
                    @foreach($result['order-item'] as $item)
                    <tr>
                        <td>{{$item->name}}</td>
                        <td>{{$item->quantity}}</td>
                        <td>{{$item->amount}}</td>
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
                  <p class="lead">Payment Method: {{$result['transaction'][0]['transaction_type']}}</p>

                  <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                    
                  </p>
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">{{$result['order']['total']}}</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tr>
                        <th>Total:</th>
                        <td>{{$result['order']['total']}}</td>
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
                  <a href="#" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                    <i class="fas fa-download"></i> Generate PDF
                  </button>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
        </div>
    </div>
</div>
<!-- Recent Sales End -->
@endsection