@extends('layouts.customer_page_layout')

@section('content')
    <div class="container">
      <div class="row mt-5">
        <div class="col-lg-7 pl-0 pr-0">
          <div class="card noBorder noBorderRadius align-items-center detailBox">
            <img
              class="productImage mt-4 mb-4"
              src="{{asset($product->product_image)}}"
            />
          </div>
        </div>
        <div class="col-lg-5 pl-0 pr-0">
          <div class="card detailBox noBorder noBorderRadius" style="background-color: #f8f9fa">
            <img class="card-img-top" src="holder.js/100x180/" alt="" />
            <div class="card-body" style="padding:2.5rem">
              <h4 class="card-title">{{$product->product_name}}</h4>
              <hr />
              <h5 class="card-text">
                Price: <span class="productPrice">IDR.{{$product->product_price}}</span>
              </h5>
              <hr />
              <p>Description: {{$product->product_description}}</p>
              <form method="GET" action="{{url('cart/addToCart-'.$product->product_id)}}">
                @csrf
                <div class="form-group">
                  <label for="quantity">Quantity</label>
                  <input
                    type="number"
                    id="quantity"
                    name="quantity"
                    min="1"
                    max="999"
                    value="1"
                  />
                </div>
                <div class="mt-3">
                  <button type="submit" class="btn btn-success">
                    Add to Cart
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection