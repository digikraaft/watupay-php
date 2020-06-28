<?php

namespace Digikraaft\Watupay\Tests;

use Digikraaft\Watupay\ApiOperations\Request;
use Digikraaft\Watupay\Bill;
use Digikraaft\Watupay\Exceptions\ApiErrorException;
use Digikraaft\Watupay\Exceptions\InvalidArgumentException;
use Digikraaft\Watupay\Exceptions\IsNullException;
use Mockery as mk;
use PHPUnit\Framework\TestCase;

class RequestTest extends TestCase
{
    public function setUp(): void
    {
        TestHelper::setup();
    }

    /** @test */
    public function it_can_return_exception_when_params_is_empty_array_and_required()
    {
        $this->expectException(InvalidArgumentException::class);
        Request::validateParams([], true);
    }

    /** @test */
    public function it_can_return_exception_when_params_is_not_array_and_required()
    {
        $this->expectException(InvalidArgumentException::class);
        Request::validateParams('string', true);
    }

    /** @test */
    public function it_can_return_exception_when_params_is_not_array_and_not_required()
    {
        $this->expectException(InvalidArgumentException::class);
        Request::validateParams('string');
    }

    /** @test */
    public function it_can_return_object_from_api_response()
    {
        $mock = mk::mock('alias:Request');
        $mock->allows('staticRequest')
            ->with(mk::type('string'), mk::type('string'), mk::type('array'), mk::type('string'));
        $mock->staticRequest('get', 'customer', ['params'], 'sometype');
        $resource = $mock->expects(std::class);
        $this->assertEquals('object', gettype($resource));
    }

    /** @test */
    public function it_can_return_array_from_api_response()
    {
        $mock = mk::mock('alias:Request');
        $mock->allows('staticRequest')
            ->with(mk::type('string'), mk::type('string'), mk::type('array'), mk::type('string'));
        $mock->staticRequest('get', 'customer', ['params'], 'arr');
        $resource = $mock->expects([]);
        $this->assertEquals('array', gettype([$resource]));
    }

    /** @test */
    public function it_can_return_exception_when_request_method_is_null()
    {
        $this->expectException(IsNullException::class);
        $resp = Request::staticRequest(null, 'payment', [], 'obj');
    }

    /** @test */
    public function it_can_return_api_error_exception()
    {
        $this->expectException(ApiErrorException::class);
        Bill::fetch('bil-xyz');
    }

    /** @test */
    public function it_can_return_exception_when_return_type_is_invalid()
    {
        $this->expectException(InvalidArgumentException::class);
        Request::staticRequest(null, 'payment', [], 'xyz');
    }

    /** @test */
    public function it_can_return_array_response()
    {
        $bills = Request::staticRequest('GET', 'watubill/channels', [], 'arr');

        $this->assertEquals('array', gettype($bills));
    }
}
