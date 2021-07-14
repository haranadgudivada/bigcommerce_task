<?php

namespace App\Http\Controllers;
use Bigcommerce\Api\Client;
use Illuminate\Routing\Controller as BaseController;

class CustomersController extends BaseController
{
    public function index($id = null)
    {
        $customers_info=array(); $prev_page=null; $next_page=null; $totalPages=null;

        $customersCount = Client::getCustomersCount();
        if($customersCount > 0)
        {
            $totalPages = ceil($customersCount / 10);
            if($id > 0) { $current_page = $id; } else { $current_page=1; }
            if($current_page > 1) { $prev_page = $current_page - 1; } else { $prev_page = 1; }
            if($totalPages == $current_page) { $next_page = $totalPages; } else { $next_page = $current_page + 1; }
            


            $customers_filter = array("page" => $current_page, "limit" => 10);
            $customers = Client::getCustomers($customers_filter);
            if($customers)
            {
                foreach($customers as $customer)
                {
                    $customer_id = $customer->id;
                    $customer_name = $customer->first_name." ".$customer->last_name;
                    $customer_email = $customer->email;
                    $date_created = date('d-m-Y H:i A', strtotime($customer->date_created));            
                    
                    $orders_filter = array("customer_id" => $customer_id);
                    $orders_count = Client::getOrdersCount($orders_filter);

                    $customers_info[]=array(
                        'customer_id' => $customer_id,
                        'customer_name' => $customer_name,
                        'customer_email' => $customer_email,
                        'date_created' => $date_created,
                        'orders_count' => $orders_count
                    );
                }
            }
        }
        return view('customers', ['customers_info' => $customers_info, 'prev_page' => $prev_page, 'next_page' => $next_page, 'last_page' => $totalPages]);
    }
}
