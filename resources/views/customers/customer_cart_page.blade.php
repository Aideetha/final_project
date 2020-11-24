@extends('layouts.customer_page_layout')

@section('content')
    <div class="container">
      <div class="row justify-content-center">
        @if ($products->isEmpty())
            <div class="card mt-4" style="width: 100%">
              <img class="card-img-top" src="holder.js/100x180/" alt="">
              <div class="card-body">
                <h2 class="card-title" style="text-align: center">-- No Data. --</h2>
              </div>
            </div>
          </div>
        @else
          @foreach ($products as $product)
          <div class="col-12 col-lg-6">
            <div class="card mt-4 noBorderRadius">
              <div class="fluid-container">
                <div class="row">                
                  
                  <div class="col-6">
                      <div class="card-body">
                          <img class="cartProductImage" src="{{url($product->product_image)}}">
                      </div>
                  </div>
                  <div class="col-6">
                    <div class="card-body cardPadding mt-3">
                      <h4 class="card-title">{{$product->product_name}}</h4>
                      <p class="card-text">Product Price: IDR.{{$product->product_price}}</p>
                      <form method="GET" action="{{url('cart/update-'.$product->product_id)}}">
                        @csrf
                        <div class="form-group row mx-auto">
                          <label for="quantity">Quantity: <span id={{'qtySpan'.$product->product_id}}>{{$product->quantity}}</span></label> 
                          <div class="col-6">
                            <input
                              type="text"
                              id={{'quantity'.$product->product_id}}
                              name="quantity"
                              min="1"
                              max="999"
                              value={{$product->quantity}}
                              style="width: 50px; display: none;"
                            />
                          </div>
                        </div>
                        <a href="{{url('cart/delete-'.$product->product_id)}}" role="button" class="btn btn-danger">Delete</a>
                        <button type="button" class="btn btn-success" onclick="edit({{$product->product_id}})">Edit</button>
                        <button id={{'updateButton'.$product->product_id}} type="submit" class="btn btn-primary" style="display: none">Update</button>
                      </form>
                      
                    </div>
                  </div>
                  
                  
                </div>
              </div>
            </div>
          </div>
          @endforeach
          </div>

          <div class="row justify-content-center">
            <div class="col-6">
                <a href="{{url('cart/checkout')}}" role="button" class="btn btn-danger mt-4">Checkout</a>
            </div>
          </div>
        @endif
    </div>
@endsection