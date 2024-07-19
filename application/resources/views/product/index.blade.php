@extends('layouts.app')
@section('app-layout')
<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Products</h6>
            <a href="{{route('product-create')}}">Create new</a>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col">Image</th>
                        <th scope="col">Name</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Amount</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($result['product']) > 0)
                    @foreach($result['product'] as $item)
                    <tr>
                        <td><img src="/storage/pictures/{{$item->picture}}" style="height: 48px; width: 48px;"></td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->quantity}}</td>
                        </td>
                        <td>{{$item->price}}</td>
                        <td>
                            @if($item->status === '1')
                            <span class="badge bg-success">active</span>
                            @elseif($item->status === '0')
                            <span class="badge bg-danger">pending</span>
                            @endif
                        </td>
                        <td><a class="btn btn-sm btn-primary" href="{{route('product-show', $item->id)}}">View</a></td>
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