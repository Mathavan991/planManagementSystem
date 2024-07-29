<!-- resources/views/profile/show.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Profile Details</h1>
    <div class="card">
        <div class="card-header">
            {{ $user->name }}
        </div>
        <div class="card-body">
            <ul>
                <li><strong>Email:</strong> {{ $user->email }}</li>
                <li><strong>Address:</strong> {{ $user->address }}</li>
            </ul>
        </div>
    </div>
</div>
@endsection
