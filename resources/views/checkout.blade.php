@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-4">
            <h2>CheckOut</h2>
            <ul class="list-group mb-3">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Plan Name :</h6>
                    </div>
                    <span class="text-muted">{{ $plan->plan_type }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Plan Description :</h6>
                    </div>
                    <span class="text-muted">{{ $plan->description }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Plan Price :</h6>
                    </div>
                    <span class="text-muted">{{ $plan->price }}</span>
                </li>
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <?php
                        $monthsToAdd = $plan->duration;
                        $date  = new DateTime();
                        $today = $date;
                        $today->modify("+{$monthsToAdd} months");
                        $futureDate = $today->format('Y-m-d');
                    ?>
                    <div>
                        <h6 class="my-0">Plan Duration :</h6>
                        <small class="text-muted"> End date : {{ $futureDate }}</small>
                    </div>
                    <span class="text-muted">{{ $plan->duration }}{{ " Month" }}</span>
                </li>
            </ul>
        </div>
        <div class="col-lg-8">
            <form action="{{ route('checkout.process') }}" method="POST" id="payment-form">
                @csrf
                <div class="form-group">
                    <label for="full_name">Full Name</label>
                    <input type="text" class="form-control" id="full_name" name="full_name" readonly required value="{{ Auth::user()->name }}">
                    <input type="hidden" name="user_id" required value="{{ Auth::user()->id }}">
                    <input type="hidden" name="plantype_id" required value="{{ $id }}">
                    <input type="hidden" name="plan_end_date" required value="{{ $futureDate }}">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" readonly required value="{{ Auth::user()->email }}">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Enter your address" required>
                </div>
                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="Enter your city" required>
                </div>
                <div class="form-group">
                    <label for="postal_code">Postal Code</label>
                    <input type="text" class="form-control" id="postal_code" name="postal_code" placeholder="Enter your postal code" required>
                </div>
                <div class="form-group">
                    <label for="phone_number">Phone Number</label>
                    <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Enter your phone number" required>
                </div>
                <div class="form-group">
                    <label for="card-element">Card Details</label>
                    <div id="card-element" class="form-control">
                        <!-- A Stripe Element will be inserted here. -->
                    </div>
                    <div id="card-errors" role="alert"></div>
                </div>
                <button type="submit" class="btn btn-primary">Proceed to Payment</button>
            </form>
        </div>
    </div>
</div>

<script src="https://js.stripe.com/v3/"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var stripe = Stripe('stripe-key'); 
    var elements = stripe.elements();
    var card = elements.create('card');
    card.mount('#card-element');
    card.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    var form = document.getElementById('payment-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault();

        stripe.createToken(card).then(function(result) {
            if (result.error) {
                var errorElement = document.getElementById('card-errors');
                errorElement.textContent = result.error.message;
            } else {
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', result.token.id);
                form.appendChild(hiddenInput);
                form.submit();
            }
        });
    });
});
</script>
@endsection
