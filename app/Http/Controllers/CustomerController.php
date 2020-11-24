<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use App\TransactionHistory;
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

    //-----------------------------------------------------------
    //Cart
    //-----------------------------------------------------------
    public function showCartPage(){
        $carts = Cart::where('user_id', Auth::id())->get();
        $products = Product::join('carts', 'carts.product_id', '=', 'products.product_id')->where('user_id', Auth::id())->get();

        return view('customers.customer_cart_page', ['carts' => $carts, 'products' => $products]);
    }

    public function addProductToCart(Request $request, $productId){
        $cart = new Cart();
        $products = Product::join('carts', 'carts.product_id', '=', 'products.product_id')->where('user_id', Auth::id())->get();
        $productIsExist = $this->checkIfProductExist($products, $productId);
        
        if($productIsExist){
            $this->updateProduct($productId, $request->input('quantity'));
        }else{
            $cart->product_id = $productId;
            $cart->user_id = Auth::id();
            $cart->quantity = $request->input('quantity');

            $cart->save();
        }       

        return redirect(url('$okopedia'));
    }

    public function updateProduct($productId, $addedQuantity){
        $cart = $cart = $this->findProductInCartByProductIdAndUserId($productId, Auth::id());
        $cart->quantity += $addedQuantity;

        $cart->save();
    }

    public function updateProductQuantity(Request $request, $productId){
        $cart = $cart = $this->findProductInCartByProductIdAndUserId($productId, Auth::id());
        $cart->quantity = $request->quantity;

        $cart->save();

        return redirect(url('$okopedia/cart'));
    }

    public function deleteProductFromCart($productId){
        $cart = $cart = $this->findProductInCartByProductIdAndUserId($productId, Auth::id());
        $cart->delete();

        return redirect(url('$okopedia/cart'));
    }

    //-----------------------------------------------------------
    //Transaction History
    //-----------------------------------------------------------
    public function showTransactionHistoryPage(){
        $carts = Cart::where('user_id', Auth::id())->get();
        $transactions = TransactionHistory::distinct()->where('user_id', Auth::id())->get(['created_at']);

        return view('customers.transaction_history_page', ['carts' => $carts, 'transactions' => $transactions]);
    }

    public function showTransactionDetailPage($createdAt){
        $carts = Cart::where('user_id', Auth::id())->get();
        $products = TransactionHistory::join('products', 'products.product_id', '=', 'transaction_histories.product_id')->where([['user_id', Auth::id()], ['transaction_histories.created_at', $createdAt]])->get();

        return view('customers.transaction_detail_page', ['carts' => $carts, 'products' => $products]);
    }
    
    public function checkoutTransaction(){
        $carts = Cart::where('user_id', Auth::id())->get();

        foreach($carts as $cart){
            $transaction = new TransactionHistory();
            $transaction->product_id = $cart->product_id;
            $transaction->user_id = Auth::id();
            $transaction->quantity = $cart->quantity;

            $transaction->save();
            $cart->delete();
        }

        return redirect(url('$okopedia/cart'));
    }
    
    private function findProductInCartByProductIdAndUserId($productId, $userId){
        return Cart::firstWhere([['user_id', $userId], ['product_id', $productId]]);
    }

    private function checkIfProductExist($productList, $productIdToFind){
        foreach($productList as $product){
            if($product->product_id == $productIdToFind){
                return true;
            }
        }
        return false;
    }
}
