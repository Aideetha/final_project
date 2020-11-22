@extends('layouts.customer_page_layout')

@section('content')
    <div class="container">
      <div class="row">

        <div class="col-12 col-lg-6">
          <div class="card mt-4 noBorderRadius">
            <div class="fluid-container">
              <div class="row">

                @foreach ($products as $product)
                <div class="col-6">
                    <div class="card-body">
                        <img class="cartProductImage" src="{{url($product->product_image)}}">
                    </div>
                </div>
                <div class="col-6">
                  <div class="card-body cardPadding mt-3">
                    <h4 class="card-title">{{$product->product_name}}</h4>
                    <p class="card-text">Product Price: IDR.{{$product->product_price}}</p>
                    <p>Quantity: {{$product->quantity}}</p>
                    <button type="button" class="btn btn-danger">Delete</button>
                    <button type="button" class="btn btn-success">Edit</button>
                    <button type="button" class="btn btn-primary">Update</button>
                  </div>
                </div>
                @endforeach
                
              </div>
            </div>
          </div>
        </div>

      </div>

      <div class="row">
        <div class="col-6">
            <button type="button" class="btn btn-danger mt-4">Checkout</button>
        </div>
      </div>

    </div>
@endsection