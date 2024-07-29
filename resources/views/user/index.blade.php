@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Mail Id</th>
                <th>User Name</th>
            </tr>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->name }}</td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
