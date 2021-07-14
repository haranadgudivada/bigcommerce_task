<?php

namespace App\Http\Controllers;
use Bigcommerce\Api\Client;
use Illuminate\Routing\Controller as BaseController;

class CustomerDetailsController extends BaseController
{
    public function show($id)
    {
        $order_history=null;
        $customer_details = Client:: getCustomer($id);
        //print_r($customer_details); exit;
        if($customer_details)
        {
            $customer_filter = array("customer_id" => $id);
            $order_history = Client:: getOrders($customer_filter);

            return view('details', [
                'customer_details' => $customer_details,
                'order_history' => $order_history
            ]);
        }
        else
        {
            return redirect('customers');
        }  
    }
}
