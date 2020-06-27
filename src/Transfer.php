<?php

namespace Digikraaft\Watupay;

class Transfer extends ApiResource
{
    const OBJECT_NAME = 'transfer';

    /**
     * @param array $params
     *
     * @return array|object
     * @throws Exceptions\InvalidArgumentException
     * @throws Exceptions\IsNullException
     * @link https://docs.watu.global/?version=latest#05e6e63f-c2e6-407a-8bdf-ae5318025647
     *
     */
    public static function sendMoney($params)
    {
        self::validateParams($params, true);
        $url = urlencode('send-money');

        return static::staticRequest('POST', $url, $params);
    }

    /**
     * @param array $params
     *
     * @return array|object
     * @throws Exceptions\InvalidArgumentException
     * @throws Exceptions\IsNullException
     * @link https://docs.watu.global/?version=latest#11bc1b6a-6cce-481c-91ac-aff0190e375d
     *
     */
    public static function watuWallet($params)
    {
        self::validateParams($params, true);
        $url = urlencode('watu-transfer');

        return static::staticRequest('POST', $url, $params);
    }
}
