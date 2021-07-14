<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomerDetailsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_see_the_customer_details()
    {
        $response = $this->get('/customer_details/{id}');

        $response->assertStatus(200);
    }
    public function test_see_the_customer_details_without_customer_id()
    {
        $response = $this->get('/customer_details');

        $response->assertStatus(404);
    }
}
