<?php
namespace App\Http\Controllers;

use App\Models\TransaksiModel;
use App\Models\UserModel;
use App\Models\BarangModel;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Illuminate\Http\Request;

class PaypalController extends Controller

{
    public function index($idTransaksi)
    {
        $transaksi = TransaksiModel::find($idTransaksi);
        $user = UserModel::all();
        $barang = BarangModel::all();
        return view('payment')->with([
            'transaksi' => $transaksi,
            'user' => $user,
            'barang' => $barang,
        ]);
    }
    public function handlePayment(Request $request)
    {
        $amount = $request->input('amount');
        $amountInUSD = round($amount / 15000);
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('success.payment'),
                "cancel_url" => route('cancel.payment'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $amountInUSD
                    ]
                ]
            ]
        ]);
        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }
            return redirect()
                ->route('cancel.payment')
                ->with('error', 'Something went wrong.');
        } else {
            return redirect()
                ->route('create.payment')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    public function paymentCancel()
    {
        $errorMessage = 'You have canceled the transaction.';
        return redirect()
            ->route('create.payment')
            ->with('error', $errorMessage);
    }

    public function paymentSuccess(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            return redirect()
                ->route('create.payment')
                ->with('success', 'Transaction complete.');
        } else {
            return redirect()
                ->route('create.payment')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }
}