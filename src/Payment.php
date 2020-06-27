<?php

namespace Digikraaft\Watupay;

class Payment extends ApiResource
{
    const OBJECT_NAME = 'payment';

    /**
     *
     * @link https://docs.watu.global/?version=latest#d4908f70-48c5-4109-93c3-98fe8b2dfa73
     *
     * @param array $params
     * @return array|object
     * @throws Exceptions\InvalidArgumentException
     * @throws Exceptions\IsNullException
     */
    public static function initiate(array $params)
    {
        self::validateParams($params, true);
        $url = static::endPointUrl('initiate');

        return static::staticRequest('POST', $url, $params);
    }

    /**
     *
     * @link https://docs.watu.global/?version=latest#d4908f70-48c5-4109-93c3-98fe8b2dfa73
     *
     * @param array $params
     * @return array|object
     * @throws Exceptions\InvalidArgumentException
     * @throws Exceptions\IsNullException
     */
    public static function charge(array $params)
    {
        self::validateParams($params, true);
        $url = static::endPointUrl('charge');

        return static::staticRequest('POST', $url, $params);
    }

    /**
     *
     * @link https://docs.watu.global/?version=latest#97b7c455-0217-4ed3-9b71-7c6e13ae667b
     *
     * @param array $params
     * @return array|object
     * @throws Exceptions\InvalidArgumentException
     * @throws Exceptions\IsNullException
     */
    public static function recurring(array $params)
    {
        self::validateParams($params, true);
        $url = static::classUrl() . urlencode('charge/recurrent');

        return static::staticRequest('POST', $url, $params);
    }

    /**
     *
     * @link https://docs.watu.global/?version=latest#c64350db-3e93-4214-8b41-35d07235c6db
     *
     * @param array $params
     * @return array|object
     * @throws Exceptions\InvalidArgumentException
     * @throws Exceptions\IsNullException
     */
    public static function chargeByTag(array $params)
    {
        self::validateParams($params, true);
        $url = static::endPointUrl('chargeby');

        return static::staticRequest('POST', $url, $params);
    }

    /**
     *
     * @link https://docs.watu.global/?version=latest#d7459e25-f42f-45e5-8792-3c4fd43a06bb
     *
     * @param array $params
     * @return array|object
     * @throws Exceptions\InvalidArgumentException
     * @throws Exceptions\IsNullException
     */
    public static function validateUser(array $params)
    {
        self::validateParams($params, true);
        $url = static::endPointUrl('validate-channel');

        return static::staticRequest('POST', $url, $params);
    }

    /**
     *
     * @link https://docs.watu.global/?version=latest#075114a7-c666-4b02-8f35-95ccfb372800
     *
     * @param array $params
     * @return array|object
     * @throws Exceptions\InvalidArgumentException
     * @throws Exceptions\IsNullException
     */
    public static function fees(array $params)
    {
        self::validateParams($params, true);
        $url = static::endPointUrl('fees');

        return static::staticRequest('POST', $url, $params);
    }

    /**
     *
     * @link https://docs.watu.global/?version=latest#8051dc88-0189-48c9-a419-f1e7f5870ffe
     *
     * @param array $params
     * @return array|object
     * @throws Exceptions\InvalidArgumentException
     * @throws Exceptions\IsNullException
     */
    public static function getExchangeRate(array $params)
    {
        self::validateParams($params, true);
        $url = static::endPointUrl('currency/exchange');

        return static::staticRequest('POST', $url, $params);
    }
}
