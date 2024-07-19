@extends('layouts.app')
@section('app-layout')
<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
  <div class="bg-light text-center rounded p-4">
      <div class="d-flex align-items-center justify-content-between mb-4">
      	<form action="{{route('product-update', $result['product']['id'])}}" method="POST" enctype="multipart/form-data">
      		@csrf
      		@method('PATCH')
	      	<div class="row align-items-center g-lg-5 py-5">
		        <div class="col-lg-7 text-center text-lg-start">
		          <p class="col-lg-10 fs-4">
		            <img src="/storage/pictures/{{$result['product']['picture']}}" class="d-block mx-lg-auto img-fluid" alt="Jomaka Horizons Kenya" width="700" height="500" loading="lazy" style="border-radius: 8px;">
		            <input type="file" class="form-control" name="picture" required>
		          </p>
		          <p class="col-lg-10 fs-4">
		            <h2>Description</h2>
		            <textarea name="description" class="form-control">{{$result['product']['description']}}</textarea>
		            <br>
		          </p>
		        </div>
		        <div class="col-md-10 mx-auto col-lg-5">
		          <table class="table text-start align-middle table-bordered table-hover mb-0">
		            <tbody>
		            	<tr class="text-dark">
		                <td scope="col">Category: 
		                	<select class="form-control" name="category_id" required>
						            <option value="{{$result['category']['id']}}">{{$result['category']['name']}}</option>
						          </select>
		                </td>
		            	</tr>
		            	<tr class="text-dark">
		                <td scope="col">Sub-category: 
		                	<select class="form-control" name="sub_category_id" required>
						            <option value="0">Select sub - category</option>
						            @if(count($result['sub-category']) > 0)
						            @foreach($result['sub-category'] as $item)
						            <option value="{{$item->id}}">{{$item->name}}</option>
						            @endforeach
						            @endif
						          </select>
		                </td>
		            	</tr>
		            	<tr class="text-dark">
		                <td scope="col">Name: <input type="text" class="form-control" value="{{$result['product']['name']}}" name="name"></td>
		            	</tr>
		                <td scope="col">Quantity: <input type="number" class="form-control" value="{{$result['product']['quantity']}}" name="quantity"></td>
		            	</tr>
		            	<tr class="text-dark">
		                <td scope="col">Price: <input type="number" class="form-control" value="{{$result['product']['price']}}" name="price"></td>
		            	</tr>
		            	<tr class="text-dark">
		                <td scope="col">Discount: <input type="number" class="form-control" value="{{$result['product']['discount']}}" name="discount"></td>
		            	</tr>
		            	<tr class="text-dark">
		                <td scope="col">VAT: 
		                	<select name="vat" class="form-control">
		                		@if($result['product']['vat'] === 'on')
		                    <option value="on">ON</option> 
		                    <option value="">Off</option>
		                    @else
		                    <option value="">Off</option>
		                    <option value="on">On</option> 
		                    @endif
		                	</select>
		                </td>
		            	</tr>
		            	<tr class="text-dark">
		                <td scope="col">Status: 
		                	<select name="status" class="form-control">
		                		@if($result['product']->status === '1')
		                    <option value="1">Active</option> 
		                    <option value="0">Pending</option>
		                    @elseif($result['product']->status === '0')
		                    <option value="0">Pending</option>
		                    <option value="1">Active</option> 
		                    @endif
		                	</select>
		                </td>
		            	</tr>
		            	<tr class="text-dark">
		            		<td>
			            		<div class="btn-group">
						          	<button type="submit" class="btn btn-outline-info">Update Details</button>
						          </div>
					        	</td>
		            	</tr>
		            </tbody>
		          </table>
		        </div>
		      </div>
    		</form>
      </div>
    </div>
  </div>
@endsection