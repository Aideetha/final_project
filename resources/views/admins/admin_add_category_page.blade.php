@extends('layouts.admin_page_layout')

@section('title')
    - Add Category
@endsection

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-12 mt-5">
          <div class="card">
            <img class="card-img-top" src="holder.js/100x180/" alt="" />
            <div class="card-body">
              <h3 class="card-title" style="text-align: center">Add Category</h3>
              <form method="POST" action="{{url('postCategory')}}">
                @csrf
                <div class="form-group">
                  <label for="categoryName">Input New Category</label>
                  <input
                    class="form-control"
                    name="category_name"
                    id="categoryName"
                    placeholder="New Category"
                  />

                  @if ($errors->has('category_name'))
                      <div class="alert alert-danger mt-3" role="alert">
                        {{$errors->first('category_name')}}
                      </div>
                  @endif

                  @if (Session::has('success_message'))
                      <div class="alert alert-success mt-3" role="alert">
                        {{Session::get('success_message')}}
                      </div>
                  @endif

                </div>
                <div class="mt-4">
                  <button type="submit" class="btn btn-primary">
                    Add Category
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection