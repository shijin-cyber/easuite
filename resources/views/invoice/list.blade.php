@extends('layouts.sidebar')
@section('content')
<div class="container">

    <div class="card">
        <div class="card-body">
            Invoice Management
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
                <h4>Invoice Management</h4>
                <a href="{{ route('add-data', ['type' => 'invoice']) }}" class="btn btn-primary">Add Invoice</a>
            </div>
            <table id="customerTable" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>customer </th>
                        <th>Payment status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invoices as $invoice)
                    <tr>
                        <td>{{ $invoice->id }}</td>
                        <td>{{ $invoice->customer_name }}</td>
                        <td>
                            @if($invoice->status == 0)
                            Unpaid
                            @elseif($invoice->status == 1)
                            Paid
                            @elseif($invoice->status == 2)
                            Cancelled
                            @else
                            Unknown
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('/edit-invoice/'.$invoice->id) }}"
                                class="btn btn-sm btn-primary mt-2">Edit</a>
                            <form action="{{url('delete-invoice/'.$invoice->id)}}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger mt-2" onclick="
                            return confirm('Are you sure you want to delete this invoice?')">Delete</button>

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