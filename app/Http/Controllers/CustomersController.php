<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomersController extends Controller
{
    //
    public function add(Request $request){
    $this->validate($request,[
        'fullName' => 'required',
        'prof' => 'required'
    ]);
        $newCustomer = new Customer;
        $newCustomer->name = $request->input('fullName');
        $newCustomer->profession = $request->input('prof');
        $newCustomer->save();
        return redirect('/customers');
    }
}

