@extends('layouts.app')
@section('app-layout')
<!-- Recent Sales Start -->
<div class="container-fluid pt-4 px-4">
  <div class="bg-light text-center rounded p-4">
      <div class="d-flex align-items-center justify-content-between mb-4">
      	<div class="row align-items-center g-lg-5 py-5">
        <div class="col-lg-7 text-center text-lg-start">
          <p class="col-lg-10 fs-4">
            <img src="/storage/pictures/{{$result['picture']}}" class="d-block mx-lg-auto img-fluid" alt="Jomaka Horizons Kenya" width="700" height="500" loading="lazy" style="border-radius: 8px;">
          </p>
          <p class="col-lg-10 fs-4">
            <h2>Description</h2>
            {{$result['description']}}<br>
          </p>
        </div>
        <div class="col-md-10 mx-auto col-lg-5">
          <table class="table text-start align-middle table-bordered table-hover mb-0">
            <tbody>
            	<tr class="text-dark">
                <td scope="col">Name: <b>{{$result['name']}}</b></td>
            	</tr>
                <td scope="col">Quantity: <b>{{$result['quantity']}}</b></td>
            	</tr>
            	<tr class="text-dark">
                <td scope="col">Price: <b>{{$result['price']}}</b></td>
            	</tr>
            	<tr class="text-dark">
                <td scope="col">Discount: <b>{{$result['discount']}}</b></td>
            	</tr>
            	<tr class="text-dark">
                <td scope="col">VAT: <b>{{$result['vat']}}</b></td>
            	</tr>
            	<tr class="text-dark">
                <td scope="col">Status: 
                	<b>
                		@if($result->status === '1')
                    <span class="badge bg-success">active</span>
                    @elseif($result->status === '0')
                    <span class="badge bg-danger">pending</span>
                    @endif
                	</b>
                </td>
            	</tr>
            	<tr class="text-dark">
            		<td>
	            		<div class="btn-group">
				          	<a href="{{route('product-edit', $result['id'])}}" class="btn btn-outline-warning">Edit</a>
				          	<form method="POST" action="{{route('product-delete', $result['id'])}}">
				          		@csrf
				          		@method('DELETE')
				          		<button type="submit" class="btn btn-danger">Delete</button>
				          	</form>
				          </div>
			        	</td>
            	</tr>
            </tbody>
          </table>
        </div>
      </div>
      </div>
    </div>
  </div>
@endsection