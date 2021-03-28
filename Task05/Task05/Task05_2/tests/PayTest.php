<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\PayPal;
use App\CreditCard;
use App\PayPalAdapter;
use App\CreditCardAdapter;

class PayTest extends TestCase
{
    public function testAdapters()
    {
        $paypal = new PayPal('customer@aol.com', 'password');
        $cc = new CreditCard(1234567890112233, "09/25");
        $paypalAdapter = new PayPalAdapter($paypal);
        $ccAdapter = new CreditCardAdapter($cc);
        $this -> assertSame("Authorization code:", $ccAdapter -> collectMoney(1340));
        $this -> assertSame("PayPal Success!", $paypalAdapter -> collectMoney(100));
    }
}
