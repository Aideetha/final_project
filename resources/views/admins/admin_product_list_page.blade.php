@extends('layouts.admin_page_layout')

@section('title')
    - Product List
@endsection

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-12 mt-5">
          <div class="card">
            <img class="card-img-top" src="holder.js/100x180/" alt="" />
            <div class="card-body">
              <h2 class="card-title mt-4 mb-4" style="text-align: center">
                Product
              </h2>
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">Product ID</th>
                    <th scope="col">Product Image</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Product Price</th>
                    <th scope="col">Product Description</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    @if ($products->isEmpty())
                        <td colspan="6" style="text-align: center;">-- No Data --</td>
                    @else
                        @foreach ($products as $product)
                          <td>{{$product->product_id}}</td>
                          <td><img class="adminProductImage" src="{{asset($product->product_image)}}"></td>
                          <td>{{$product->product_name}}</td>
                          <td>{{$product->product_price}}</td>
                          <td>{{$product->product_description}}</td>
                          <td><a href="{{url('product/delete/'.$product->product_id)}}" class="btn btn-danger" role="button">Delete</a></td>
                        @endforeach
                    @endif                    
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection