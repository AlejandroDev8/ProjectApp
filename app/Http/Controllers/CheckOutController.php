<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CheckOutController extends Controller
{
    public function index()
    {
        $courses = Course::where('status', 2)->paginate(1);

        return view('checkout.index', compact('courses'));
    }

    public function createPaypalOrder()
    {
        $access_token = $this->generateAccesToken();

        $url = config('services.paypal.url') . "/v2/checkout/orders";

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => "Bearer " . $access_token,
        ])->withOptions([
            'verify' => storage_path('certs/cacert.pem'), // <== agregar esto
        ])->post($url, [
            'intent' => 'CAPTURE',
            'purchase_units' => [
                [
                    'amount' => [
                        'currency_code' => 'USD',
                        'value' => 30,
                        'breakdown' => [
                            'item_total' => [
                                'currency_code' => 'USD',
                                'value' => 30,
                            ],
                        ],
                    ],
                    'items' => [
                        [
                            'name' => 'Curso de Ejemplo',
                            'unit_amount' => [
                                'currency_code' => 'USD',
                                'value' => 30,
                            ],
                            'quantity' => 1,
                        ],
                    ],
                ],
            ],
        ])->json();

        return $response;
    }


    public function generateAccesToken()
    {
        $client_id = config('services.paypal.client_id');
        $secret = config('services.paypal.secret');

        $auth = base64_encode($client_id . ':' . $secret);
        $url = config('services.paypal.url') . "/v1/oauth2/token";

        $response = Http::withHeaders([
            'Authorization' => "Basic " . $auth,
        ])
            ->asForm()
            ->withOptions([
                'verify' => storage_path('certs/cacert.pem') // opcional si tienes errores SSL
            ])
            ->post($url, [
                'grant_type' => 'client_credentials',
            ]);

        return $response['access_token'];
    }
}
