<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\clients;
use App\Models\Finance;
use App\Models\sites;
use App\Services\PermissionService;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Support\Facades\Redirect;
use Stripe;
use Session;

class FinanceController extends Controller
{


    public function financeList()
    {
        $content_title = 'Finances';
        $main_content  = 'Finances';
        $activepage    =  25;
        $user_id = auth()->user()->id;
        $logs = Finance::with('publisher')->get();
        $role = (new PermissionService)->userPermissions();
        $superAdmin = $role['superAdmin'];
        $permissions = $role['permissions'];

        return view('admin.finance.financeList', compact('content_title', 'main_content', 'activepage', 'logs', 'superAdmin', 'permissions'));
    }

    public function publisherPayment($id)
    {

        $content_title = 'Finances List';
        $main_content  = 'Add Funds';
        $activepage    =  25;
        $user_id = auth()->user()->id;
        $logs = Finance::with('publisher')->get();
        $role = (new PermissionService)->userPermissions();
        $superAdmin = $role['superAdmin'];
        $permissions = $role['permissions'];
        $client = Clients::find($id);

        return view('admin.finance.add_funds', compact('content_title', 'main_content', 'activepage', 'logs', 'superAdmin', 'permissions', 'client'));
    }

    public function stripePayment(Request $request)
    {

        Stripe\Stripe::setApiKey(config('payment.stripe_private_key'));
        $data =   Stripe\Charge::create([
            "amount" => $request->amount * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Adds Payment."
        ]);


        if ($data->status == 'succeeded') {
            $financeLog = new Finance();
            $financeLog->publisher_id =  $request->publisher_id;
            $financeLog->payment_amount =  $request->amount;
            $financeLog->payment_status =  $data->status;
            $financeLog->payment_type =  'stripe_payment';
            $financeLog->transaction_id =  $data->id;
            $financeLog->save();

            return redirect()->back()->with('success', 'Payment Done Successfully.');
        } else {
            $financeLog = new Finance();
            $financeLog->publisher_id =  $request->publisher_id;
            $financeLog->payment_amount =  $request->amount;
            $financeLog->payment_status =  'false';
            $financeLog->payment_type =  'stripe_payment';
            $financeLog->transaction_id =  '';
            $financeLog->save();
            return redirect()->back()->with('error', 'Payment Done Successfully.');
        }
    }
}
