<?php

namespace Digikraaft\Watupay;

class Country extends ApiResource
{
    const OBJECT_NAME = 'country';

    /**
     * @param array $params
     *
     * @return array|object
     * @throws Exceptions\InvalidArgumentException
     * @throws Exceptions\IsNullException
     * @link https://docs.watu.global/?version=latest#a72e59f8-96ef-4cb5-bc20-71c2328aa05d
     *
     */
    public static function transferCurrencies()
    {
        $url = static::endPointUrl('transfer-currencies');

        return static::staticRequest('GET', $url);
    }

    /**
     * @param string $currency
     * @return array|object
     * @throws Exceptions\InvalidArgumentException
     * @throws Exceptions\IsNullException
     * @link https://docs.watu.global/?version=latest#92f518c2-43ea-42fe-b034-1186c144c98c
     */
    public static function byCurrency(string $currency = 'ngn')
    {
        $currency = strtolower($currency);
        $url = "by-currency/{$currency}";
        $url = static::endPointUrl($url);

        return static::staticRequest('GET', $url);
    }
}
