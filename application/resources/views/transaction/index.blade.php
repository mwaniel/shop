@extends('layouts.app')
@section('app-layout')
<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Transactions</h6>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col">Order ID</th>
                        <th scope="col">Transaction Code</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Transaction Type</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($result['transaction']) > 0)
                    @foreach($result['transaction'] as $item)
                    <tr>
                        <td>{{$item->order_id}}</td>
                        <td>{{$item->transaction_code}}</td>
                        <td>{{$item->transaction_amount}}</td>
                        <td>{{$item->transaction_type}}</td>
                        <td>
                            @if($item->transaction_status === '1')
                            <span class="badge bg-success">complete</span>
                            @elseif($item->transaction_status === '0')
                            <span class="badge bg-warning">pending</span>
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
    </div>
</div>
<!-- Recent Sales End -->
@endsection