<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function store()
    {
        $customer = new Customer();
        $customer->customer_id = $this->generateCustomerId(); 
        $customer->name = request('name');
        $customer->email = request('email');
        $customer->phone = request('phone');
        $customer->address = request('address');
       
        $customer->save(); 
        return redirect()->route('list', ['type' => 'customer'])->with('success', 'Customer added successfully!');
    }

    /**
     * Generate a unique 10-digit customer ID.
     *
     * @return string
     */
    private function generateCustomerId()
    {
        do {
            $customerId = str_pad(mt_rand(1, 9999999999), 10, '0', STR_PAD_LEFT); 
        } while (Customer::where('customer_id', $customerId)->exists()); 

        return $customerId;
    }

    public function edit($id){
        $customer = Customer::find($id);
        return view('customer.edit', compact('customer'));
    }

    public function update ($id){
        $customer = Customer::find($id);
        $customer->name = request('name');
        $customer->email = request('email');
        $customer->phone = request('phone');
        $customer->address = request('address');
        $customer->customer_id = request('customer_id');
        $customer->save();
        return redirect()->route('list', ['type' => 'customer'])->with('success', 'customer updated successfully');
    }
    public function delete($id){
        $customer = Customer::find($id);
        $customer->delete();
        return redirect()->route('list', ['type' => 'customer'])->with('success', 'customer deleted successfully');
    }
}