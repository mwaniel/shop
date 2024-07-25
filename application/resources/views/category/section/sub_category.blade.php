@extends('layouts.app')
@section('app-layout')
<section class="container-fluid pt-4 px-4">
	<div class="bg-light rounded p-4">
		@include('alert.alert')
		<form action="{{route('category-store', 'sub-category')}}" method="POST">
        @csrf
        <div>
        	<input type="hidden" name="category_id" value="{{$result['category']['id']}}">
        </div>
        <div class="form-group">
            <label class="form-label">Sub - Category Name</label>
            <input type="text" name="name" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Upload Sub - Category</button>
    </form>
	</div>
</section>
@endsection