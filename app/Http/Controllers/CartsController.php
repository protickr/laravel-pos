<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Product;
use App\Sale;
use App\invcart;
use PDF;
class CartsController extends Controller
{
    public function add(Request $request){
        $cart = new Cart;
        $cart->productid = $request->input('product');
        $cart->qty = $request->input('qty');

        //retrieving product using id to calculate
        $targetProduct = Product::find($cart->productid);

        $cart->brandnm = $targetProduct->brandnm;
        $cart->genericnm = $targetProduct->genericnm;
        $cart->catdesc = $targetProduct->catdesc;
        $cart->price = $targetProduct->sellpric;
        $cart->amount = $cart->price * $cart->qty;
        $cart->profit = $cart->qty * ( $cart->price - $targetProduct->originpric);
        $cart->save();
        return redirect('/sales');
    }

    public function delete($id){
        $toDelete = Cart::find($id);
        $toDelete->delete();
        return redirect('/sales');
    }


    public function checkout(Request $request){

        invcart::truncate();
        $sellingItems = Cart::all();
        $carts = Cart::all();//invoice copy
        $customersName = $request->input('customer');

        if(count($sellingItems) > 0){
            foreach($sellingItems as $sellingItem){
                $invoiceCart = new invcart;

                //adding recored to sell
                $salesEntry = new Sale;
                $salesEntry->productid =  $sellingItem->productid;
                $salesEntry->brandnm = $sellingItem->brandnm;
                $salesEntry->genericnm = $sellingItem->genericnm;
                $salesEntry->catdesc = $sellingItem->catdesc;
                $salesEntry->price = $sellingItem->price;
                $salesEntry->qty = $sellingItem->qty;
                $salesEntry->amount = $sellingItem->amount;
                $salesEntry->profit = $sellingItem->profit;
                $salesEntry->created_at = time();
                $salesEntry->updated_at = time();
                $salesEntry->save();

                //updating invoice
                $invoiceCart->productid = $sellingItem->productid;
                $invoiceCart->qty = $sellingItem->qty;
                $invoiceCart->brandnm = $sellingItem->brandnm;
                $invoiceCart->genericnm = $sellingItem->genericnm;
                $invoiceCart->catdesc = $sellingItem->catdesc;
                $invoiceCart->price = $sellingItem->price;
                $invoiceCart->amount = $sellingItem->amount;
                $invoiceCart->profit = $sellingItem->profit;
                $invoiceCart->save();

                //updating product count
                $itemProductTable = Product::find($sellingItem->productid);

                //var_dump($itemProductTable);
                $itemProductTable->qtyleft = $itemProductTable->qtyleft - $sellingItem->qty;
                $itemProductTable->save();
            }

            $total = 0;
            foreach($carts as $cart){
                $total += $cart->amount;
            }
            Cart::truncate(); //clearing the cart; removing record from cart
            return view('pages.invoice')->with('carts', $carts)->with('customerName', $customersName)->with('total', $total);
        }
    }

    public function invoice(Request $request){
        $customerName = $request->input('customersName');
        $carts = invcart::all();
        $total = 0;
        foreach($carts as $cart){
            $total += $cart->amount;
        }
        $pdf = PDF::loadView('pages.printvoice', compact('carts', 'customerName','total'));
        return $pdf->download('invoice.pdf');
    }
}
