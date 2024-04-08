<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeadRequest;
use App\Models\Lead;
use GuzzleHttp\Client;

class LeadController extends Controller
{
    /**
     * Создание лида.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createLead(LeadRequest  $request)
    {

        $name = $request->input('name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $partner_id = $request->input('partner_id');
        $product_id = $request->input('product_id');
        $product_price = $request->input('product_price');


        $lead = Lead::create([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'partner_id' => $partner_id,
            'product_id' => $product_id,
            'product_price' => $product_price,
        ]);


        // имитация отправки лида к примеру в стороннюю crm
        $client = new Client([
            'verify' => false,
        ]);

       $response = $client->post('https://webhook.site/2b181973-f72b-4d46-8434-7f60380c8952', [

           'json' => [
               'name' => $name,
               'email' => $email,
               'phone' => $phone,
               'product_price' => $product_price,
           ]
       ]);
       echo $response->getBody();


        $response = [
            'status' => 'success',
            'auto_login' => 'true',
            'lead' => $lead
        ];

        return response()->json($response);
        }

}


