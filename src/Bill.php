<?php

namespace Digikraaft\Watupay;

class Bill extends ApiResource
{
    const OBJECT_NAME = 'watubill';

    /**
     * @param array|null $params
     * @return array|object
     * @throws Exceptions\InvalidArgumentException
     * @throws Exceptions\IsNullException
     * @link https://docs.watu.global/?version=latest#9288a4a8-1b9a-4c11-989d-bf4ce276ba4d
     */
    public static function groups(array $params = null)
    {
        $url = static::buildQueryString('groups', $params);

        return static::staticRequest('GET', $url);
    }

    /**
     * @param array $params
     * @return array|object
     * @throws Exceptions\InvalidArgumentException
     * @throws Exceptions\IsNullException
     * @link https://docs.watu.global/?version=latest#7bf15b41-4c98-45ba-9024-5684dc3f37c6
     */
    public static function list(array $params = null)
    {
        $url = static::buildQueryString('channels', $params);

        return static::staticRequest('GET', $url);
    }

    /**
     * @param string $billId
     * @return array|object
     * @throws Exceptions\InvalidArgumentException
     * @throws Exceptions\IsNullException
     * @link https://docs.watu.global/?version=latest#1d0f3062-bbe8-44f9-8a0e-e6cb9535cc0d
     */
    public static function fetch(string $billId)
    {
        $url = urlencode("channel/info/{$billId}");

        return static::staticRequest('GET', $url);
    }

    /**
     * @param array $params
     * @return array|object
     * @throws Exceptions\InvalidArgumentException
     * @throws Exceptions\IsNullException
     * @link https://docs.watu.global/?version=latest#815d343b-6ff6-4517-9250-44fca3681164
     */
    public static function validate($params)
    {
        self::validateParams($params, true);
        $url = static::endPointUrl('validate');

        return static::staticRequest('POST', $url, $params);
    }

    /**
     * @param array $params
     * @return array|object
     * @throws Exceptions\InvalidArgumentException
     * @throws Exceptions\IsNullException
     * @link https://docs.watu.global/?version=latest#815d343b-6ff6-4517-9250-44fca3681164
     */
    public static function vend($params)
    {
        self::validateParams($params, true);
        $url = static::endPointUrl('vend');

        return static::staticRequest('POST', $url, $params);
    }

    /**
     * @param array $params
     * @return array|object
     * @throws Exceptions\InvalidArgumentException
     * @throws Exceptions\IsNullException
     * @link https://docs.watu.global/?version=latest#819c826f-6d55-4052-aea2-eb6f88483057
     */
    public static function validateCopy($params)
    {
        self::validateParams($params, true);
        $url = static::endPointUrl('bill-types');

        return static::staticRequest('POST', $url, $params);
    }
}
