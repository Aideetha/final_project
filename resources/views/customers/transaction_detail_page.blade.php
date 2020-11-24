@extends('layouts.customer_page_layout')

@section('content')
    <div class="container">
      <h1 class="mt-5" style="color: rgb(3, 172, 14)">Detail Transaction</h1>
      <hr class="mb-0">
      <div class="row">
        
        @foreach ($products as $product)
        <div class="col-lg-6">
          <div class="card mt-4 noBorderRadius">
            <div class="fluid-container">
              <div class="row">
                <div class="col-12 col-md-6">
                  <div class="card-body">
                    <img
                      class="cartProductImage"
                      src="{{asset($product->product_image)}}"
                    />
                  </div>
                </div>
                <div class="col-12 col-md-6">
                  <div class="card-body cardPadding mt-3">
                    <h4 class="card-title">{{$product->product_name}}</h4>
                    <p class="card-text">Product Price: IDR.{{$product->product_price}}</p>
                    <p>Quantity: {{$product->quantity}}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach        

      </div>
    </div>
@endsection