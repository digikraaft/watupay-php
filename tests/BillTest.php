<?php


namespace Digikraaft\Watupay\Tests;

use Digikraaft\Watupay\Bill;
use Digikraaft\Watupay\Watupay;
use PHPUnit\Framework\TestCase;

class BillTest extends TestCase
{
    /** @test  * */
    public function it_can_return_bill_groups()
    {
        Watupay::setApiKey(getenv('WATUPAY_PUBLIC_KEY'));
        $data = Bill::groups();
        $this->assertEquals('object', gettype($data));
    }

    /** @test  * */
    public function it_can_return_list_of_bills()
    {
        Watupay::setApiKey(getenv('WATUPAY_PUBLIC_KEY'));
        $data = Bill::list();
        $this->assertEquals('object', gettype($data));
    }

    /** @test  * */
    public function it_can_return_bill()
    {
        Watupay::setApiKey(getenv('WATUPAY_PUBLIC_KEY'));
        $data = Bill::fetch('bill-07');

        $this->assertEquals('object', gettype($data));
    }
}
