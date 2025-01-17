@extends('layouts.sidebar')
@section('content')
<div class="container">

    <div class="card">
        <div class="card-body">
            Customer Management
        </div>
    </div>
    <div class="card mt-4">
        <div class="card-body">
            <h4>Add Customer</h4>
            <form method="POST" action="{{ route('customer/store') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" name="phone" id="phone" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea name="address" id="address" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-success">Add Customer</button>
            </form>
        </div>
    </div>
</div>
@endsection