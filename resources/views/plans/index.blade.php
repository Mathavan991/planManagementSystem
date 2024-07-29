@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between mb-3">
            <h2>Plans List</h2>
            <a class="btn btn-primary" href="{{ route('plans.create') }}">Create New Plan</a>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>Plan Type</th>
                <th>Price</th>
                <th>Duration</th>
                <th>Description</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($plans as $plan)
                <tr>
                    <td>{{ $plan->id }}</td>
                    <td>{{ $plan->plan_type }}</td>
                    <td>{{ $plan->price }}</td>
                    <td>{{ $plan->duration }}{{ " month" }}</td>
                    <td>{{ $plan->description }}</td>
                    <td>
                        <form action="{{ route('plans.destroy', $plan->id) }}" method="POST">
                            <a class="btn btn-info" href="{{ route('plans.show', $plan->id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('plans.edit', $plan->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
