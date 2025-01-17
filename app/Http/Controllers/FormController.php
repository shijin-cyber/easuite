<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class FormController extends Controller
{
    public function create(Request $request)
    {
        $type = $request->get('type');

        if ($type === 'customer') {
            return view('customer.create');
        } elseif ($type === 'invoice') {
            $data = Customer::all();
            return view('invoice.create',['customers' => $data]); 
        } else {
            return abort(404, 'Invalid type provided.');
        }
    }
}