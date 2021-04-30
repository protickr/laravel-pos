<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    public function delete($id){
        $toDelete = Product::find($id);
        $toDelete->delete();
        return redirect('/products');
    }

    public function add(Request $request){
        $this->validate($request,[
            'brandnm' => 'required',
            'genericnm' => 'required',
            'catdesc' => 'required',
            'arrival' => 'required',
            'exp' => 'required',
            'sellpric' => 'required',
            'originpric' => 'required',
            'qty' => 'required'
        ]);

        $newProduct = new Product;
        $newProduct->brandnm = $request->input('brandnm');
        $newProduct->genericnm = $request->input('genericnm');
        $newProduct->catdesc = $request->input('catdesc');
        $newProduct->arrival = $request->input('arrival');
        $newProduct->exp = $request->input('exp');
        $newProduct->sellpric = $request->input('sellpric');
        $newProduct->originpric = $request->input('originpric');
        $newProduct->qty = $request->input('qty');
        $newProduct->qtyleft = $request->input('qty');
        $newProduct->created_at = time();
        $newProduct->updated_at = time();
        $newProduct->save();
        return redirect('/products');
    }
}

