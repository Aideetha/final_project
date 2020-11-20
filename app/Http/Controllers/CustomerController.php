<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    //
    public function showCustomerHomePage(){
        return view('layouts.customer_page_layout');
    }
}
