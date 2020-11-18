@extends('layouts.admin_page_layout')

@section('title')
    - Category List
@endsection

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-12 mt-5">
          <div class="card">
            <img class="card-img-top" src="holder.js/100x180/" alt="" />
            <div class="card-body">
              <h2 class="card-title" style="text-align: center">Category</h2>
              <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 100%">
                    -- Select Category --
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="width: 100%">
                    @foreach ($categories as $category)
                        <a class="dropdown-item" href="{{url('category/'.$category->category_name)}}">{{$category->category_name}}</a>
                    @endforeach
                </div>
              </div>

              @if (Session::has('products'))
                <h2 class="card-title mt-4" style="text-align: center">
                    {{session('category')}}
                </h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Product ID</th>
                            <th scope="col">Product Image</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Product Price</th>
                            <th scope="col">Product Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (session('products')->isNotEmpty())
                          @foreach (session('products') as $product)
                            <tr>
                              <td>{{$product->product_id}}</td>
                              <td><img class="adminProductImage" src="{{asset($product->product_image)}}"></td>
                              <td>{{$product->product_name}}</td>
                              <td>{{$product->product_price}}</td>
                              <td>{{$product->product_description}}</td>
                            </tr>                                    
                          @endforeach                   
                        @else
                            <tr>
                              <td colspan="5" style="text-align: center;">-- No Data --</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                
                
              @endif

            </div>
          </div>
        </div>
      </div>
    </div>
@endsection