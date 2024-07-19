@extends('layouts.app')
@section('app-layout')
@if(count($result['admin']) > 0)
<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">New Users</h6>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col">Id</th>
                        <th scope="col">Username</th>
                        <th scope="col">Email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($result['user']) > 0)
                    @foreach($result['user'] as $item)
                    <tr>
                        <td>1</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td><a class="btn btn-sm btn-danger" href="#">Delete</a></td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Recent Sales End -->
@else

@endif
@endsection