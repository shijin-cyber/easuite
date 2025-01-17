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
            <h4>Add Invoice</h4>
            <form method="POST" action="{{ route('invoice/store') }}">
                @csrf
                <div class="mb-3">
                    <label for="customer" class="form-label"> Customer</label>
                    <select class="form-select" name="customer_id" id="customer_id" aria-label="Default select example"
                        required>
                        <option disabled selected>Select Customer</option>
                        @foreach($customers as $customer)
                        <option value="{{$customer->id}}">{{$customer->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Date</label>
                    <input type="date" name="date" id="date" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="amount" class="form-label">Amount</label>
                    <input type="number" name="amount" id="amount" class="form-control" step="0.01"
                        placeholder="Enter amount" required>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" name="status" id="status" required>
                        <option value="" disabled selected>Select Status</option>
                        <option value="0">Unpaid</option>
                        <option value="1">Paid</option>
                        <option value="2">Cancelled</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">Add Customer</button>
            </form>
        </div>
    </div>
</div>
@endsection