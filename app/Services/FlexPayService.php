<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FlexPayService
{
    protected string $bearerToken = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiIvbG9naW4iLCJyb2xlcyI6WyJNRVJDSEFOVCJdLCJleHAiOjE4NDk0MzQ3OTQsInN1YiI6IjRhMzU5YmI2MGU2OTZkNGU5NTBkMjQ0OGE5OTBlZTJiIn0.KSz9LLKnho23ld3IPkHedVCkrbdMk1xT4ceAczz3Ubw';
    protected string $merchantCode = 'UPAC';

    protected string $mobileMoneyUrl = 'https://backend.flexpay.cd/api/rest/v1/paymentService';
    protected string $cardPaymentUrl = 'https://cardpayment.flexpay.cd/v1.1/pay';
    protected string $checkOrderUrl = 'https://backend.flexpay.cd/api/rest/v1/check/';

    /**
     * Initialise un paiement Mobile Money (USSD Push)
     */
    public function payMobileMoney(string $phone, float $amount, string $reference, string $currency = 'USD', string $callbackUrl = null): array
    {
        $response = Http::withToken($this->bearerToken)
            ->post($this->mobileMoneyUrl, [
                'merchant'    => $this->merchantCode,
                'type'        => '1', // 1 pour Mobile Money
                'phone'       => $phone,
                'reference'   => $reference,
                'amount'      => (string) $amount,
                'currency'    => $currency,
                'callbackUrl' => $callbackUrl ?? route('flexpay.callback'),
            ]);

        return $response->json();
    }

    /**
     * Génère une session de paiement par Carte Bancaire (Redirection)
     */
    public function payCard(float $amount, string $reference, string $currency = 'USD', string $description = 'Paiement', ?string $callbackUrl = null): array
    {
        $response = Http::withToken($this->bearerToken)
            ->post($this->cardPaymentUrl, [
                'merchant'     => $this->merchantCode,
                'reference'    => $reference,
                'amount'       => (string) $amount,
                'currency'     => $currency,
                'description'  => $description,
                'callback_url' => $callbackUrl ?? route('flexpay.callback'),
                'approve_url'  => route('flexpay.approve'),
                'cancel_url'   => route('flexpay.cancel'),
                'decline_url'  => route('flexpay.decline'),
            ]);

        return $response->json();
    }

    /**
     * Vérifie l'état d'une transaction à partir de son orderNumber
     */
    public function checkTransaction(string $orderNumber): array
    {
        $response = Http::withToken($this->bearerToken)
            ->get($this->checkOrderUrl . $orderNumber);

        return $response->json();
    }
}