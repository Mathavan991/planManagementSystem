@extends('layouts.master')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between mb-3">
            <h2>Show Plan</h2>
            <a class="btn btn-primary" href="{{ route('plans.index') }}">Back</a>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>ID:</strong>
                    {{ $plan->id }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Plan Type:</strong>
                    {{ $plan->plan_type }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Price:</strong>
                    {{ $plan->price }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Duration:</strong>
                    {{ $plan->duration }} {{ " month" }}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>
                    {{ $plan->description }} 
                </div>
            </div>
        </div>
    </div>
@endsection
