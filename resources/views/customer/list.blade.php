@extends('layouts.sidebar')
@section('content')
<div class="container">

    <div class="card">
        <div class="card-body">
            Customer Management
        </div>
    </div>
    @if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
    @endif
    @if(session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
    @endif
    <div class="card mt-4">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h4>Customer Management</h4>
                <a href="{{ route('add-data', ['type' => 'customer']) }}" class="btn btn-primary">Add Customer</a>
            </div>
            <table id="customerTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>customer Id</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                    <tr>
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->customer_id }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>
                            <a href="{{ url('/edit-customer/'.$customer->id) }}"
                                class="btn btn-sm btn-primary mt-2">Edit</a>
                            <form action="{{url('delete-customer/'.$customer->id)}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger mt-2" onclick="
                            return confirm('Are you sure you want to delete this customer?')">Delete</button>

                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection