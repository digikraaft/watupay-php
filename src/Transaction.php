<?php

namespace Digikraaft\Watupay;

class Transaction extends ApiResource
{
    const OBJECT_NAME = 'transaction';

    /**
     *
     * @link https://docs.watu.global/?version=latest#d5771850-b971-44c4-a89e-310a443f98d9
     *
     * @param array $params
     * @return array|object
     * @throws Exceptions\InvalidArgumentException
     * @throws Exceptions\IsNullException
     */
    public static function verify(array $params)
    {
        self::validateParams($params, true);
        $url = static::endPointUrl('verify');

        return static::staticRequest('POST', $url, $params);
    }
}
