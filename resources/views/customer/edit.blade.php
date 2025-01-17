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
            <form method="POST" action="{{url('customer/update/'.$customer->id)}}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" value="{{$customer->name}}" id="name" class="form-control" required>
                    <input type="hidden" value="{{$customer->customer_id}}" name="customer_id">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" value="{{$customer->phone}}" name="phone" id="phone" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" value="{{$customer->email}}" id="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea name="address" value="{{$customer->address}}" id="address"
                        class="form-control">{{$customer->address}}</textarea>
                </div>
                <button type="submit" class="btn btn-success">Edit Customer</button>
            </form>
        </div>
    </div>
</div>
@endsection