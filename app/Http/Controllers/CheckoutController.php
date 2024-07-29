<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plan;
use App\Models\Order;
use Stripe\Stripe;
use Stripe\Charge;

class CheckoutController extends Controller
{
    public function show($id)
    {
        $plan = Plan::findOrFail($id);
        return view('checkout', compact('plan','id'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'postal_code' => 'required|string|max:10',
            'phone_number' => 'required|string|max:15',
            'plan_end_date' => 'required|date',
            'stripeToken' => 'required'
        ]);

        try {
            $plan = Plan::findOrFail($id);
            $amount = $plan->price;
            Stripe::setApiKey(env('STRIPE_SECRET'));
            
            $charge = Charge::create([
                'amount' => $amount * 100, 
                'currency' => 'INR',
                'source' => $request->input('stripeToken'),
                'description' => 'Order Payment',
                'receipt_email' => $request->input('email'),
            ]);

            $order = Order::create([
                'full_name' => $request->input('full_name'),
                'email' => $request->input('email'),
                'address' => $request->input('address'),
                'city' => $request->input('city'),
                'postal_code' => $request->input('postal_code'),
                'phone_number' => $request->input('phone_number'),
                'plan_end_date' => $request->input('plan_end_date'),
                'total_amount' => $amounts,
                'transactionid' => $charge->id,
                'userid' => auth()->id(),
                'plantype_id' => $request->input('plantype_id')
            ]);

            return redirect()->route('checkout.show')->with('success', 'Order placed successfully.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Error processing payment: ' . $e->getMessage()]);
        }
    }
}
