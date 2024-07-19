@extends('layouts.app')
@section('app-layout')
<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Orders</h6>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Total</th>
                        <th scope="col">Transaction Type</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($result['order']) > 0)
                    @foreach($result['order'] as $item)
                    <tr>
                        <td>{{$item->email}}</td>
                        <td>{{$item->phone}}</td>
                        </td>
                        <td>{{$item->total}}</td>
                        <td>
                            @if($item->transaction_type === 'm-pesa')
                            <span class="badge bg-success">M - Pesa</span>
                            @elseif($item->transaction_type === 'cash')
                            <span class="badge bg-warning">Cash</span>
                            @endif
                        </td>
                        <td><a class="btn btn-sm btn-primary" href="{{route('order-show', $item->id)}}">View</a></td>
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