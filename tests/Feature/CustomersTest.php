<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomersTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_see_the_customers_list()
    {
        $response = $this->get('/customers');

        $response->assertStatus(200);
    }
}
