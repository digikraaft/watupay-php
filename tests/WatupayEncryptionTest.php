<?php


namespace Digikraaft\Watupay\Tests;

use Digikraaft\Watupay\WatupayEncryption;
use http\Exception;
use PHPUnit\Framework\TestCase;

class WatupayEncryptionTest extends TestCase
{
    /** @test */
    public function it_can_encrypt_data()
    {
        $data = 'Tim Oladoyinbo';
        $this->assertIsString(
            WatupayEncryption::encrypt(
                $data,
                getenv('WATUPAY_PUBLIC_KEY'),
                getenv('WATUPAY_IV_KEY'),
            )
        );
    }

    /** @test */
    public function it_returns_error_when_data_is_null()
    {
        $this->expectException(\Exception::class);
        $data = null;
        WatupayEncryption::encrypt(
            $data,
            getenv('WATUPAY_PUBLIC_KEY'),
            getenv('WATUPAY_IV_KEY'),
        );
    }

    /** @test */
    public function it_returns_exception_when_block_size_is_invalid()
    {
        $this->expectException(\Exception::class);
        $data = null;
        WatupayEncryption::encrypt(
            $data,
            getenv('WATUPAY_PUBLIC_KEY'),
            getenv('WATUPAY_IV_KEY'),
            192,
            'eee'
        );
    }
}
