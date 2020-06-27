<?php

namespace Digikraaft\Watupay\Tests;

use Digikraaft\Watupay\Watupay;

class TestHelper
{
    public static function setup()
    {
        Watupay::$apiBase = 'https://api.watu.global/v1';
        Watupay::setApiKey(getenv('WATUPAY_PUBLIC_KEY'));
    }
}
