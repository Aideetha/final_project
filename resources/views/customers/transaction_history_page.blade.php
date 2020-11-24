@extends('layouts.customer_page_layout')

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="card mt-3">
            <div class="card-header cardHeader">Transaction History</div>
            <ul class="list-group list-group-flush">
                @foreach ($transactions as $transaction)
                    <li class="list-group-item">
                        <a class="btn btn-success" href="{{url('$okopedia/transaction-detail-'.$transaction->created_at)}}" role="button" style="width: 100%;">{{$transaction->created_at}}</a>
                    </li>
                @endforeach              
            </ul>
          </div>
        </div>
      </div>
    </div>
@endsection