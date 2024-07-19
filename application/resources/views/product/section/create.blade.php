@extends('layouts.app')
@section('app-layout')
<section class="container-fluid pt-4 px-4">
	<div class="bg-light rounded p-4">
		@include('alert.alert')
		<form action="{{route('product-store')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
          <label class="form-label">Product Category</label>
          <select class="form-control" name="category_id" required>
            <option value="">Select category</option>
            @if(count($result['category']) > 0)
            @foreach($result['category'] as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
            @endif
          </select>
      </div>
      <div class="form-group">
          <label class="form-label">Product Picture <small>[279 px by 364 px]</small> </label>
          <input type="file" name="picture" class="form-control" required>
      </div>
      <div class="form-group">
          <label class="form-label">Product Name</label>
          <input type="text" name="name" class="form-control" required>
      </div>
      <div class="form-group">
          <label class="form-label">Product Detail  <small>[250 words]</small></label>
          <textarea  name="description" class="form-control"></textarea>
      </div>
      <div class="form-group">
          <label for="exampleInputPassword1" class="form-label">Product Quantity</label>
          <input type="number" name="quantity" class="form-control" required>
      </div>
      <div class="form-group">
          <label class="form-label">Product Price</label>
          <input type="number" name="price" class="form-control" required>
      </div>
      <div class="form-group">
          <label class="form-label">Product Discount</label>
          <input type="number" name="discount" class="form-control" required>
      </div>
      <div class="form-group form-check">
        <label class="form-check-label">
          <input type="checkbox" name="vat" class="form-check-input">
        Collect VAT Tax?</label>
      </div>
      <button type="submit" class="btn btn-primary">Upload Product</button>
  </form>
	</div>
</section>
@endsection