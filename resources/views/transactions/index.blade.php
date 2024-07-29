@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Phone Number</th>
                <th>Amount</th>
                <th>Plan Type</th>
                <th>Plan Start date</th>
                <th>Plan End date</th>
            </tr>
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
        </table>
    </div>
@endsection
