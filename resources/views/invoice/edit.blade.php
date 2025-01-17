@extends('layouts.sidebar')
@section('content')
<div class="container">

    <div class="card">
        <div class="card-body">
            Invoice Management
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-body">
            <h4>Edit Invoice</h4>
            <form method="POST" action="{{ url('invoice/update', $invoice->id) }}">
                @csrf
                <div class="mb-3">
                    <label for="customer" class="form-label"> Customer</label>
                    <select class="form-select" name="customer_id" id="customer_id" aria-label="Default select example"
                        required>
                        <option disabled>Select Customer</option>
                        @foreach($customers as $customer)
                        <option value="{{ $customer->id }}"
                            {{ $customer->id == $invoice->customer_id ? 'selected' : '' }}>
                            {{ $customer->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" name="date" id="date" class="form-control" value="{{ $invoice->date }}" required>
                </div>
                <div class="mb-3">
                    <label for="amount" class="form-label">Amount</label>
                    <input type="number" name="amount" id="amount" class="form-control" step="0.01"
                        placeholder="Enter amount" value="{{ $invoice->amount }}" required>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" name="status" id="status" required>
                        <option value="0" {{ $invoice->status == 0 ? 'selected' : '' }}>Unpaid</option>
                        <option value="1" {{ $invoice->status == 1 ? 'selected' : '' }}>Paid</option>
                        <option value="2" {{ $invoice->status == 2 ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Update Invoice</button>
            </form>
        </div>
    </div>
</div>
@endsection