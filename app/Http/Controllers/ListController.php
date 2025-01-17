<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;
use App\Models\Invoice;
use DB;

class ListController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->get('type');

       
        if ($type === 'customer') {
            $data = Customer::all(); 
            return view('customer.list', ['customers' => $data]);
        } elseif ($type === 'invoice') {
            $data = DB::table('invoices')
            ->leftJoin('customers', 'invoices.customer_id', '=', 'customers.id')
            ->select(
            'invoices.*',
            'customers.name as customer_name',
           
        )
        ->get();

            return view('invoice.list', ['invoices' => $data]);
        } else {
            return abort(404, 'Invalid type provided.');
        }
    }
}