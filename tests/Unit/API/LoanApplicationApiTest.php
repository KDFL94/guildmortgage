<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
// use PHPUnit\Framework\TestCase;

use Tests\TestCase;

class LoanApplicationApiTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_loan_application_fetch()
    {
        $response = $this->get('/api/loan-applications');
        $response->assertStatus(200)
            ->assertJson([
                'message' => "Loan Applications retrieved successfully."
            ]);
    }
}
