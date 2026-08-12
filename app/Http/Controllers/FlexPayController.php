<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admission;
use App\Services\FlexPayService;
use Illuminate\Support\Facades\Log;

class FlexPayController extends Controller
{
    /**
     * Webhook de confirmation (callback) envoyé par FlexPaie en tâche de fond
     */
    public function handleCallback(Request $request)
    {
        Log::info('Callback FlexPay reçu :', $request->all());

        $code = $request->input('code'); // 0 = Succès
        $orderNumber = $request->input('orderNumber');
        $reference = $request->input('reference');

        if ($orderNumber) {
            $admission = Admission::where('order_number', $orderNumber)
                ->orWhere('code', $reference)
                ->first();

            if ($admission) {
                if ($code == '0') {
                    $admission->update([
                        'payment_status' => 'paid',
                        'status'         => 'approved'
                    ]);
                    
                    // Envoi de l'email de confirmation
                    try {
                        \Illuminate\Support\Facades\Mail::to($admission->email)
                            ->send(new \App\Mail\AdmissionConfirmationMail($admission));
                    } catch (\Exception $e) {
                        Log::error("Échec d'envoi de l'email : " . $e->getMessage());
                    }
                } else {
                    $admission->update(['payment_status' => 'failed']);
                }
            }
        }

        return response()->json(['status' => 'received'], 200);
    }

    public function approve()
    {
        return redirect()->route('home')->with('success', 'Votre paiement a été effectué avec succès !');
    }

    public function cancel()
    {
        return redirect()->route('admission')->with('error', 'Le paiement a été annulé.');
    }

    public function decline()
    {
        return redirect()->route('admission')->with('error', 'Le paiement a échoué. Veuillez réessayer.');
    }
}