<?php

namespace Digikraaft\Watupay\Tests;

use Digikraaft\Watupay\Exceptions\InvalidArgumentException;
use Digikraaft\Watupay\Watupay;
use Mockery as mk;
use PHPUnit\Framework\TestCase;

class WatupayTest extends TestCase
{
    protected $watupay;
    protected $mock;

    public function setUp(): void
    {
        TestHelper::setup();
        $this->watupay = mk::mock('Digikraaft\Watupay\Watupay');
        $this->mock = mk::mock('GuzzleHttp\Client');
    }

    /** @test */
    public function it_returns_instance_of_watupay()
    {
        $this->assertInstanceOf("Digikraaft\Watupay\Watupay", $this->watupay);
    }

    /** @test */
    public function it_returns_invalid_api_key()
    {
        $this->expectException(InvalidArgumentException::class);
        Watupay::setApiKey('');
    }

    /** @test */
    public function it_returns_api_key()
    {
        Watupay::setApiKey('sk_apikey');
        $this->assertIsString(Watupay::getApiKey());
    }
}
