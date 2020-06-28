<?php

include_once('vendor/autoload.php');

use Digikraaft\Watupay\Watupay;
use Digikraaft\Watupay\Bill;
use Digikraaft\Watupay\Exceptions\ApiErrorException;

Watupay::setApiKey('WTP-T-SK-abcd1234abcd');
try{
    $bill = Bill::fetch('bill-07');

    if (! $bill->has_error) {
        echo $bill->data->name;
    }
}catch(ApiErrorException $exception){
    echo $exception->getMessage();
}
