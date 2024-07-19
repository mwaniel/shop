@extends('layouts.app')
@section('app-layout')
<section class="container-fluid pt-4 px-4">
	<div class="bg-light rounded p-4">
		@include('alert.alert')
		<form action="{{route('category-store', 'category')}}" method="POST">
      @csrf
      <div class="form-group">
          <label class="form-label">Category Name</label>
          <input type="text" name="name" class="form-control">
      </div>
      <button type="submit" class="btn btn-primary">Upload Category</button>
  </form>
	</div>
</section>
@endsection