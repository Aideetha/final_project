<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    //
    public function showCustomerHomePage(){
        $products = Product::paginate(3);

        if(Auth::check()){
            $carts = Cart::where('user_id', Auth::id())->get();
            return view('customers.customer_home_page', ['products' => $products, 'carts' => $carts]);
        }else{
            return view('customers.customer_home_page', ['products' => $products]);
        }       
    }

    public function showProductDetailPage($productId){
        $product = Product::where('product_id', $productId)->first();
        $carts = Cart::where('user_id', Auth::id())->get();

        return view('customers.customer_product_details_page', ['product' =>$product, 'carts' => $carts]);
    }

    public function showCartPage(){
        $carts = Cart::where('user_id', Auth::id())->get();
        $products = Product::join('carts', 'carts.product_id', '=', 'products.product_id')->where('user_id', Auth::id())->get();

        return view('customers.customer_cart_page', ['carts' => $carts, 'products' => $products]);
    }

    public function addProductToCart(Request $request, $productId){
        $cart = new Cart();
        $cart->product_id = $productId;
        $cart->user_id = Auth::id();
        $cart->quantity = $request->input('quantity');

        $cart->save();

        return redirect(url('$okopedia'));
    }
}
