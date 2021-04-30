<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Customer;
use App\Sale;
use App\Cart;

class PagesController extends Controller
{
    public function dashboard(){
        $numOfProduct = count(Product::all());
        $numOfCustomer = count(Customer::all());
        $amountRow = Sale::all('amount');
        $totalSell = 0;

        foreach($amountRow as $amount){
            $totalSell = $totalSell + $amount->amount;
        }

        $dash = array("numOfProduct"=>"$numOfProduct","numOfCustomer"=>"$numOfCustomer","totalSell"=> "$totalSell");
        return view('pages.dashboard')->with("dash",$dash);
    }

//post to product controller and redirect via page controller
    public function sales(){
        $products = Product::all();
        $carts = Cart::all();
        $customers = Customer::all();
        return view('pages.sales')->with('products', $products)->with('carts', $carts)->with('customers', $customers);
    }

//post to product controller and redirect via page controller
    public function products(){
        $products = Product::all();
        return view('pages.products')->with('products', $products);
    }

    public function customers(){
        $customers = Customer::all();
        return view('pages.customers')->with('customers', $customers);
    }
    public function user(){
        return view('pages.user');
    }
}

