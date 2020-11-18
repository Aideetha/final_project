@extends('layouts.customer_page_layout')

@section('content')
    <div class="container">
      <div class="row">

        @foreach ($products as $product)
            <div class="col-lg-4 col-12 mt-4">
                <div class="card">
                    <img class="card-img-top" src="holder.js/100x180/" alt="" />
                    <div class="card-body">
                    <img class="img-thumbnail productImage" src="{{asset($product->product_image)}}">
                    <h5 class="card-title cardTitle mt-2">{{$product->product_name}}</h5>
                    <p class="card-text">IDR. {{$product->product_price}}</p>
                    <div>
                        <a href="#" role="button" class="btn btn-success">
                            Product Detail
                        </a>
                    </div>
                    </div>
                </div>
            </div> 
        @endforeach       
         
      </div>

      <div class="row justify-content-center">
        <div class="mt-4">
            {!! $products->links() !!}
        </div>  
      </div>
    </div>
@endsection