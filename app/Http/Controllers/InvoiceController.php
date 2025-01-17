<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Customer;

class InvoiceController extends Controller
{
    public function store(){
        $invoice = new Invoice();
        $invoice->customer_id = request('customer_id');
        $invoice->invoice_id = $this->generateInvoiceId();
        $invoice->amount = request('amount');
        $invoice->date = request('date');
        $invoice->status = request('status');
        $invoice->save();
        return redirect()->route('list', ['type' => 'invoice'])->with('success', 'Invoice added successfully!');

    }
      /**
     * Generate a unique 10-digit customer ID.
     *
     * @return string
     */
    private function generateInvoiceId()
    {
        do {
            $invoiceId = str_pad(mt_rand(1, 9999999999), 10, '0', STR_PAD_LEFT); 
        } while (Invoice::where('invoice_id', $invoiceId)->exists()); 

        return $invoiceId;
    }

    public function edit($id){
        $invoice = Invoice::find($id);
        $customers = Customer::all();
        return view('invoice.edit', compact('invoice','customers'));
    }

    public function update($id){
        $invoice = Invoice::find($id);
        $invoice->customer_id = request('customer_id');
        $invoice->amount = request('amount');
        $invoice->date = request('date');
        $invoice->status = request('status');
        $invoice->save();
        return redirect()->route('list', ['type' => 'invoice'])->with('success', 'Invoice updated successfully');
    }

    public function delete($id){
        Invoice::destroy($id);
        return redirect()->route('list', ['type' => 'invoice'])->with('success', '
        Invoice deleted successfully');
    }
}