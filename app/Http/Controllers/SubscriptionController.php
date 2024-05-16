<?php

namespace App\Http\Controllers;

use App\Mail\PurchaseMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL as FacadesURL;
use PharIo\Manifest\Url;
use Stripe\Checkout\Session;
use Stripe\Stripe;
use Stripe\StripeClient;

class SubscriptionController extends Controller
{
    const WEEKLY_AMOUNT = 'price_1OViiIKTWnNxqVqc9EyOsPJG';
    const MONTHLY_AMOUNT = 'price_1OVyQ6KTWnNxqVqcCaZAcKCY';
    const YEARLY_AMOUNT = 'price_1OVyRVKTWnNxqVqc4Ch3DI9l';
    const CURRENCY  = "USD";
    public function __construct()
    {
        $this->middleware(['auth', 'IsEmployer']);
        $this->middleware('NotAllowPayTwice')->except(['subindex']);

    }
    public function subindex()
    {
        return view('subscriptions.index');
    }

    public function intpayment(Request $request)
    {
        $plans = [
            'weekly' => [
                'name' => 'weekly',

                'price' => self::WEEKLY_AMOUNT,


                'quantity' => 1
            ],

            'monthly' => [
                'name' => 'monthly',

                'price' => self::MONTHLY_AMOUNT,

                'quantity' => 1
            ],

            'yearly' => [
                'name' => 'yearly',

                'price' => self::YEARLY_AMOUNT,

                'quantity' => 1
            ],
        ];

        Stripe::setApiKey(config('services.stripe.secret'));


        try {
            $selectedPlan = null;
            $billingEnds = null;

            if ($request->is('sub/weekly')) {
                $selectedPlan = $plans['weekly'];
                $billingEnds = now()->addWeek()->startOfDay()->toDateString();
            } elseif ($request->is('sub/monthly')) {
                $selectedPlan = $plans['monthly'];
                $billingEnds = now()->addMonth()->startOfDay()->toDateString();
            } elseif ($request->is('sub/yearly')) {
                $selectedPlan = $plans['yearly'];
                $billingEnds = now()->addYear()->startOfDay()->toDateString();
            }

            if ($selectedPlan) {
                $successUrl = FacadesURL::signedRoute('pay.success', [
                    'plan' => $selectedPlan['name'],
                    'billing_ends' => $billingEnds
                ]);


                $session = Session::create([
                    'payment_method_types' => ['card'],
                    'line_items' => [
                        [

                            'price' => $selectedPlan['price'],
                            'quantity' => 1,

                        ],
                    ],
                    'mode' => 'payment', // Specify 'payment' or 'subscription'// Specify 'payment' or 'subscription' mode
                    'success_url' =>  $successUrl,
                    'cancel_url' => route('pay.cancel'),
                ]);

                return redirect($session->url);
            }
        } catch (\Exception $e) {
            return $e;
        }
    }


    public function paymentSuccess(Request $request)
    {
        $billing_ends = $request->billing_ends;
        $plan = $request->plan;
        User::Where('id', auth()->user()->id)->update([
            'billing_ends' => $billing_ends,
            'user_trial'=>$billing_ends,
            'plan' => $plan,
            'status' => "paid success"
        ]);

        try {
            Mail::to(auth()->user())->queue(new PurchaseMail($billing_ends, $plan));
        }catch (\Exception $e) {
            return response()->json( $e);
        }


        return redirect(route('dashboard'))->with(['success' => 'success paymant']);
    }

    public function canncel()
    {
        return redirect(route('dashboard'))->with(['errorpayment' => 'error paymant']);
    }
}
