@extends('layouts.admin_page_layout')

@section('title')
    - Add Product
@endsection

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-12 mt-5">
          <div class="card">
            <img class="card-img-top" src="holder.js/100x180/" alt="" />
            <div class="card-body">
              <h3 class="card-title" style="text-align: center">Add Product</h3>
                <form method="POST" action="{{url('postProduct')}}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="productName">Product Name</label>
                  <input
                    class="form-control"
                    id="productName"
                    name="product_name"
                    placeholder="Product Name"
                  />

                  @if ($errors->has('product_name'))
                      <div class="alert alert-danger mt-3" role="alert">
                        {{$errors->first('product_name')}}
                      </div>
                  @endif

                </div>
                <div class="form-group">
                  <label for="productCategory">Product Category</label>
                  <select class="form-control" id="productCategory" name="product_category">
                    <option>-- Select Category --</option>
                    @foreach ($categories as $category)
                        <option>{{$category->category_name}}</option>
                    @endforeach
                  </select>

                  @if ($errors->has('product_category'))
                      <div class="alert alert-danger mt-3" role="alert">
                        {{$errors->first('product_category')}}
                      </div>
                  @endif

                </div>
                <div class="form-group">
                  <label for="productDescription">Product Description</label>
                  <textarea
                    class="form-control"
                    id="productDescription"
                    name="product_description"
                    placeholder="Product Description"
                  ></textarea>

                  @if ($errors->has('product_description'))
                      <div class="alert alert-danger mt-3" role="alert">
                        {{$errors->first('product_description')}}
                      </div>
                  @endif

                </div>
                <div class="form-group">
                  <label for="productPrice">Product Price</label>
                  <input
                    class="form-control"
                    id="productPrice"
                    name="product_price"
                    placeholder="Product Price"
                  />

                  @if ($errors->has('product_price'))
                      <div class="alert alert-danger mt-3" role="alert">
                        {{$errors->first('product_price')}}
                      </div>
                  @endif

                </div>
                <div class="form-group">
                  <label for="productImage">Choose Product Image File</label>
                  <input
                    type="file"
                    class="form-control-file"
                    id="productImage"
                    name="product_image"
                  />

                  @if ($errors->has('product_image'))
                      <div class="alert alert-danger mt-3" role="alert">
                        {{$errors->first('product_image')}}
                      </div>
                  @endif

                </div>

                @if (Session::has('success_message'))
                    <div class="alert alert-success mt-3" role="alert">
                        {{Session::get('success_message')}}
                      </div>
                @endif

                <div class="mt-4">
                  <button type="submit" class="btn btn-primary">
                    Add Product
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection