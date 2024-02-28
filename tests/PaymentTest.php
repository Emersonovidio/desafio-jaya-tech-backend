<?php

namespace Tests\Unit;

use App\Http\Controllers\PaymentsController;
use PHPUnit\Framework\TestCase;

class CreatePaymentTest extends TestCase
{
    public function testCreatePayment()
    {
        $payment = new PaymentsController();

        $result = $payment->store();

        $this->assertTrue($result);
    }
}
