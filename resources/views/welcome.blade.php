@extends('layouts.app')

@section('content')


        <h2 style="text-align:center;font-size: 34px;">Available Plans</h2>
        <div class="columns container">
            @foreach ($plans as $plan)
            <ul class="price">
                <li class="header">{{ $plan->plan_type }}</li>
                <li class="grey">{{ "$" }}{{ $plan->price }}</li>
                <li>{{ $plan->duration }} {{ " / Month"}}</li>
                <li>{{ $plan->description }}</li>
                @auth
                <li class="blue"><a href="{{url('/checkout/'. $plan->id)}}" class="btn btn-primary">Subscribe</a></li>
                 @else
                <li class="grey"><a href="#" class="button">Sign Up</a></li>
                @endauth
            </ul>
            @endforeach
        </div>
@endsection
       
