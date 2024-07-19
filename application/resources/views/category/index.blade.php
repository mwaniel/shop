@extends('layouts.app')
@section('app-layout')
<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Categories</h6>
            <a href="{{route('category-create', ['0','category'])}}">Create new</a>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <thead>
                    <tr class="text-dark">
                        <th scope="col">Id</th>
                        <th scope="col">Category</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($result['category']) > 0)
                    @foreach($result['category'] as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->name}}</td>
                        <td>
                          <div class="btn-group">
                            <form id="{{$item->id}}" action="{{route('category-delete', $item->id)}}" method="POST">
                              @csrf
                              @method('DELETE')
                              <button type="submit" form="{{$item->id}}" class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                            <a href="{{route('category-create', [$item->id, 'sub-category'])}}" class="btn btn-sm btn-outline-warning">Add Sub-category</a>
                          </div>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                      <b class="text-danger">Empty!</b>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Recent Sales End -->
@endsection