<!-- resources/views/transactions/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Transaction List</h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Phone Number</th>
                <th>Amount</th>
                <th>Plan Type</th>
                <th>Plan Start date</th>
                <th>Plan End date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->id }}</td>
                    <td>{{ $transaction->user_id }}</td>
                    <td>{{ $transaction->phone_number }}</td>
                    <td>{{ $transaction->amount }}</td>
                    <td>{{ $transaction->plantype_id }}</td>
                    <td>{{ $transaction->created_at }}</td>
                    <td>{{ $transaction->plan_end_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
